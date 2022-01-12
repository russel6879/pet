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
                                                <h4><router-link style="color: #7e4c4f"  :to="{ name: 'user-blog', params: { id: data.user.id } }"><i class="fas fa-user"></i>&nbsp;{{data.user.name}}</router-link></h4>
                                                 
                                                <div class="product-price">
                                                    <span class="new ">{{data.title}} </span>
                                               
                                                </div>
                                           
                                                <p>{{data.description}}</p>
                                             
                                              
                                                <div class="product-list-action">
                                                    <!-- <div class="product-list-action-left">
                                                        <a class="addtocart-btn" title="Add to cart" href="#"><i class="ion-bag"></i> Donate</a>
                                                    </div> -->
                                                 
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
        
            }
        },
        mounted() {
            this.viewInfo()
            this.viewPost()
     
        },
        methods:{
          viewInfo()  {
              axios.get('/authInfo').then(res=>{
               this.auth=res.data.info
              })
          },
          viewPost(){
            axios.get('/viewUserBlogPost/'+this.$route.params.id).then(res=>{
              this.getDatas=res.data.data
            })
          },
     
       
      
        }
    }
</script>
