<template>
    <div class="shop-area pt-100 pb-100 gray-bg">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-10">
                       
                        <div class="grid-list-product-wrapper">
                            <div class="product-view product-list">
                                <div class="row">
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6"  v-for="data in getDatas" :key="data.id">
                                        <div class="product-wrapper mb-10">
                                            <div class="product-img">
                                                
                                                    <img :src="'/images/'+ data.image" alt="">
                                          
                                                
                                            </div>
                                      
                                            <div class="product-list-content" >
                                                <h4><router-link   :to="{ name: 'user', params: { id: data.user.id } }">{{data.user.name}}</router-link>&nbsp;&nbsp;&nbsp;&nbsp;<i @click.prevent="deletePost(data.id)" class="fas fa-trash-alt" style="color: #e34747;cursor:pointer"></i>&nbsp;&nbsp;&nbsp;<router-link   :to="{ name: 'editpost', params: { id: data.id } }"><i class="fas fa-edit" style="color: #72a9fa;"></i></router-link></h4>
                                                 
                                                <div class="product-price">
                                                    <span class="new ">{{data.pet.petType}} </span>
                                                  <span class="new ">{{data.petName}} </span>
                                                  <span class="new ">{{data.color}} </span>
                                                </div>
                                           
                                                <p>{{data.description}}</p>
                                             
                                                 <div class="product-price">
                                                    <span class=""><span class="text-primary">Contact:</span>&nbsp;{{data.phone}}</span>&nbsp;
                                                    <span class="new"><span class="text-success" v-if="data.location">Location:</span>&nbsp;{{data.location.location}} </span>
                                              
                                                </div>
                                                <div class="product-list-action">
                                                    <div class="product-list-action-left">
                                                        <a class="addtocart-btn" title="Add to cart" href="#"><i class="ion-bag"></i> Donate</a>
                                                    </div>
                                                    <div class="product-list-action-right" v-if="auth">
                                                        <span v-if="data.authlike!=null"> <span title="Like" class="ht"><i class="ti-heart" style="color:red"></i>{{data.like_count}}</span></span>
                                                        <span title="Like" class="ht" @click.prevent="like(data.id)" v-else><i class="ti-heart " ></i>{{data.like_count}}</span>
                                                       
                                                    </div>
                                                    <div class="product-list-action-right" v-else>
                                                        <a title="Like" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="ti-heart"></i>{{data.like_count}}</a>
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                                <!-- <div class="pagination-style text-center mt-10">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-arrow-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a class="active" href="#"><i class="icon-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data (){
            return{
             auth:'',
             getDatas:[],
             types:[],
            }
        },
        mounted() {
            this.viewInfo()
            this.viewPost()
            this.viewType()
        },
        methods:{
          viewInfo()  {
              axios.get('/authInfo').then(res=>{
               this.auth=res.data.info
              })
          },
          viewPost(){
            axios.get('/myPostGet').then(res=>{
              this.getDatas=res.data.data
            })
          },
          like(id){
              axios.post('like',{postId:id}).then(res=>{
                  this.viewPost()
              })
                  
          },
          deletePost(id){
                  axios.delete('/pet/'+id).then(res=>{
                   this.viewPost();
                    Toast.fire({
                           icon: "success",
                 title: "Successfully Deleted!!!",
          });   
                  })
          },
             viewType(){
               axios.get('petType').then(res=>{
                  this.types=res.data.type  
               })
       },
      
        }
    }
</script>
