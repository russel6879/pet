<template>
  <!-- my account start -->
  <div class="my-account-area pt-100 pb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="checkout-wrapper">
            <div id="faq" class="panel-group">
              <div class="panel panel-default">
                <div
                  id="my-account-1"
                  class="panel-collapse collapse show"
                  data-bs-parent="#faq"
                >
                  <div class="panel-body">
                    <div class="billing-information-wrapper">
                      <div class="account-info-wrapper">
                        <h4>Add Post</h4>
                      </div>
                      <form @submit.prevent="add()">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="billing-info">
                              <label>Title</label>
                              <input v-model="form.title" type="text" />
                            </div>
                          </div>
                         
                       
                          <div class="col-lg-12 col-md-12">
                            <div class="billing-info">
                              <label>Description</label>
                              <textarea
                                v-model="form.description"
                                type="text"
                              ></textarea>
                            </div>
                          </div>
                         
                          <div class="col-lg-12 col-md-12">
                            <div class="billing-info">
                              <label>Image</label>
                              <input
                                type="file"
                                @change="changeImage($event)"
                                name="image"
                              />
                            </div>
                            <img
                              v-if="form.image"
                              :src="OurPhoto()"
                              name="image"
                              class="img-responsive"
                              height="70"
                              width="90"
                            />
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
   
  </div>
</template>

<script>
import Form from "vform";
export default {
  data() {
    return {
      form: new Form({
        title: "",
        image: "",      
        description: "",
      
      }),
    
    };
  },
  mounted() {
    this.viewInfo();

  },
  methods: {
    viewInfo() {
      axios.get("authInfo").then((res) => {
        this.auth = res.data.info;
      });
    },
    add() {
      this.form.post("blog").then((res) => {
        this.form.reset();
        Toast.fire({
          icon: "success",
          title: "Successfully Added!!!",
        });
      });
    },
    changeImage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = (event) => {
        this.form.image = event.target.result;
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
      this.imageOne = true;
    },
    OurPhoto() {
      if (this.form.image !== null) {
        let photo = this.form.image;
        if (photo.length > 100) {
          return this.form.image;
        } else {
          return `productImage/${this.form.image}`;
        }
      }
    },
   
  },
};
</script>
