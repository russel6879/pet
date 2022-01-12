<template>
  <div class="shop-area pt-100 pb-100 gray-bg">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9">
          <div class="shop-topbar-wrapper">
            <div class="product-sorting-wrapper mx-auto">
              <div class="product-show shorting-style">
                <div class="shop-widget">
                  <div class="shop-search">
                    <form class="shop-search-form">
                      <input
                        type="text"
                        :value="data"
                        @input="(e) => (data = e.target.value)"
                        autocomplete="off"
                        @keyup="search(data)"
                        placeholder="Search Pet"
                      />
                      <button>
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
                <div
                  class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6"
                  v-for="data in searchItem"
                  :key="data.id"
                >
          
                  <div class="product-wrapper mb-10">
                    <div class="product-img">
                      <img :src="'/images/' + data.image" alt="" />
                    </div>

                    <div class="product-list-content">
                      <h4>
                        <router-link
                          :to="{ name: 'user', params: { id: data.user.id } }" style="color: #7e4c4f"
                          ><i class="fas fa-user"></i>&nbsp;{{ data.user.name }}</router-link
                        >
                      </h4>

                      <div class="product-price">
                        <span class="new" v-html="matchName(data.pet.petType)"></span>
                        <span class="new" v-html="matchName(data.petName)"></span>
                        <span class="new" v-if="data.color" v-html="matchName(data.color.color)">   </span>
                      </div>

                       <p v-html="matchName(data.description)"></p>

                      <div class="product-price">
                        <span class=""
                          ><span class="text-primary">Contact:</span>&nbsp;{{
                            data.phone
                          }}</span
                        >&nbsp;
                        <span class="new"
                          ><span class="text-success" v-if="data.location"
                            >Location:</span
                          >&nbsp;<span v-html="matchName(data.location.location)"></span>
                        </span>
                      </div>
                      <div class="product-list-action">
                        <!-- <div class="product-list-action-left">
                          <a class="addtocart-btn" title="Add to cart" href="#"
                            ><i class="ion-bag"></i> Donate</a
                          >
                        </div> -->
                        <div class="product-list-action-right" v-if="auth">
                          <span v-if="data.authlike != null">
                            <span title="Like" class="ht"  @click.prevent="dislike(data.id)"
                              ><i class="ti-heart" style="color: red"></i
                              >{{ data.like_count }}</span
                            ></span
                          >
                          <span
                            title="Like"
                            class="ht"
                            @click.prevent="like(data.id)"
                            v-else
                            ><i class="ti-heart"></i>{{ data.like_count }}</span
                          >
                        </div>
                        <div class="product-list-action-right" v-else>
                          <a
                            title="Like"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            href="#"
                            ><i class="ti-heart"></i>{{ data.like_count }}</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div v-if="searchItem==''"><center><h4 class="text-danger">Your search Item Not found</h4></center></div>
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
              <h4 class="shop-sidebar-title"><i class="fas fa-filter" style="color: #7e4c4f"></i>&nbsp;FILTER BY</h4>
              <div class="shop-list-style mt-20">
                 <label for="exampleFormControlSelect1">Pet Type</label>
                 <select class="form-control" v-model="selectedType" @change.prevent="type()">
    <option  v-for="type in types" v-bind:value=type.id :key="type"  >{{type.petType}}</option>
 
   
  </select>
              </div>
              <div class="shop-list-style mt-20">
                 <label for="exampleFormControlSelect1">Pet Color</label>
                 <select class="form-control" v-model="selectedColor" @change.prevent="color()">
    <option  v-for="color in colors" v-bind:value=color.id :key="color"  >{{color.color}}</option>
 
   
  </select>
              </div>
              <div class="shop-list-style mt-20">
                 <label for="exampleFormControlSelect1">Location</label>
                 <select class="form-control" v-model="selectedLocation" @change.prevent="location()">
    <option  v-for="location in locations" v-bind:value=location.id :key="location"  >{{location.location}}</option>
 
   
  </select>
              </div>
        
            </div>
            <div class="shop-widget mt-50">
              <h4 class="shop-sidebar-title">Category</h4>
              <div class="shop-list-style mt-20">
                <ul>
                  <li
                    v-for="type in types"
                    :key="type.id"
                    style="cursor: pointer"
                  >
                    <span @click.prevent="searchCategory(type.id)"
                      ><i class="fas fa-tags" style="color: #7e4c4f"></i
                      >&nbsp;&nbsp;{{ type.petType }}</span
                    >
                  </li>
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
  
  data() {
    return {
      auth: "",
      getDatas: [],
      types: [],
      locations: [],
      colors: [],
       selectedType: '',
    selectedLocation: '',
    selectedColor: '',
    selectedYear: '',
    searchData:'',
  items:[]
    };
  },

  mounted() {
    this.viewInfo();
    this.viewPost();
    this.viewType();
    this.viewLocation();
    this.viewColor();
  },
  methods: {
    viewInfo() {
      axios.get("authInfo").then((res) => {
        this.auth = res.data.info;
      });
    },
    viewPost() {
      axios.get("/viewPost").then((res) => {
        this.getDatas = res.data.data;
        this.items = res.data.data;
       
      });
    },
    like(id) {
      axios.post("like", { postId: id }).then((res) => {
        this.viewPost();
      });
    },
    dislike(id) {
      axios.delete("like/"+id ).then((res) => {
        this.viewPost();
      });
    },
    viewType() {
      axios.get("petType").then((res) => {
        this.types = res.data.type;
      });
    },
    viewLocation(){
               axios.get('location').then(res=>{
                  this.locations=res.data.location  
               })
       },
    viewColor(){
               axios.get('color').then(res=>{
                  this.colors=res.data.color  
               })
       },
       type(){
        this.searchData=''
       },
       location(){
 this.searchData=''
       },
       color(){
 this.searchData=''
       },
    search(dataItem) {
      this.selectedType= '',
         this.selectedColor= '',
         this.selectedLocation= '',
    this.searchData='',
      this.searchData=dataItem;
      // axios.get(`searchPost/` + data).then((res) => {
      //   if (res == "NotFound") {
      //     alert("notfount");
      //   } else {
      //     this.getDatas = res.data.data;
      //   }
      // });
    },
    searchCategory(id) {
       this.selectedLocation= '',
       this.selectedColor= '',
    this.selectedType= '',
    this.searchData='', 
     this.selectedType=id;
    },
 matchName(current) {
      let reggie = new RegExp(this.searchData, "ig");
      let found = current.search(reggie) !== -1;
      return !found ? current : current.replace(reggie, '<b style="background:rgb(246, 171, 68)">' + this.searchData + '</b>');
    }
  },
    computed: {
    searchItem: function () {
       
      let filterType= this.selectedType,     
       filterLocation=this.selectedLocation,      
       filterColor=this.selectedColor,      
       filterSearch=this.searchData     
      
  
      return this.items.filter(function(item){
        let filtered = true
        if(filterType ){
     
          filtered = item.petType == filterType
       
        }
         if(filtered){
          if(filterLocation ){
           
            filtered = item.location.id == filterLocation
          }
        }
         if(filtered){
          if(filterColor ){
           
            filtered = item.color.id == filterColor
          }
        }
         if(filtered){
          if(filterSearch ){
            filtered = item.petName.toLowerCase().includes(filterSearch.toLowerCase())||item.description.toLowerCase().includes(filterSearch.toLowerCase())||item.location.location.toLowerCase().includes(filterSearch.toLowerCase()) ||item.color.color.toLowerCase().includes(filterSearch.toLowerCase()||item.typr.petType.toLowerCase().includes(filterSearch.toLowerCase()))         }
        }
     
        return filtered
      })
    }
  },
};
</script>
<style>

.highlight{ color:red
}</style>