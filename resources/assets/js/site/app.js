import { Select, Option } from 'element-ui'
import 'element-ui/lib/theme-default/index.css'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component(Select.name, Select)
Vue.component(Option.name, Option)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// Vue.component('auth', require('./components/Auth/Auth.vue'));
Vue.component('login', require('./components/Auth/Login.vue'));
Vue.component('register', require('./components/Auth/Register.vue'));

Vue.component('main-schedule', require('./components/schedule/MainSchedule.vue'));
Vue.component('reservation', require('./components/course/Reservation.vue'));

const app = new Vue({
    el: '#app'
});
