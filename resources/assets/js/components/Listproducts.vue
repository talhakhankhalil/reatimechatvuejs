<template id="post-list">
   <div class="row">
    <div col-md-12>
      <div>
       <router-link class="btn btn-info btn-xs pull-right" v-bind:to="{ name : 'Addposts'} ">Add new Product
       </router-link>
       </br></br>
      </div>
       <div class="row">
         <div class="col-md-4" v-for="product in filteredPosts">
           <div class="thumbnail">
             <img src="https://thumbs.dreamstime.com/b/male-avatar-shirt-tie-icon-flat-style-isolated-white-background-people-symbol-vector-illustration-79244333.jpg">
             <div class="caption">
               <h3>{{ product.name}}</h3>
               <p>{{product.price}}</p>
               <hr>
               <p>
                 <a href="#" class="btn btn-success">Wishlist</a>
                  <a href="#" class="btn btn-primary">Buy</a>
               </p>
             </div>
           </div>
         </div>
       </div>
      </div>
   </div>
</template>
<script>
 export default {
   data:function(){
     return {
       products:''
     };
   },
   created: function(){
     let uri = "http://localhost:8000/products";
     axios.get(uri).then((response) => {
       this.products = response.data;
     })
   },
   computed:{
     filteredPosts:function(){
      if(this.products.length){
        return this.products;
      }
     }
   }
 }
</script>
<style lang="css">
.thumbnail img {
    border-radius: 50%;
    width: 300px;
    padding: 20px;
}
</style>