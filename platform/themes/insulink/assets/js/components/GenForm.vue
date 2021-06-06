<template>
  <div>
    <section class="bg-claims py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <p class="text-white text-shadow mb-4">
              By completing this form, you will have provided Insulink Kenya Ltd with your Personal Information. Insulink Kenya Ltd will only use this information for lawful business purposes and is committed to protecting the integrity and confidentiality. Access will be granted to other third parties involved (assessors, underwriters, as well as the garages) to ensure your insurance claim settled in due time. You have the right to access and correct personal data that may or may not be correct or complete.
            </p>
            <a href="#claim-form" class="btn my-3 btn-secondary"
              >Get Started</a
            >
          </div>
          <div class="col-sm-3">
            
          </div>
        </div>
      </div>
    </section>
    <section id="claim-form" class="bg-gray-200">
      <div class="container py-12">
        <div class="row">
          <div class="col-sm-4">
            <h4>Insurance tips</h4>
            <ul class="bullet">
              <li>Report the incident to the police and get police Abstract within 24hrs</li>
            <li>Never accept liability</li>
           <li>Call us on 0741170907 or 0745488902</li>
           <li>Take the vehicle to a recommended garage</li>
           <li>Attach the original police abstract, logbook as well as the driving license.</li>
            </ul>
          </div>
          <div class="col-sm-8">
            <el-card class="box-card">
              <div slot="header" class="clearfix">Basic Information</div>
              <div class="p-3">
                <div class="form-group row">
                  <label for="" class="col-sm-5">Names</label>
                  <input type="text" class="col-sm-7 form-control" v-model="names"
                    placeholder="First name last Name">
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-5">Enter Cell-phone number <br><small>in this formart 254700000000</small></label>
                  <input
                    type="number"
                    name="cellphone"
                    class="col-sm-7 form-control"
                    v-model="cellphone"
                    placeholder="254"
                  />
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-5">Enter Email</label>
                  <input
                    type="email"
                    class="col-sm-7 form-control"
                    v-model="email"
                    placeholder="you@mail.com"
                  />
                </div>
                
                <div class="form-group row">
                  <label for="" class="col-sm-5">Select your preferred Underwriter for this Policy below</label>
                  <select class="col-sm-7 form-control" v-model="underwriter">
                    <option v-for="item in underwriters" :key="item.id" :value="item.id">{{item.company}}</option>
                  </select>
                </div>
                
              </div>
            </el-card>
            <div class="bg-gray-100 mb-12 p-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <el-button
                        type="primary"
                        :loading="buttonLoading"
                        @click="sendForm"
                        >Submit Request</el-button
                      >
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  data() {
    return {
      underwriters:{},
      cellphone: "",
      email: "",
      names:"",
      policy:"",
      underwriter:"",
      purpose: "",
      countries: {},
      buttonLoading: false,
      loading: false,
      pickerOptions: {
          disabledDate(time) {
            const date = new Date();
            return time.getTime() < date.setTime(date.getTime() - 3600 * 1000 * 24);
          },
      }
    };
  },
  created() {
    this.getcountries();
    this.getunderwriters();
  },
  methods: {
    getcountries() {
      axios
        .get("/ajax/countries")
        .then((response) => {
          this.countries = response.data;
        })
        .catch((err) => {
          Toast.fire({
            icon: "error",
            title: err,
          });
        });
    },
    getunderwriters() {
      axios
        .get("/general/underwriters")
        .then((response) => {
          this.underwriters = response.data;
        })
        .catch((err) => {
          Toast.fire({
            icon: "error",
            title: err,
          });
        });
    },
    sendForm() {
      this.buttonLoading = true;
      let payload = {
        product: this.currentUrl,
        underwriter:this.underwriter,
        cellphone: this.cellphone,
        email: this.email,
        names:this.names
      };
      this.$recaptcha("travelquote").then((token) => {
          if (token) {
            axios
                .post("/ajax/products-quote/request", payload)
                .then((response) => {
                  Toast.fire({
                    icon: "success",
                    title: "Request sent! We will respond to your email soon",
                  });
                  this.buttonLoading = false;
                  //window.location.href = "/";
                })
                
                .catch((err) => {
                  Toast.fire({
                    icon: "error",
                    title: err,
                  });
                });
          } else {
            Toast.fire({
                    icon: "warning",
                    title: "there was a problem, try again later",
            });
          }
      })
    },
  },
  computed:{
    currentUrl() {
      return window.location.pathname;
    },
  }
};
</script>