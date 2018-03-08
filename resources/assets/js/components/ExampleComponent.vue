<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component. {{ name }}
                        <ul>
                            <li v-for="user in users"> {{ user.name }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ExampleComponent",
        data () {
            return {
                name: "Ewout",
                users: '',
                message: ''
            };
        },
        created() {
            this.users = users
            axios.get('/api').then(function (response) {
                console.log(response.data);
              });
        },
        mounted () {
            // Do something useful with the data in the template
            console.dir(this.users)
        }
    }
</script>
