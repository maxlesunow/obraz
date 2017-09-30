<template>
    <div>
        <div class="panel panel-success clearfix" v-if="smsSend && !smsVerifyOrigin">
            <div class="panel-body">
                <form class="form-horizontal" role="form">

                    <template v-for="input in inputs">
                        <div class="form-group" :class="{'has-error': input.hasErrors }">
                            <label :for="input.attr" class="col-md-4 control-label">{{input.name}}</label>

                            <div class="col-md-6">
                                <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" required autofocus>
                                <input v-if="input.type === 'code'" type="code" :id="input.attr" class="form-control" v-code-mask :name="input.attr" v-model="input.data" required autofocus>
                                
                                <span v-if="input.hasErrors" class="help-block">
                                    <strong>{{input.errorMessage}}</strong>
                                </span>
                            </div>
                        </div>
                    </template>

                    <button class="btn btn-success" @click.prevent="verifySms">Подтвердить</button>
                    <button class="btn btn-primary" @click.prevent="resendSms">Отправить еще раз</button>
                </form>
            </div>
        </div>
        <div v-if="smsVerifyOrigin">
            <span>Смс успешно подтверждена</span>
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

import Inputmask from 'inputmask'

export default {
    name: "sms",
    mixins: [formDataMixin],
    props: ['smsSend', 'smsVerify', 'user'],
    directives: { 
        'code-mask': {
            bind: function(el) {
                new Inputmask({ 
                    mask: "9999", 
                    // autoUnmask: true,
                    // onUnMask: (maskedValue, unmaskedValue) => "7" + unmaskedValue   
                }).mask(el);
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
            axios.post(`verification/send/${this.user.id}`)
                .then((response) => {
                    // 
                })
                .catch((data) => {
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data
                        this.setErrors(err)   
                    }
                })
        },
        verifySms() {
            this.clearErrors()
            axios.post(`verification/${this.user.id}`, this.getFormData())
                .then((response) => {
                    this.smsVerifyOrigin = true
                    this.$emit("update:smsVerify", this.smsVerifyOrigin) // @see https://vuejs.org/v2/guide/components.html#sync-Modifier
                })
                .catch((data) => {
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data
                        this.setErrors(err)   
                    }
                })
        },
    }
}
</script>

<style>

</style>
