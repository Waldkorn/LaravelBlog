<template>	

<div>
  <h4 class="font-italic">Archives</h4>   
    <h6 class="mb-0" v-for="(year, index) in archives" :key='index'>
      <a v-bind:href="'/' + index + '/posts'">{{index}}</a><br>
    </h6>
</div>

</template>

<script>
	
	export default {
		name: 'Archives',
		data: function() {
			return {
				archives: [],
            	csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			}
		},
		mounted() {
			axios.get('/api/archives').then(response => {
                this.archives = response.data;
            });
		}
	}

</script>