<template>

<form class="form-horizontal" role="form">


    <div class="form-group" :class="{'has-error' : hasErrors.first_name}">
        <label for="first_name" class="col-md-4 control-label">Фамилия</label>

        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control" name="first_name"
                   v-model="registerData.first_name" required autofocus>
            <span v-if="hasErrors.first_name" class="help-block">
                <strong>{{errorMessage.first_name}}</strong>
            </span>

        </div>
    </div>

    <div class="form-group" :class="{'has-error' : hasErrors.last_name}">
        <label for="last_name" class="col-md-4 control-label">Имя</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control" name="last_name"
                   v-model="registerData.last_name" required autofocus>
            <span v-if="hasErrors.last_name" class="help-block">
                <strong>{{errorMessage.last_name}}</strong>
            </span>

        </div>
    </div>

    <div class="form-group" :class="{'has-error' : hasErrors.middle_name}">
        <label for="middle_name" class="col-md-4 control-label">Отчество</label>

        <div class="col-md-6">
            <input id="middle_name" type="text" class="form-control" name="middle_name"
                   v-model="registerData.middle_name" required autofocus>
            <span v-if="hasErrors.middle_name" class="help-block">
                <strong>{{errorMessage.middle_name}}</strong>
            </span>

        </div>
    </div>

    <div class="form-group" :class="{'has-error' : hasErrors.email}">
        <label for="email" class="col-md-4 control-label">E-mail</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email"
                   v-model="registerData.email" required autofocus>
            <span v-if="hasErrors.email" class="help-block">
                <strong>{{errorMessage.email}}</strong>
            </span>

        </div>
    </div>

    <div class="form-group" :class="{'has-error' : hasErrors.phone}">
        <label for="phone" class="col-md-4 control-label">Телефон</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control" name="phone"
                   v-model="registerData.phone" required autofocus>
            <span v-if="hasErrors.phone" class="help-block">
                <strong>{{errorMessage.phone}}</strong>
            </span>

        </div>
    </div>


    <div class="form-group" :class="{'has-error' : hasErrors.password}">
        <label for="password" class="col-md-4 control-label">Пароль</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password"
                   v-model="registerData.password" required>
            <span v-if="hasErrors.password" class="help-block">
                <strong>{{errorMessage.password}}</strong>
            </span>

        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Повторите пароль</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" v-model="registerData.password_confirmation"
                   required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" @click.prevent="registerPost()">
                Register
            </button>
        </div>
    </div>
</form>
</template>

<script>
    export default{
        data(){
            return{
                registerData:{
                    first_name:'',
                    last_name:'',
                    middle_name:'',
                    email:'',
                    phone:'',
                    password:'',
                    password_confirmation:''
                },
                hasErrors:{
                    first_name:'',
                    last_name:'',
                    middle_name:'',
                    email:'',
                    phone:false,
                    password:false
                },
                errorMessage:{
                    first_name:null,
                    last_name:null,
                    middle_name:null,
                    email:null,
                    phone:null,
                    password:null
                }
                //passwordMatch:null
            }
        },
        methods:{
            registerPost(){
                var _this = this
                var vm = this.hasErrors
                var _vm = this.errorMessage
                axios.post('register', _this.registerData)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        var errors = error.response
                        if(errors.statusText === 'Unprocessable Entity'){
                            if(errors.data){

                                if(errors.data.errors.first_name){
                                    vm.first_name = true
                                    _vm.first_name = _.isArray(errors.data.errors.first_name) ? errors.data.errors.first_name[0]: errors.data.errors.first_name
                                }

                                if(errors.data.errors.last_name){
                                    vm.last_name = true
                                    _vm.last_name = _.isArray(errors.data.errors.last_name) ? errors.data.errors.last_name[0]: errors.data.errors.last_name
                                }

                                if(errors.data.errors.middle_name){
                                    vm.middle_name = true
                                    _vm.middle_name = _.isArray(errors.data.errors.middle_name) ? errors.data.errors.middle_name[0]: errors.data.errors.middle_name
                                }
                                if(errors.data.errors.phone){
                                    vm.email = true
                                    _vm.email = _.isArray(errors.data.errors.email) ? errors.data.errors.email[0]: errors.data.errors.email
                                }

                                if(errors.data.errors.phone){
                                    vm.phone = true
                                    _vm.phone = _.isArray(errors.data.errors.phone) ? errors.data.errors.phone[0]: errors.data.errors.phone
                                }

                                if(errors.data.errors.password){
                                    vm.password = true
                                    _vm.password = _.isArray(errors.data.errors.password) ? errors.data.errors.password[0]: errors.data.errors.password
                                }
                            }
                        }
                    });
            }
        }
        /*
            computed:{
                passwordValidate(){
                    var vm = this.registerData;
                    var _this = this
                    return vm.password_confirmation !== vm.password  ? _this.passwordMatch = 'The password confirmation does not match.'  : _this.passwordMatch = null
                }
            }
        */
    }
</script>