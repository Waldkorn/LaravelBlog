<template>

	<div>

		<div class="blog-post" v-for="post in posts">
			<h2 class="blog-post-title">
				<a v-bind:href="'/posts/' + post.id">

					{{ post.title }}

				</a>
			</h2>
			<div>        	
            	<h6 class="d-inline" v-for="category in post.category">
            		<a href="'/categories/' + category.id + '/posts'">

            			{{ category.category_title }}

            		</a>
            	</h6>	        	
	        </div>

	        <p class="blog-post-meta">
			    <a href="'/blog/' + post.user.id">{{ post.user.name }}</a> on
			    {{ post.created_at }}
			</p>

			<div v-html=post.body class="post-body"></div>

			<hr>

		</div>
	</div>

</template>

<script>

	export default {
		name: "Posts",
		data: function() {
			return {
				posts: []
			}
		},
		mounted() {
			axios.get('/api/posts').then(response => {
				console.log(response.data);
                this.posts = response.data.reverse();
            });
		}
	}

</script>

<style>

.post-body {
	font-size: 8px;
}

</style>