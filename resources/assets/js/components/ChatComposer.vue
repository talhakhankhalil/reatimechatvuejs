<template>
    <div class="chat-composer container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
              <input type="text" placeholder="Start your message here...." v-model="messageText" @keyup.enter="sendMessage">
              <br>
              <button class="btn btn-primary btn-small" @click="sendMessage">Send</button>
             </div>
          </div>
       </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          messageText: ""
        }
      },
      methods:{
        sendMessage(){
          this.$emit('messagesent',{
            message: this.messageText,
            user: {
              name: $('meta[name="name"]').attr('content')
            }
          });
          this.messageText = "";
        }
      }
    }
</script>
<style>
input[type="text"] {
    width: 100%;
}
</style>
