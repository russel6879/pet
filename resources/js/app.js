/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('index', require('./components/Index.vue').default);
import AddPost from './components/AddPost.vue'
import  UserPost from './components/UserPost.vue';
import  MyPost from './components/MyPost.vue';
import  EditPost from './components/EditPost.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import Swal from 'sweetalert2'
 window.Swal = Swal
 const Toast = Swal.mixin({
 toast: true,
 position: 'top-end',
 showConfirmButton: false,
 timer: 3000,
 timerProgressBar: true,
 onOpen: (toast) => {
 toast.addEventListener('mouseenter', Swal.stopTimer)
 toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})
window.Toast = Toast
 import VueRouter from 'vue-router'
  
 Vue.use(VueRouter)
    
 const routes = [
   
   { path: '/add', component: AddPost ,    meta: { hideDashboard: true }},
   { name:'myPost', path: '/myPost', component: MyPost ,    meta: { hideDashboard: true }},
   {
    name: 'user',
    path: '/user/:id',
    component: UserPost,
    meta: { hideDashboard: true }
   },
   {
    name: 'editpost',
    path: '/editpost/:id',
    component: EditPost,
    meta: { hideDashboard: true }
   },
 ]
   
 const router = new VueRouter({
     mode: 'history',
   routes 
 })
 

const app = new Vue({
    el: '#app',
    router
});
