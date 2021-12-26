<template>
    <div class="shop-area pt-100 pb-100 gray-bg">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="product-sorting-wrapper mx-auto">
                                <div class="product-show shorting-style ">
                                        <div class="shop-widget">
                            
                                <div class="shop-search ">
                                    <form class="shop-search-form">
                                        <input type="text"  :value="data" @input='e => data = e.target.value'  autocomplete="off"
                @keyup="search(data)" placeholder="Search Pet">
                                        <button >
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-view product-list">
                                <div class="row">
                                    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6"  v-for="data in getDatas" :key="data.id">
                                        <div class="product-wrapper mb-10">
                                            <div class="product-img">
                                                
                                                    <img :src="'/images/'+ data.image" alt="">
                                          
                                                
                                            </div>
                                      
                                            <div class="product-list-content" >
                                                <h4><a href="#">{{data.user.name}}</a></h4>
                                                 
                                                <div class="product-price">
                                                    <span class="new ">{{data.pet.petType}} </span>
                                                  <span class="new ">{{data.petName}} </span>
                                                  <span class="new ">{{data.color}} </span>
                                                </div>
                                           
                                                <p>{{data.description}}</p>
                                             
                                                 <div class="product-price">
                                                    <span class=""><span class="text-primary">Contact:</span>&nbsp;{{data.phone}}</span>&nbsp;
                                                  <span class="new"><span class="text-success">Location:</span>&nbsp;{{data.location}} </span>
                                                
                                                </div>
                                                <div class="product-list-action">
                                                    <div class="product-list-action-left">
                                                        <a class="addtocart-btn" title="Add to cart" href="#"><i class="ion-bag"></i> Donate</a>
                                                    </div>
                                                    <div class="product-list-action-right" v-if="auth">
                                                        <span v-if="data.like!=''"> <span title="Like" class="ht"><i class="ti-heart" style="color:red"></i>{{data.like_count}}</span></span>
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
                    <div class="col-lg-3">
                        <div class="shop-sidebar">
                       
                            
                            <div class="shop-widget mt-50">
                                <h4 class="shop-sidebar-title">Food Category </h4>
                                 <div class="shop-list-style mt-20">
                                    <ul>
                                        <li><a href="#">Canned Food</a></li>
                                        <li><a href="#">Dry Food</a></li>
                                        <li><a href="#">Food Pouches</a></li>
                                        <li><a href="#">Food Toppers</a></li>
                                        <li><a href="#">Fresh Food</a></li>
                                        <li><a href="#">Frozen Food</a></li>
                                    </ul>
                                </div>
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
            }
        },
        mounted() {
            this.viewInfo()
            this.viewPost()
        },
        methods:{
          viewInfo()  {
              axios.get('authInfo').then(res=>{
               this.auth=res.data.info
              })
          },
          viewPost(){
            axios.get('/viewPost').then(res=>{
              this.getDatas=res.data.data
            })
          },
          like(id){
              axios.post('like',{postId:id}).then(res=>{
                  this.viewPost()
              })
                  
          },
          search(data){
             axios.get(`searchPost/`+data).then(res =>{
          if(res=="NotFound"){
           alert('notfount')
          }else{
            this.getDatas=res.data.data
           
          }
      })
          }
        }
    }
</script>
