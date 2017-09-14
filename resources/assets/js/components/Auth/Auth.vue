<template>
    <div>
        <template v-if="!isLogined">
            <register @login="setLogin"></register>
            <login @login="setLogin"></login>
        </template>
        <template v-else>
            <ul>
                <li style="display: inline-block;"><a href="#">Личный кабинет</a></li>
                <li style="display: inline-block;"><a href="#">Выйти</a></li>
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
        isLogined: false
    }),
    methods: {
        setLogin() {
            this.isLogined = true
        }
    },
    created () {
        axios.post('register', this.getFormData())
            .then((response) => {
                this.addedUser = response.data
                this.smsSend = true

                _.each(this.inputs, function(el, i) {
                    el.disabled = true
                })
            })
    }
}
</script>

<style>

</style>
