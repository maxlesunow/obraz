<template>
    <div v-show="loaded">
        <template v-if="!isLogined">
            <register @login="initialLogin"></register>
            <login @login="initialLogin"></login>
        </template>
        <template v-else>
                <li v-if="isAdmin"><a href="/admin"><span>Админка</span></a></li>
                <li><a href="#"><span>Личный кабинет</span></a></li>
                <li><a href="#" @click.prevent="logout"><span>Выйти</span></a></li>
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
        isAdmin: false,
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
                    this.isAdmin = false
                }) 
        },
        initialLogin() {
            this.whoami((response) => {
                this.loaded = true
                this.user = response.data                
                if (this.user) {
                    this.isLogined = true
                    if (this.user.role.name === "admin") {
                        this.isAdmin = true
                    }
                }
            })
        }
    },
    created () {
        this.initialLogin()
    }
}
</script>

<style scoped>
    /* ul li {
        display: inline-block;
    } */
</style>
