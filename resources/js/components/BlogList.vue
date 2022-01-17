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
                        placeholder="Search Blog"
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
                          :to="{ name: 'user-blog', params: { id: data.user.id } }" style="color: #7e4c4f"
                          ><i class="fas fa-user"></i>&nbsp;{{ data.user.name }}</router-link
                        >
                      </h4>

                      <div class="product-price">
                   
                        <span class="new" v-html="matchName(data.title)"></span>
                    
                      </div>

                       <p v-if="data.description" v-html="matchName(data.description)"></p>

                   
                      <div class="product-list-action">
                        <!-- <div class="product-list-action-left">
                          <a class="addtocart-btn" title="Add to cart" href="#"
                            ><i class="ion-bag"></i> Donate</a
                          >
                        </div> -->
                     
                      </div>
                    </div>
                  </div>
                </div>
                <div v-if="searchItem==''"><center><h4 class="text-danger">Your search Item Not found</h4></center></div>
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
   
       selectedType: '',

    searchData:'',
  items:[]
    };
  },

  mounted() {
    this.viewInfo();
    this.viewPost();
  
  },
  methods: {
    viewInfo() {
      axios.get("authInfo").then((res) => {
        this.auth = res.data.info;
      });
    },
    viewPost() {
      axios.get("/viewBlog").then((res) => {
        this.items = res.data.data;
      
       
      });
    },
 
    search(dataItem) {
      
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
       
      let filterSearch=this.searchData     
      
  
      return this.items.filter(function(item){
        let filtered = true
      
         if(filtered){
          if(filterSearch ){
            filtered = item.title.toLowerCase().includes(filterSearch.toLowerCase())||item.description.toLowerCase().includes(filterSearch.toLowerCase())         }
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