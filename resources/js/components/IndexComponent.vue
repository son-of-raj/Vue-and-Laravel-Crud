<template>
  <div>
      <h1>Products</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Product</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>OEM</th>
                <th>Model Number</th>
                <th>Product Type</th>
                <th>Price</th>
                <th>Configuration assumption</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.oem }}</td>
                    <td>{{ product.model_no }}</td>
                    <td>{{ product.product_type }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.config }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deletePost(product.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          products: []
        }
      },
      created() {
      let uri = 'http://127.0.0.1:8000/api/posts';
      this.axios.get(uri).then(response => {
        this.products = response.data.data;
      });
    },
    methods: {
      deletePost(id)
      {
        let uri = `http://127.0.0.1:8000/api/post/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.products.splice(this.products.indexOf(id), 1);
        });
      }
    }
  }
</script>