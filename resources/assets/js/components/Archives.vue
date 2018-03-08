<template>	

<div>
  <h4 class="font-italic">Archives</h4>   
    <h6 class="mb-0" v-for="(year, index) in archives" :key='index'>
      <p v-on:click="getMessages(archives[index])" class="text">{{index}}</p>
    </h6>
</div>

</template>

<script>
	
	export default {
		name: 'Archives',
		data: function() {
			return {
				archives: [],
            	csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            	posts: null
			}
		},
		mounted() {
			axios.get('/api/archives').then(response => {
                this.archives = response.data;
            });
		},
		methods: {
			getMessages : function(archives) {
				archives = JSON.parse(JSON.stringify(archives));
				var posts = archives[Object.keys(archives)[0]];
				this.$emit('update', posts);
			}
		}
	}

</script>