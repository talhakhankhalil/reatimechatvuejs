
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios').default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //Regsitring all the vue components 
let AppLayout = require('./components/App.vue');

// Vue.component('notification', require('./components/Notification.vue'));
// Vue.component('chat-message', require('./components/ChatMessage.vue'));
// Vue.component('chat-log', require('./components/ChatLog.vue'));
// Vue.component('chat-composer', require('./components/ChatComposer.vue'));

// Listing all the Post and Regsiter all the components
const Listposts = Vue.component('Listposts', require('./components/Listposts.vue'));
const Viewposts = Vue.component('Viewposts', require('./components/Viewposts.vue'));
const Addposts = Vue.component('Addposts', require('./components/Addposts.vue'));
const Editposts = Vue.component('Editposts', require('./components/Editposts.vue'));
const Deleteposts = Vue.component('Deleteposts', require('./components/Deleteposts.vue'));
const Listproducts = Vue.component('Listproducts', require('./components/Listproducts.vue'));
 
Vue.use(VueRouter,VueAxios,axios);

const routes = [
  {
    name: "Listposts",
    path:"/all",
    component:Listposts
  },
  {
    name: "Addposts",
    path:"/add-posts",
    component:Addposts
  },
  {
    name: "Editposts",
    path:"/edit/:id",
    component:Editposts
  },
  {
    name: "Deleteposts",
    path:"/delete-post",
    component:Deleteposts
  },
  {
    name: "Viewposts",
    path:"/view/:id",
    component:Viewposts
  },
  {
    name: "Listproducts",
    path:"/allp",
    component:Listproducts
  }
];

const router = new VueRouter({ mode : 'history',routes:routes});
new Vue(
 Vue.util.extend({ router },AppLayout)
).$mount('#crudApp');
new Vue(
 Vue.util.extend({ router },AppLayout)
).$mount('#products');


// const app = new Vue({
//     el: '#app',
//     methods:{
//     	addMessage(message){
//     		var self = this;
//     		this.messages.push(message);
//     		axios.post('/postmessages', message).then(resposne =>{
//     			// anything goes here
//     		});
//     	}
//     },
//     created(){
//     	Echo.private('testChannel')
//        .listen('TaskEvent', (e) => {
//         console.log(e);
//     });
//        Echo.join('chatroom')
//        .here((users) => {
//           this.usersInRoom = users;
//        })
//        .joining((users) => {
//        	 this.usersInRoom.push(user);
//        })
//        .leaving((users) => {
//        	 this.usersInRoom = this.usersInRoom.filter(u => u != user);
//        })
//        .listen('MessagePosted', (e) => {
//        	  this.messages.push({
//               message: e.message.message,
//               user:e.user
//        	  });
//     });
//       axios.get('messages').then(response => {
//       	this.messages = response.data
//       });
//     },
//     data: {
//     	  messages: [],
//     	  usersInRoom:[]
//     }
    
// });

const app = new Vue({
   el: '#app1',
   data:{
     message: 'Talha Khan is Software Engineer',
     count: 0
   },
   methods: {
     how: function(){
      alert('Hy i am alert box');
     },
     updateCount: function(){
       this.count+= 1
     }
   }
})

