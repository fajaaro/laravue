<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary float-right" @click="goToCreatePostPage()">Create New Post</button>
            </div>
            <div class="card-body pb-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" width="3%">#</th>
                            <th scope="col" width="20%">Title</th>
                            <th scope="col" width="30%">Description</th>
                            <th scope="col" width="12%">Author</th>                            
                            <th scope="col" width="12%"></th>
                            <th scope="col" width="12%"></th>
                            <th scope="col" width="12%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post, index) in posts">
                            <th scope="row" width="3%">{{ index + 1 }}</th>
                            <td width="20%">{{ post.title }}</td>
                            <td width="30%">{{ post.description }}</td>
                            <td width="12%">{{ post.user.name }}</td>
                            <td width="11%">
                                <button class="d-block my-0 mx-auto btn btn-primary" @click="goToShowPage(post.id)"><i class="fas fa-eye mr-2"></i>Show</button>
                            </td>
                            <td width="11%">
                                <button class="d-block my-0 mx-auto btn btn-success" @click="goToEditPage(post.id)"><i class="fas fa-edit mr-2"></i>Edit</button>
                            </td>
                            <td width="13%">
                                <button class="d-block my-0 mx-auto btn btn-danger" @click="deletePost(post.id)"><i class="fas fa-trash-alt mr-2"></i>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.loadData()
        },        
        data: function() {
            return {
                posts: [],
            }
        },
        methods: {
            loadData: function() {
                axios.get('/posts')
                    .then(response => {
                        this.posts = response.data.posts
                    })
                    .catch(e => {
                        console.log(e)
                    })
            },
            goToCreatePostPage: function() {
                axios.get('/posts/create/validatorCreate')
                    .then(response => {
                        if (response.data.validation_result) {
                            this.$router.push({ name: 'create' })
                        } else {
                            swal('Unauthorized.')
                        }
                    })
                    .catch(e => {
                        console.log(e.response)
                    })
            },
            goToShowPage: function(id) {
                this.$router.push({ name: 'show', params: { post_id: id } })
            },
            goToEditPage: function(id) {
                axios.get(`/posts/${id}/validator`)
                    .then(response => {
                        if (response.data.validation_result) {
                            this.$router.push({ name: 'edit', params: { post_id: id } })                            
                        } else {
                            swal('Unauthorized.')
                        }
                    })
                    .catch(e => {
                        console.log(e.response)
                    })
            },
            deletePost: function(id) {
                axios.get(`posts/${id}/validator`)
                    .then(response => {
                        if (response.data.validation_result) {
                            axios.delete(`/posts/${id}`)
                                .then(response => {
                                    swal(response.data.status)
                                    this.loadData()
                                })
                                .catch(e => {
                                    console.log(e)
                                })
                        } else {
                            swal('Unauthorized.')
                        }
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        }

    }
</script>