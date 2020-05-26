<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Post</div>

            <div class="card-body">
                <h3>{{ post.title }}</h3>
                <p>{{ post.description }}</p>
                    <button class="btn btn-primary" @click="goToIndexPage()">Back</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getPost()
        },
    	data: function() {
    		return {
    			post: [],
    		}
    	},
    	methods: {
            goToIndexPage: function() {
                this.$router.push({ name: 'index' })
            },
    		getPost: function() {
    			axios.get(`/posts/${this.$route.params.post_id}`)
    			.then(response => {
                    this.post = response.data.post;
    			})
    			.catch(e => {
                    console.log(`Error: ${e}`);
    			})
    		}
    	}
    }
</script>
