
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('users-table', require('./components/vuetable/UsersTable.vue'));
Vue.component('admins-table', require('./components/vuetable/AdminsTable.vue'));
Vue.component('speakers-table', require('./components/vuetable/SpeakersTable.vue'));
Vue.component('course-types-table', require('./components/vuetable/CourseTypesTable.vue'));
Vue.component('course-groups-table', require('./components/vuetable/CourseGroupsTable.vue'));
Vue.component('courses-table', require('./components/vuetable/CoursesTable.vue'));
Vue.component('payment-types-table', require('./components/vuetable/PaymentTypesTable.vue'));

const app = new Vue({
    el: '#app'
});
