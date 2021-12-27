<template>
    <!-- my account start -->
        <div class="my-account-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                  
                                    <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Add Post</h4>
                                                  
                                                </div>
                                                <form @submit.prevent="update()"> 
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Pet Name</label>
                                                            <input v-model="form.petName" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Color</label>
                                                            <input v-model="form.color" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                             <label >Pet Type <button class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">Add Type</button></label>                                                         
                                                    <select id="inputState" v-model="form.petType" class="form-control">
                                                        <option selected>Select Pet Type</option>
                                                        <option v-for="type in types" :key="type.id" :value="type.id" >{{type.petType}}</option>
                                                    </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Location</label>
                                                            <input v-model="form.location" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Phone</label>
                                                            <input v-model="form.phone" type="text">
                                                        </div>
                                                    </div>
                                                       <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Description</label>
                                                              <textarea v-model="form.description" type="text"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Address</label>
                                                             <textarea v-model="form.address" type="text"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Image</label>
                                                            <input type="file"  @change="changeImage($event)" name="image">
                                                        </div>
                                                            <img v-if="form.image"
                                                             :src="OurPhoto()" name="image" class="img-responsive" height="70" width="90" />
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    
                                                    <div class="billing-btn">
                                                        <button type="submit">Save</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
      
                </div>
            </div>
                          	<!-- modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
            
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-body mx-auto">
                     <div class="col-lg-12 col-md-12">
                                                
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Pet Type</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" v-model="form.petType" id="inputEmail3" placeholder="Pet Type">
        <span v-if="error" class="text-danger">This Pet Type Already Taken</span>

    </div>
  </div>
  
  <div class="form-group mt-3 " style="margin-left:30%">
  <div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
    <button type="button"  @click.prevent="addType()" class="btn btn-primary">Add</button>
  </div>
  </div>

                                                    </div>
                                                    </div>

                                  
                    </div>
                </div>
            </div>
       
        </div> 
</template>

<script>
import Form from 'vform'
    export default {
        data (){
            
            return{
                  form: new Form({
                   petType:'',
                   image:'',
                   petName:'',
                   color:'',
                   location:'',
                   phone:'',
                   description:'',
                   address:''
                  

                  }),
             auth:'',
             types:[],
              error:false,
            }
        },
        mounted() {
            this.viewPost()
            this.viewInfo()
            this.viewType()
        },
        methods:{
            viewPost(){
              axios.get('/pet/'+this.$route.params.id).then(res=>{
                     this.form.fill(res.data);
              })
            },
          viewInfo()  {
              axios.get('authInfo').then(res=>{
               this.auth=res.data.info
              })
          },
          update(){
                      axios.put(`/pet/${this.$route.params.id}`,this.form).then(res=>{
                         this.$router.push({ name: "myPost" });
                                      Toast.fire({
                           icon: "success",
                 title: "Successfully Updated!!!",
          });

                      })
          },
             changeImage(event) {
     let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = (event) => {
        this.form.image = event.target.result;
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
    },
      OurPhoto(){
       if(this.form.image!== null){
         let photo = this.form.image;
         if (photo.length >100 ){
         return this.form.image;
              
         }
         else{
           return `/images/${this.form.image}`
         }
       }
         
       },
       viewType(){
               axios.get('/petType').then(res=>{
                  this.types=res.data.type  
               })
       },
          addType(){
                 axios.post('petType',{petType:this.form.petType}).then(res=>{
                        $('#exampleModal2').modal('hide');
                         this.viewType()
                     this.form.petType='',
                     Toast.fire({
            icon: "success",
            title: "Successfully Added!!!",
          });
                 }).catch(res=>{
                    this.error=true;
                 })
          }
        }
    }
</script>
