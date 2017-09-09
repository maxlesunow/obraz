<template>
    <div style="display: inline-block;">
        <li><a href="#" data-toggle="modal" data-target="#registerModal" data-backdrop="static" data-keyboard="false">Зарегистрироваться</a></li>
        
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" role="form">
                        <div class="modal-body">

                            <template v-for="input in inputs">
                                <div v-if="input.show" class="form-group" :class="{'has-error': input.hasErrors }">
                                    <label :for="input.attr" class="col-md-4 control-label">{{input.name}}</label>

                                    <div class="col-md-6">
                                        <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" required autofocus>
                                        <input v-if="input.type === 'password'" type="password" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" required autofocus>
                                        
                                        <span v-if="input.hasErrors" class="help-block">
                                            <strong>{{input.errorMessage}}</strong>
                                        </span>
                                    </div>
                                </div>
                            </template>

                            <div class="panel panel-success clearfix" v-if="!isSmsValid">
                                <div class="panel-body">
                                    <button class="btn btn-success" @click.prevent="sendSms()" v-if="!isSmsSend">Отправить СМС</button>

                                    <div class="form-group" v-if="isSmsSend">
                                        <label for="sms" class="col-md-4 control-label">Подтверждение СМС</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="sms" v-model="enteredSms" required autofocus>
                                            
                                            <span v-if="smsError" class="help-block">
                                                <strong>{{smsErrorMessage}}</strong>
                                            </span>
                                        </div>
                                        <button class="btn btn-success" @click.prevent="verifySms()">Подтвердить</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" @click.prevent="registerPost()" :disabled="!isSmsValid">Register</button>
                            <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

export default {
    mixins: [formDataMixin],
    data() {
        return {
            inputs: [
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Фамилия", attr: "last_name", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Имя", attr: "first_name", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Отчество", attr: "middle_name", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "E-mail", attr: "email", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Телефон", attr: "phone", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Пароль", attr: "password", show: false },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Подтверждение пароля", attr: "password_confirmation", show: false }
            ],
            isSmsValid: false,
            isSmsSend: false,
            enteredSms: ''
        }
    },
    methods: {
        sendSms() {
            this.isSmsSend = true;
        },
        verifySms() {
            this.isSmsValid = true;
            _.each(this.inputs, (val, i) => {
                val.show = !val.show
            })
        },
        registerPost() {
            this.clearErrors()
            axios.post('register', this.getFormData())
                .then((response) => {
                    // console.log(response);
                })
                .catch((data) => {
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data && data.response.data.errors
                        this.setErrors(err)   
                    }
                })
        }
    }
}
</script>