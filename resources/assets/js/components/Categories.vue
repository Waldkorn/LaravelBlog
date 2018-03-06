<template>	

		<ul class="list-group">

			<li  class="list-group-item" v-for="category in categories">

				<a v-bind:href="'/categories/' + category.id + '/posts'">{{ category.category_title }}</a>

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
		}
	}

</script>