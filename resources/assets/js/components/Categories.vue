<template>	

	<ul class="list-group">

		<li  class="list-group-item li" v-for="category in categories" v-on:click="getPost(category.id)">

			{{ category.category_title }}

		</li>

		<form method="POST" action="/categories/create">
			<input type="hidden" name="_token" :value="csrf" />
			<div class="form-group">
				<input name="category_title" class="form-control" placeholder="Add category...">
			</div>

		</form>

	</ul>

</ul>

</template>

<script>
	
	export default {
		name: 'Categories',
		data: function() {
			return {
				categories: [],
            	csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			}
		},
		mounted() {
			axios.get('/api/categories').then(response => {
                this.categories = response.data;
            });
		},
		methods: {
			getPost : function(categoryId) {
				axios.get('/api/categories/' + categoryId ).then( response =>
					this.$emit('update', response.data)
				)
			}
		}
	}

</script>

<style>

.li:hover {

	cursor: pointer;
	background-color: #007bff;

}

</style>