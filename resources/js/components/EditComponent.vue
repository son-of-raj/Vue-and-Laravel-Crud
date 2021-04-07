<template>
  <div>
    <h1>Edit Post</h1>
    <form @submit.prevent="updatePost">
       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>OEM:</label>
            <input type="text" class="form-control" v-model="post.oem">
          </div>
        </div>
         <div class="col-md-6">
          <div class="form-group">
            <label>Model Number</label>
            <input type="text" class="form-control" v-model="post.model_no">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Type</label>
              <select class="form-control" v-model="post.product_type">
                <option value="Server">Server</option>
                <option value="Storage,">Storage</option>
                <option value="Network">Network</option>
                <option value="Backup">Backup</option>
              </select>
              <!-- <input type="text" class="form-control" v-model="post.product_type"> -->
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label>Price</label>
              <input type="text" class="form-control" v-model="post.price">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Configuration assumption</label>
              <textarea class="form-control" v-model="post.config" rows="4"></textarea>
              <!-- <input type="text" class="form-control" v-model="post.config"> -->
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          post: {}
        }
      },
      created() {
        let uri = `http://127.0.0.1:8000/api/post/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.post = response.data;
        });
      },
      methods: {
        updatePost() {
          let uri = `http://127.0.0.1:8000/api/post/update/${this.$route.params.id}`;
          this.axios.post(uri, this.post).then((response) => {
            this.$router.push({name: 'posts'});
          });
        }
      }
    }
</script>