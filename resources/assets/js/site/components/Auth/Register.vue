<template>
    <div style="display: inline-block;">
        <li><a href="#" data-toggle="modal" data-target="#registerModal" data-backdrop="static" data-keyboard="false">Зарегистрироваться</a></li>
        
        <div ref="vuemodal" class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">

                            <template v-for="input in inputs">
                                <div class="form-group" :class="{'has-error': input.hasErrors }">
                                    <label :for="input.attr" class="col-md-4 control-label">{{input.name}}</label>

                                    <div class="col-md-6">
                                        <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" :disabled="input.disabled" required autofocus>
                                        <input v-if="input.type === 'password'" type="password" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" :disabled="input.disabled" required autofocus>
                                        <input v-if="input.type === 'phone'" type="text" v-input-mask data-inputmask-mask="+9 (999) 999 99 99" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" :disabled="input.disabled" required autofocus>
                                        
                                        <span v-if="input.hasErrors" class="help-block">
                                            <strong>{{input.errorMessage}}</strong>
                                        </span>
                                    </div>
                                </div>
                            </template>

                        </form>

                        <sms :sms-send="smsSend" :sms-verify.sync="smsVerify" :user="addedUser"></sms>

                    </div>
                    <div class="modal-footer" v-if="!smsSend">
                        <button type="submit" class="btn btn-primary" @click.prevent="registerPost">Регистрация</button>
                        <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Закрыть</button>
                    </div>
                    <div class="modal-footer" v-if="smsVerify">
                        <button type="button" class="btn btn-default" @click.prevent="finishRegister">Завершить регистрацию</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

import Sms from './Sms.vue'

export default {
    components: { Sms },
    mixins: [formDataMixin],
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
            $(this.$refs.vuemodal).modal('hide');
            this.$emit("login")
        }
    }
}
</script>