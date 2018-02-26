<template id="post-list">
   <div class="row">
    <div col-md-12>
      <div>
       <router-link class="btn btn-info btn-xs pull-right" v-bind:to="{ name : 'Addposts'} ">Add new Post
       </router-link>
       </br></br>
      </div>
      <table class="table table-bordered">
         <thead>
            <tr>
              <th>#</th>
              <th>Post title</th>
              <th>Post Body</th>
              <th class="cl-md-2">Actions</th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="(post,index) in filteredPosts">
                <td>{{ index + 1}}</td>
                <td>{{post.title}}</td>
                <td>{{post.body}}</td>
                <td><router-link class="btn btn-info btn-xs" v-bind:to="{ name : 'Viewposts', params:{id:post.id}}">Show</router-link>
                 <router-link class="btn btn-warning btn-xs" v-bind:to="{ name : 'Editposts', params:{id:post.id}}">Edit</router-link>
                <form v-on:submit.prevent="deletePost(post)">
                  <button type="submit" class="btn btn-primary btn-xs">delete</button>
                </form>
                </td>
            </tr>
         </tbody>
      </table>
      </div>
   </div>
</template>
<script>
 export default {
   data:function(){
     return {posts:''};
   },
   created: function(){
     let uri = "http://localhost:8000/posts";
     axios.get(uri).then((response) => {
       this.posts = response.data;
     })
   },
   methods: {
     deletePost : function(post){
     let uri = "http://localhost:8000/posts/"+post.id;
     axios.delete(uri,post.id).then((response) => {
     const idx = this.posts.indexOf(post)
     this.posts.splice(idx, 1)
     })
     }
   },
   computed:{
     filteredPosts:function(){
      if(this.posts.length){
        return this.posts;
      }
     }
   }
 }
</script>
<style lang="css">
</style>