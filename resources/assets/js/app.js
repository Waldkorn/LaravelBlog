
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
import Categories from './components/Categories.vue'

Vue.component('ExampleComponent', require('./components/ExampleComponent.vue'));
Vue.component('Categories',  require('./components/Categories.vue'));

const routes = [
    {
        path: '/',
        name: "ExampleComponent",
        components: {
           ExampleComponent,
           Categories
        },
        data: {

            name: "Ewout",
            categories: ""

        },
        mounted () {
            console.dir(this.users);
        }
    }
]

const router = new VueRouter({ routes })
 
//const app = new Vue({ router }).$mount('#app')

var app = new Vue({
    el: '#app',
    data: {
        categories: ""
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */