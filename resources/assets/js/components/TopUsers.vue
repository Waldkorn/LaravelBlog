<template>

	<div>
		<h4 class="font-italic">Top Users</h4>   

		<h6 class="mb-0" v-for="topUser in topUsers">
	    	<a v-bind:href="'blog/' + topUser.id">
	      		{{ topUser.name }}
	    	</a><br>
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
		}
	}

</script>