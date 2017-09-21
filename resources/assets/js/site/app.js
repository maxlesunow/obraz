
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./plugins/functions')

window.Vue = require('vue');
window.Inputmask = require('inputmask');
window.Modernizr = require('Modernizr');

require('chosen-js');
require('magnific-popup');
require('malihu-custom-scrollbar-plugin');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.directive('input-mask', {
	bind: function(el) {
		new Inputmask({ autoUnmask: true }).mask(el);
	},
});

Vue.component('example', require('./components/Example.vue'));

Vue.component('auth', require('./components/Auth/Auth.vue'));

const app = new Vue({
    el: '#app'
});
