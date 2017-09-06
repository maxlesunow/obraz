<template>
    <div style="display: inline-block;">
        <li><a href="#" data-toggle="modal" data-target="#registerModal">Зарегистрироваться</a></li>
        
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
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
export default {
    data() {
        return {
            inputs: [
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Фамилия", attr: "last_name" },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Имя", attr: "first_name" },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Отчество", attr: "middle_name" },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "E-mail", attr: "email" },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Телефон", attr: "phone" },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Пароль", attr: "password" },
                { data: '', hasErrors: '', errorMessage: null, type: "password", name: "Подтверждение пароля", attr: "password_confirmation" }
            ],
            isSmsValid: false
        }
    },
    methods: {
        getFormData() {
            return _.reduce(this.inputs, (store, input, i) => { 
                store[input.attr] = input.data
                return store 
            }, {})
        },
        clearErrors() {
            _.each(this.inputs, (value, i) => {
                this.inputs[i].hasErrors = ''
                this.inputs[i].errorMessage = null
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
                        err && _.each(this.inputs, (value, i) => {
                                this.inputs[i].errorMessage = _.isArray(err[value.attr]) ? err[value.attr][0] : err[value.attr]
                                if (this.inputs[i].errorMessage) { this.inputs[i].hasErrors = true }
                            })      
                    }
                })
        }
    }
}
</script>