<template>
    <div style="display: inline-block;">
        <li><a href="#" data-toggle="modal" data-target="#loginModal">Войти</a></li>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" role="form">
                        <div class="modal-body">

                            <template v-for="input in inputs">
                                <div class="form-group" :class="{'has-error': input.hasErrors }">
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

                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" v-model="remember" name="remember"> Запомнить меня
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-link" href="">Забыли пароль?</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" @click.prevent="loginPost" class="btn btn-primary">Войти</button>
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
    data() {
        return {
            inputs: [
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Телефон", attr: "phone" },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Пароль", attr: "password" }
            ],
            remember: true
        }
    },
    methods: {
        loginPost() {
            this.clearErrors()
            axios.post('login', this.getFormData())
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