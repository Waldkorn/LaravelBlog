
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Categories from './components/Categories.vue';
import TopUsers from './components/TopUsers.vue';
import Archives from './components/Archives.vue';
import Posts from './components/Posts.vue';

Vue.component('Categories',  require('./components/Categories.vue'));
Vue.component('TopUsers', require('./components/TopUsers.vue'));
Vue.component('Archives', require('./components/Archives.vue'));
Vue.component('Posts', require('./components/Posts.vue'));

var app = new Vue({
    el: '#app',
    data: {
        categories: "",
        posts: ""
    },
    methods: {
		updatePosts : function(data) {
			console.log("it works");
			this.posts = data;
			this.$emit('update', data);
		}
	},
	created: function() {
		axios.get('/api/posts').then( response =>
			this.posts = response.data
		)
	}

})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */