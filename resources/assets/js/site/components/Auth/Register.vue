<template>
    <div>
        <form class="rd-mailform text-left" data-form-output="form-output-global"  role="form">

            <template v-for="(input, index) in inputs">
                <div class="form-group" :class="{'has-error': input.hasErrors, 'offset-top-12': index !== 0  }">
                    <label :for="input.attr" class="form-label form-label-outside">{{input.name}}</label>

                    <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" :disabled="input.disabled" required autofocus>
                    <input v-if="input.type === 'password'" type="password" :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" :disabled="input.disabled" required autofocus>
                    <input v-if="input.type === 'phone'" type="text" v-phone-mask :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" :disabled="input.disabled" required autofocus>
                    
                    <!-- <span v-if="input.hasErrors" class="help-block">
                        {{input.errorMessage}}
                    </span> -->
                    <span v-if="input.hasErrors" class="form-validation">{{input.errorMessage}}</span>
                </div>
            </template>

        </form>

        <sms :sms-send="smsSend" :sms-verify.sync="smsVerify" :user="addedUser"></sms>

        <div class="offset-top-24" v-if="!smsSend">
            <button class="btn btn-primary btn-block" @click.prevent="registerPost">Регистрация</button>
        </div>
        <div class="offset-top-24" v-if="smsVerify">
            <button class="btn btn-default btn-block" @click.prevent="finishRegister">Завершить регистрацию</button>
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

import Inputmask from 'inputmask'

import Sms from './../Sms.vue'

export default {
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
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Фамилия", attr: "last_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Имя", attr: "first_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Отчество", attr: "middle_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "E-mail", attr: "email", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "phone", name: "Телефон", attr: "phone", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Пароль", attr: "password", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Подтверждение пароля", attr: "password_confirmation", disabled: false }
            ],
            addedUser: null,

            smsVerify: false,
            smsSend: false,
        }
    },
    methods: {
        registerPost() {
            this.clearErrors()
            axios.post('register', this.getFormData())
                .then((response) => {
                    this.addedUser = response.data
                    this.smsSend = true

                    _.each(this.inputs, function(el, i) {
                        el.disabled = true
                    })
                })
                .catch((data) => {
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data && data.response.data.errors
                        this.setErrors(err)   
                    }
                })
        },
        finishRegister() {
            // $(this.$refs.vuemodal).modal('hide');
            // this.$emit("login")
            window.location.href = '/'
        }
    }
}
</script>