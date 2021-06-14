<template>
  <div>
    <section id="claim-form" class="bg-gray-200 py-3">
      <div class="container py-12">
        <div class="row">
          <div class="col-sm-4">
            <p>Please Fill this form to get a quote</p>
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
  props: ["content"],
  data() {
    return {
      underwriters: {},
      cellphone: "",
      email: "",
      names: "",
      policy: "",
      underwriter: "",
      purpose: "",
      countries: {},
      buttonLoading: false,
      loading: false,
      pickerOptions: {
        disabledDate(time) {
          const date = new Date();
          return (
            time.getTime() < date.setTime(date.getTime() - 3600 * 1000 * 24)
          );
        },
      },
    };
  },
  created() {
    this.getcountries();
    this.getunderwriters();
  },
  mounted() {
    console.log(this.content);
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
        underwriter: this.underwriter,
        cellphone: this.cellphone,
        email: this.email,
        names: this.names,
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
      });
    },
  },
  computed: {
    currentUrl() {
      return window.location.pathname;
    },
  },
};
</script>
<style lang="scss" scoped>
.bg-products {
  p {
    font-size: 1.1rem;
    line-height: 1.5rem;
    /* text-shadow: #000 3px 0 10px; */
    font-weight: 200;
    max-width: 800px;
    background: #048abf;
    padding: 30px;
    margin-top: 60px;
  }
}
</style>