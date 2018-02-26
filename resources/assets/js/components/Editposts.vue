<template id="post-edit">
   <div>
   <h3>Add a new Post</h3>
   <form v-on:submit.prevent="editPost">
  <div class="form-group">
    <label for="add-title">title</label>
    <input type="text" class="form-control" id="add-title" v-model="post.title" placeholder="Enter title" required>
  </div>
  <div class="form-group">
    <label for="add-body">Post Body</label>
    <textarea class="form-control" id="add-body" rows="3" v-model="post.body" required></textarea>

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <router-link class="btn btn-success btn-lg" style="margin-top:30px" v-bind:to="{name:'Listposts',params:{}}">back
       </router-link>
   </div>
</template>
<script>
 export default {
   data:function(){
     return {post:{title:'',body:''}};
   },
    created: function(){
     let uri = "http://localhost:8000/posts/"+this.$route.params.id+"/edit";
     axios.get(uri).then((response) => {
       this.post = response.data;
     })
   },
   methods: {
     editPost : function(){
     let uri = "http://localhost:8000/posts/"+this.$route.params.id;
     axios.patch(uri, this.post).then((response) => {
     this.$router.push({name:'Listposts'})
     })
     }
   }
 }
</script>
<style lang="css">
</style>