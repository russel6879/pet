<template>
    <!-- my account start -->
        <div class="my-account-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a  href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <input type="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Telephone</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Fax</label>
                                                            <input type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ti-arrow-up"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
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
            </div>
        </div> 
</template>

<script>
    export default {
        data (){
            return{
             auth:'',
            }
        },
        mounted() {
            this.viewInfo()
        },
        methods:{
          viewInfo()  {
              axios.get('authInfo').then(res=>{
               this.auth=res.data.info
              })
          }
        }
    }
</script>
