<template>
    <div style="display: inline-block;">
        <li><a href="#" data-toggle="modal" data-target="#registerModal" data-backdrop="static" data-keyboard="false">Зарегистрироваться</a></li>
        
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">

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

                        </form>

                        <sms v-if="smsSend"></sms>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" @click.prevent="registerPost()">Register</button>
                        <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
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
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Фамилия", attr: "last_name", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Имя", attr: "first_name", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Отчество", attr: "middle_name", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "E-mail", attr: "email", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Телефон", attr: "phone", show: true },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Пароль", attr: "password", show: false },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Подтверждение пароля", attr: "password_confirmation", show: false }
            ],
            smsSend: false,
        }
    },
    methods: {
        registerPost() {
            this.smsSend = true;

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