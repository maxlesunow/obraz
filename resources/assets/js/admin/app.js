
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

Vue.component('users-table', require('./components/vuetable/users/VueTable.vue'));
Vue.component('admins-table', require('./components/vuetable/admins/VueTable.vue'));
Vue.component('speakers-table', require('./components/vuetable/speakers/VueTable.vue'));
Vue.component('course-types-table', require('./components/vuetable/courseTypes/VueTable.vue'));
Vue.component('course-groups-table', require('./components/vuetable/courseGroups/VueTable.vue'));
Vue.component('courses-table', require('./components/vuetable/courses/VueTable.vue'));

const app = new Vue({
    el: '#app'
});
