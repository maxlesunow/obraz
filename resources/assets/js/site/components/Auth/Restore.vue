<template>
    <div>
        <form class="rd-mailform text-left" data-form-output="form-output-global" role="form">
            <p>Новый пароль поступит на телефон после подтверждения</p>

            <template v-for="(input, index) in inputs">
                <div class="form-group" :class="{'has-error': input.hasErrors, 'offset-top-24': index !== 0 }">
                    <label :for="input.attr" class="form-label form-label-outside">{{input.name}}</label>

                    <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" :disabled="input.disabled"  required autofocus>
                    <input v-if="input.type === 'password'" type="password" :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" :disabled="input.disabled"  required autofocus>
                    <input v-if="input.type === 'phone'" type="text" v-phone-mask :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" :disabled="input.disabled"  required autofocus>

                    <!-- <span v-if="input.hasErrors" class="help-block">
                        {{input.errorMessage}}
                    </span> -->
                    <span v-if="input.hasErrors" class="form-validation">{{input.errorMessage}}</span>
                </div>
            </template>

            <div class="form-group offset-top-24">
                <!-- <div class="col-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" v-model="remember" name="remember"> Запомнить меня
                        </label>
                    </div>
                </div> -->
                <div class="col-md-4">
                    <!-- <a class="btn btn-link" href="">Забыли пароль?</a> -->
                </div>
            </div>

            <div class="offset-top-24">
                <button class="btn btn-primary btn-block" v-if="!smsSend" @click.prevent="restorePost">Восстановить</button>
                <button class="btn btn-primary btn-block" v-if="smsVerify" @click.prevent="finishRestore">Завершить восстановление</button>
            </div>


        </form>

        <sms :sms-send="smsSend" :sms-verify.sync="smsVerify" 
                :resend-address="'/reset-password/send-code'"
                :verify-address="'/reset-password/check-code'"
                :setting="getFormData()">
        </sms>

        <div class="text-center" v-if="smsSend && !smsVerify">
            <p class="text-danger">Для активации учетной записи введите код, отправленный Вам в СМС сообщении.</p>
        </div>

        <div class="offset-top-24">
            <a href="" @click.prevent="$emit('update:restoreMode', !restoreMode)">Вернуться к форме входа</a>
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

import Inputmask from 'inputmask'

import Sms from './../Sms.vue'

export default {
    props: ['restoreMode'],
    components: { Sms },
    mixins: [formDataMixin],
    directives: { 
        'phone-mask': {
            bind: function(el) {
                new Inputmask({ 
                    mask: "+7 (###) ### ## ##", 
                    autoUnmask: true,
                    onUnMask: (maskedValue, unmaskedValue) => "7" + unmaskedValue   
                }).mask(el);
            } 
        }
    },
    data() {
        return {
            inputs: [
                { data: '', hasErrors: '', errorMessage: null, type: "phone", name: "Телефон", attr: "phone", disabled: false }
            ],
            // remember: true,
            smsSend: false,
            smsVerify: false,

            user: null
        }
    },
    methods: {
        finishRestore() {
            // $(this.$refs.vuemodal).modal('hide');
            // this.$emit("login")
            window.location.href = '/'
        },
        restorePost() {
            this.clearErrors()
            axios.post('/reset-password/send-code', this.getFormData())
                .then((response) => {
                    // console.log("secc", response)
                    this.user = response.data
                    this.smsSend = true

                    _.each(this.inputs, function(el, i) {
                        el.disabled = true
                    })
                })
                .catch((data) => {
                    // console.log("err", data)
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data && data.response.data
                        this.setErrors(err)    
                    }
                })
        }
    }
}
</script>