/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import DatePicker from "./components/DatePicker";

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// when <my-datepicker> is called on the new-mission.blade then DatePicker.vue is used
Vue.component('my-datepicker', require('./components/DatePicker.vue').default);



//dependencies for v-calendar
import Vue from 'vue';
import VCalendar from 'v-calendar';
Vue.use(VCalendar);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

