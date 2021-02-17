/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { Form } from 'vform'
window.Form = Form;

import axios from "axios";
window.axios = axios;

import Swal from 'sweetalert2'
window.Swal = Swal;

import { BootstrapVue } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)

//===momentjs ========
import moment from 'moment';
window.moment = moment;
Vue.moment = moment;

Vue.filter('filterDate', function (myDate) {
    return moment(new Date(myDate)).format('Do MMMM YYYY, HH:mm:ss A');
});

Vue.filter('filterDateOnly', function (myDate) {
    return moment(new Date(myDate)).format('Do MMMM YYYY');
});



Vue.filter('filterHumanDate', function (myDate) {
    return moment(new Date(myDate)).format('Do MMMM YYYY, h:mm:ss A');
})

import router from './routes.js';

//vue editor
// Advanced Use - Hook into Quill's API for Custom Functionality
import { VueEditor, Quill } from "vue2-editor";
Vue.component('VueEditor', VueEditor);

const app = new Vue({
    el: '#app',
    router
});
