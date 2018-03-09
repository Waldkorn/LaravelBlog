<template>

	<div>

		<div class="card bg-secondary">
			<div class="card-body">

				<div class="ml-auto">

					<button class="btn btn-primary" v-on:click="increaseFontSize">Increase fontsize</button>
					<button class="btn btn-primary" v-on:click="decreaseFontSize">Decrease fontsize</button>

				</div>

			</div>
		</div>

		<hr>

		<div class="blog-post" v-for="post in posts">
			<h2 class="blog-post-title">
				<a v-bind:href="'/posts/' + post.id">

					{{ post.title }}

				</a>
			</h2>
			<div>        	
            	<h6 class="d-inline" v-for="category in post.category">
            		<a v-bind:href="'/categories/' + category.id + '/posts'">

            			{{ category.category_title }}

            		</a>
            	</h6>	        	
	        </div>

	        <p class="blog-post-meta">
			    <a v-bind:href="'/blog/' +  post.user.id">{{ post.user.name }}</a> on
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
		props: [ 'posts' ],
		data: function() {
			return {
				fontSize : 18,
				elements : null,
				i : 0
			}
		},
		methods: {
			increaseFontSize : function() {
				if (this.fontSize < 30) {
					this.fontSize++;
					this.elements = document.getElementsByClassName('post-body');
					for (this.i = 0 ; this.i < this.elements.length ; this.i++) {
						this.elements[this.i].style.fontSize = this.fontSize + "px";
					}
				}
			},
			decreaseFontSize : function() {
				if (this.fontSize > 0) {
					this.fontSize--;
					this.elements = document.getElementsByClassName('post-body');
					for (this.i = 0 ; this.i < this.elements.length ; this.i++) {
						this.elements[this.i].style.fontSize = this.fontSize + "px";
					}
				}
			}
		}
	}

</script>

<style>

.post-body {
	font-size: 18px;
}

</style>