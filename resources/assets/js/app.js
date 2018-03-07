
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';

window.Vue = require('vue');
window.Vue.use(VueRouter);

import Categories from './components/Categories.vue';
import TopUsers from './components/TopUsers.vue';
import Archives from './components/Archives.vue';
import Posts from './components/Posts.vue';

Vue.component('Categories',  require('./components/Categories.vue'));
Vue.component('TopUsers', require('./components/TopUsers.vue'));
Vue.component('Archives', require('./components/Archives.vue'));
Vue.component('Posts', require('./components/Posts.vue'));


// const routes = [
//     {
//         path: '/',
//         name: "ExampleComponent",
//         components: {
//            Categories
//         },
//         data: {

//             name: "Ewout",
//             categories: ""

//         },
//         mounted () {
//             console.dir(this.users);
//         }
//     }
// ]

// const router = new VueRouter({ routes })
 
//const app = new Vue({ router }).$mount('#app')

var app = new Vue({
    el: '#app',
    data: {
        categories: ""
    }
})

var posts = new Vue({
    el: '#posts',
    data: {
        name: "Ewout"
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */