
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';

window.Vue = require('vue');
window.Vue.use(VueRouter);

import ExampleComponent from './components/ExampleComponent.vue';

Vue.component('ExampleComponent', require('./components/ExampleComponent.vue'))

const routes = [
    {
        path: '/superman',
        name: "ExampleComponent",
        components: {
           ExampleComponent
        },
        data: {

            name: "Ewout",

        },
        mounted () {
            console.dir(this.users);
        }
    }
]

const router = new VueRouter({ routes })
 
const app = new Vue({ router }).$mount('#app')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */