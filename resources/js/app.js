/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'

import Notifications from 'vue-notification'
Vue.use(Notifications);


window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)
let routes = [
  { path: '/dashboard', component: require('./components/dashboard/Index').default },
  { path: '/addpatient', component: require('./components/patient/AddPatient').default },
  { path: '/listpatient', component: require('./components/patient/TablePatient').default },
  { path: '/addproduct', component: require('./components/inventory/AddProduct').default },
  { path: '/listproduct', component: require('./components/inventory/TableProduct').default },
  { path: '/payment', component: require('./components/payment/Payment').default },
  { path: '/activities', component: require('./components/activity/Index').default },
]
const router = new VueRouter({
  mode: 'history',
  routes,
})

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})

window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
