<template>
    <div v-show="loaded">
        <template v-if="!isLogined">
            <register @login="initialLogin"></register>
            <login @login="initialLogin"></login>
        </template>
        <template v-else>
            <ul>
                <li style="display: inline-block;"><a href="#">Личный кабинет</a></li>
                <li style="display: inline-block;"><a href="#" @click.prevent="logout">Выйти</a></li>
            </ul>
        </template>
    </div>
</template>

<script>
import Login from './Login.vue'
import Register from './Register.vue'


export default {
    components: { Login, Register },
    data: () => ({
        loaded: false,
        isLogined: false,
        user: null
    }),
    methods: {
        whoami(callback) {
            axios.get('whoami')
                .then((response) => {
                    callback(response)
                })
                .catch(() => {
                    callback()
                })
        },
        logout() {
            axios.post("logout")
                .then((response) => {
                    this.user = null
                    this.isLogined = false
                }) 
        },
        initialLogin() {
            this.whoami((response) => {
                this.loaded = true
                this.user = response.data                
                if (this.user) {
                    this.isLogined = true
                }
            })
        }
    },
    created () {
        this.initialLogin()
    }
}
</script>

<style>

</style>
