<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">Welcome to Products</div>

              <div class="card-body">
                 You can Create,Read,Update,Delete Products here
                 <br><br><router-link :to="{ name: 'create' }" class="btn btn-primary">Create Product</router-link>
                 <router-link :to="{ name: 'posts' }" class="btn btn-primary">View Products</router-link>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>