<template>

	<div>
		<h4 class="font-italic">Top Users</h4>

		<h6 class="mb-0" v-for="topUser in topUsers">
	    	<p v-on:click="getMessages(topUser.id)">
	      		{{ topUser.name }}
	    	</p>
	  	</h6>

	</div>

</template>

<script>

	export default {
		name: "TopUsers",
		data: function() {
			return {
				topUsers: ''
			}
		},
		mounted() {
			axios.get('/api/topUsers').then(response => {
                this.topUsers = response.data;
            });
		},
		methods: {
			getMessages : function(userId) {
				axios.get('/api/posts/' + userId).then(response => {
	            	this.$emit('update', response.data);
	            });
			}
		}
	}

</script>

<style>

p:hover {
	color: #007bff;
	cursor: pointer;
}

</style>