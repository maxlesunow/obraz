<template>

    <form class="form-horizontal" role="form">

        <div class="form-group" :class="{'has-error' : errorsPhone}">
            <label for="phone" class="col-md-4 control-label">Телефон</label>

            <div class="col-md-6">
                <input id="phone" type="phone" class="form-control" name="phone" v-model="loginDetails.phone" required autofocus>

                <span v-if="errorsPhone" class="help-block">
                    <strong>{{phoneError}}</strong>
                </span>
            </div>
        </div>

        <div class="form-group" :class="{'has-error' : errorsPassword}">
            <label for="password" class="col-md-4 control-label">Пароль</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" v-model="loginDetails.password" name="password" required>
                <span v-if="errorsPassword" class="help-block">
                    <strong>{{passwordError}}</strong>
                </span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" v-model="loginDetails.remember"  name="remember" > Запомнить меня
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" @click.prevent="loginPost" class="btn btn-primary">
                    Войти
                </button>

                <a class="btn btn-link" href="">
                    Забыли пароль?
                </a>
            </div>
        </div>
    </form>

</template>

<script>
    export default {
        data(){
            return{
                loginDetails:{
                    phone:'',
                    password:'',
                    remember:true
                },
                errorsPhone: false,
                errorsPassword: false,
                emailError:null,
                passwordError:null
            }
        },
        methods:{
            loginPost(){
                let vm = this;
                axios.post('/login', vm.loginDetails)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        var errors = error.response
                        if(errors.statusText === 'Unprocessable Entity'){
                            if(errors.data){
                                console.log(errors.data);
                                if(errors.data.errors.phone){
                                    console.log(errors.data.phone);
                                    vm.errorsPhone = true
                                    vm.phoneError = _.isArray(errors.data.errors.phone) ? errors.data.errors.phone[0]: errors.data.errors.phone
                                }
                                if(errors.data.password){
                                    vm.errorsPassword = true
                                    vm.passwordError = _.isArray(errors.data.password) ? errors.data.password[0] : errors.data.password
                                }
                            }
                        }
                    });
            }
        },
        mounted() {
        }
    }
</script>