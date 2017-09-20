
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

Vue.component('admins-table', require('./components/vuetable/AdminsTable.vue'));
Vue.component('course-types-table', require('./components/vuetable/CourseTypesTable.vue'));
Vue.component('course-groups-table', require('./components/vuetable/CourseGroupsTable.vue'));
Vue.component('payments-table', require('./components/vuetable/PaymentsTable.vue'));
Vue.component('payment-types-table', require('./components/vuetable/PaymentTypesTable.vue'));
Vue.component('reservations-table', require('./components/vuetable/ReservationsTable.vue'));
Vue.component('review-table', require('./components/vuetable/ReviewTable.vue'));

Vue.component('courses-table', require('./components/vuetable/CoursesTable.vue'));
Vue.component('reservations-table-course', require('./components/vuetable/ReservationsTableCourse.vue'));

Vue.component('users-table', require('./components/vuetable/UsersTable.vue'));
Vue.component('courses-table-user', require('./components/vuetable/CoursesTableUser.vue'));
Vue.component('reviews-table-user', require('./components/vuetable/ReviewTableUser.vue'));

Vue.component('speakers-table', require('./components/vuetable/SpeakersTable.vue'));
Vue.component('courses-table-speaker', require('./components/vuetable/CoursesTableSpeaker.vue'));

const app = new Vue({
    el: '#app'
});
