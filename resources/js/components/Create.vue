<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Create Post</div>

            <div class="card-body">
				<form>
					<div class="form-group">
						<input type="text" class="form-control" v-model:value="post.title" placeholder="Title">
					</div>
					<div class="form-group">
					    <textarea class="form-control" v-model:value="post.description" rows="3" placeholder="Description"></textarea>
					</div>
                	
                    <button type="button" class="btn btn-primary" @click="goToIndexPage()">Cancel</button>                    
					<button type="button" class="btn btn-primary" @click="submitForm()">Submit</button>
				</form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    	data: function() {
    		return {
    			post: {
    				title: '',
    				description: '',
    			},
    			errors: []
    		}
    	},
    	methods: {
            goToIndexPage: function() {
                this.$router.push({ name: 'index' })
            },
    		submitForm: function() {
    			axios.post('/posts', this.post)
    			.then(response => {
    				this.$router.push({ name: 'index' })
    				swal(response.data.status)
    			})
    			.catch(e => {
    				this.errors.push(e)
    			})
    		}
    	}
    }
</script>
