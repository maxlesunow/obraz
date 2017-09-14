<template>
    <div>
        <div class="panel panel-success clearfix" v-if="smsSend && !smsVerify">
            <div class="panel-body">
                <form class="form-horizontal" role="form">

                    <template v-for="input in inputs">
                        <div class="form-group" :class="{'has-error': input.hasErrors }">
                            <label :for="input.attr" class="col-md-4 control-label">{{input.name}}</label>

                            <div class="col-md-6">
                                <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" required autofocus>
                                <input v-if="input.type === 'code'" type="code" :id="input.attr" class="form-control" v-input-mask data-inputmask-mask="9999" :name="input.attr" v-model="input.data" required autofocus>
                                
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
        <div v-if="smsVerify">
            <span>Смс успешно подтверждена</span>
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

export default {
    name: "sms",
    mixins: [formDataMixin],
    props: ['smsSend', 'smsVerify', 'user'],
    data: () => ({
        inputs: [
            { data: '', hasErrors: '', errorMessage: null, type: "code", name: "Код", attr: "code" },
        ]
    }),
    methods: {
        resendSms() {
            axios.post(`verification/send/${this.user.id}`)
                .then((response) => {
                    // 
                })
        },
        verifySms() {
            axios.post(`verification/${this.user.id}`, this.getFormData())
                .then((response) => {
                    this.smsVerify = true
                    this.$emit("update:smsVerify", this.smsVerify) // @see https://vuejs.org/v2/guide/components.html#sync-Modifier
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
