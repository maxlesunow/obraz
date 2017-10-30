<template>
    <div class="offset-top-24">
        <div class="panel panel-primary clearfix" v-if="smsSend && !smsVerifyOrigin">
            <div class="panel-body">
                <form class="rd-mailform text-left" data-form-output="form-output-global" role="form">

                    <template v-for="input in inputs">
                        <div class="form-group" :class="{'has-error': input.hasErrors }">
                            <label :for="input.attr" class="form-label form-label-outside">{{input.name}}</label>

                            <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" required autofocus>
                            <input v-if="input.type === 'code'" type="code" :id="input.attr" class="form-control" v-code-mask :name="input.attr" v-model="input.data" required autofocus>
                            
                            <!-- <span v-if="input.hasErrors" class="help-block">
                                <strong>{{input.errorMessage}}</strong>
                            </span> -->
                            <span v-if="input.hasErrors" class="form-validation">{{input.errorMessage}}</span>
                        </div>
                    </template>

                    <div class="offset-top-34"><a href @click.prevent="resendSms"><ins>Отправить еще раз</ins></a></div>
                    
                    <button class="btn btn-primary btn-block offset-top-24" @click.prevent="verifySms">Подтвердить</button>
                </form>
            </div>
        </div>
        <div clas="text-center" v-if="smsVerifyOrigin">
            <p class="text-danger">Аккаунт подтвержден</p>
        </div>
    </div>
</template>

<script>
import formDataMixin from './mixins/formData'
import { Notification } from 'element-ui'
import Inputmask from 'inputmask'

export default {
    name: "sms",
    mixins: [formDataMixin],
    props: ['smsSend', 'smsVerify', 'resendAddress', 'verifyAddress', 'setting'],
    directives: { 
        'code-mask': {
            bind: function(el) {
                new Inputmask({ 
                    mask: "# # # #", 
                    autoUnmask: true,
                    // onUnMask: (maskedValue, unmaskedValue) => "7" + unmaskedValue   
                }).mask(el);
            } 
        }
    },
    watch: {
        smsSend () {
            if (this.smsSend) {
                const h = this.$createElement;
                Notification({
                    title: 'Успех',
                    offset: 100,
                    message: h('i', { style: 'color: teal' }, 'Отправлен код подтверждения')
                });
            }
        }
    },
    data: () => ({
        inputs: [
            { data: '', hasErrors: '', errorMessage: null, type: "code", name: "Код", attr: "code" },
        ],
        smsVerifyOrigin: this.smsVerify
    }),
    methods: {
        resendSms() {
            this.clearErrors()
            axios.post(this.resendAddress, this.setting || {})
                .then((response) => {
                    const h = this.$createElement;
                    Notification({
                        title: 'Успех',
                        offset: 100,
                        message: h('i', { style: 'color: teal' }, 'Отправлен код подтверждения')
                    });
                })
                .catch((data) => {
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data && data.response.data.errors
                        this.setErrors(err)   
                    }
                })
        },
        verifySms() {
            this.clearErrors()
            axios.post(this.verifyAddress, Object.assign(this.setting || {}, this.getFormData()))
                .then((response) => {
                    this.smsVerifyOrigin = true
                    this.$emit("update:smsVerify", this.smsVerifyOrigin) // @see https://vuejs.org/v2/guide/components.html#sync-Modifier
                })
                .catch((data) => {
                    console.log(data)
                    if (data.response && data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data && data.response.data.errors
                        this.setErrors(err)   
                    }
                })
        },
    }
}
</script>

<style>

</style>
