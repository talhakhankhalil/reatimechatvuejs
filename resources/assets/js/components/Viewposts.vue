<template id="post">
   <div>
   <h3>
    {{post.title}}
   </h3>
   <strong>Body:</strong>
    <div>
     {{post.body}}
    </div>
    <br>
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
     let uri = "http://localhost:8000/posts/"+this.$route.params.id;
     axios.get(uri).then((response) => {
       this.post = response.data;
     })
   }
 }
</script>
<style lang="css">
</style>