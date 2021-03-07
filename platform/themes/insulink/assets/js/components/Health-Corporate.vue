<template>
<div>
  <section class="bg-gray-200 py-3">
    <div class="container">
       <div class="row">
      <div class="col-sm-9">
        <p class="text-primary-color lead mb-4">
          As an employer, you can provide your staff with a cover that provides a holistic approach to their health needs ranging great benefits from doctors consultations, physiotherapy, operating theater fees, diagnostic fees, hospital accommodation, day surgery, ICU charges, drugs, dressings, surgical appliances, pathology, laboratory and ultrasounds, overseas referral, local road & air evacuation.
<br>No matter the size of your business, we have you covered.
        </p>
      </div>
      <div class="col-sm-3">
        <a href="#corp-form" class="btn my-3 btn-block btn-secondary">Get Started</a>
      </div>
    </div>
    </div>
  </section>
  <div class="container my-12" id="corp-form">
   
    <div class="row justify-content-center">

      <div class="col-sm-8">
        <div v-show="checkerrors === true" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg" style="position: fixed;right: 20px;">
          <h4 class="text-white mb-3">Errors found on the form</h4>
          <div v-for="(v, k) in allerros" :key="k">
            <p v-for="error in v" :key="error" class="text-sm">
              <svg class="inline-flex text-white mr-2" width="25" height="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ error }}
            </p>
          </div>
          <p class="text-white mt-3 lead">click on the form or press ESC key to return to the form</p>
        </div>
        <el-card class="box-card mb-12" >
          <div slot="header" class="clearfix">Basic Information</div>
          <div class="p-3">
            <div class="form-group row">
              <label for="" class="col-sm-5">Employer/Group Name</label>
              <input
                type="text"
                class="form-control col-sm-7"
                placeholder="Enter name of the company here ..."
                required
                v-model="form.company"
              />
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5">Who should we Contact?</label>
              <input
                type="text"
                class="form-control col-sm-7"
                placeholder="Enter the name of the contact person in your company here ..."
                required
                v-model="form.contact_person"
              />
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5">Telephone Number</label>
              <input
                type="text"
                class="form-control col-sm-7"
                placeholder="Enter company's telephone number here ..."
                required
                v-model="form.telephone"
              />
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5"
                >How many Employees do you want to Insure -
                <small>Kindly Include their dependants</small></label
              >
              <input
                type="text"
                class="form-control col-sm-7"
                placeholder="Enter the number of employees you want to cover including their dependants here ..."
                required
                v-model="form.no_employees"
              />
            </div>
          </div>
        </el-card>

        <el-card class="box-card">
          <div slot="header" class="clearfix">Cover Information</div>
          <div class="p-3">
            <div class="form-group row">
              <label for="" class="col-sm-5">Inpatient Limit</label>
              <VueSimpleRangeSlider
                    style="width: 100%"
                    :min="200000"
                    :max="60000000"
                    barColor="#048ABF"
                    activeBarColor="#F15115"
                    :logarithmic="true"
                    v-model="form.ip"
            />
              
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5">Outpatient Limit</label>
              <VueSimpleRangeSlider
                    style="width: 100%"
                    :min="5000"
                    :max="60000000"
                    barColor="#048ABF"
                    activeBarColor="#F15115"
                    :logarithmic="true"
                    v-model="form.op"
            />
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5"
                >Preferred Insurer/underwriter</label
              >
              <select type="text" v-model="form.underwriter_id" class="form-control col-sm-7" required>
                <option :value="item.id" v-for="item in underwriters" :key="item.id">{{item.company}}</option>
              </select>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-5">Preferred email address</label>
              <input
                type="text"
                class="form-control col-sm-7"
                placeholder="Enter email address here ..."
                required
                v-model="form.email"
              />
            </div>
            
          </div>
        </el-card>
        <div class="row">
            <div class="col-sm-7"></div>
                <div class="col-sm-5">
                    <button type="submit" @click="buycorpproduct" class=" my-4 btn-block btn btn-primary">Get Quotations</button>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
  
</template>

<script>
import VueSimpleRangeSlider from 'vue-simple-range-slider';
import 'vue-simple-range-slider/dist/vueSimpleRangeSlider.css';
export default {
  components: { VueSimpleRangeSlider },
  data() {
    return {
      underwriters: {},
      allerros: [],
      checkerrors:false,
      form: {
            company:'',
            contact_person:'',
            telephone:'',
            no_employees:'',
            ip:500000,
            op:5000,
            underwriter_id:'',
            email:''
      }
    };
  },
  mounted() {
      this.getUnderwriters();
  },
  methods: {
    formatTooltip(val) {
        return val / 100;
      },
    getUnderwriters() {
      Swal.fire({
        title: "Please Wait..",
        text: "We are loading all the best Underwriters, just for you ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      this.$store
        .dispatch("getHealthUnderwriters")
        .then((response) => {
            console.log(response)
          this.underwriters = response.data;
          Swal.close();
        })
        .catch((err) => {
          console.error(err);
          Toast.fire({
            icon: "error",
            title: "Error Loading Underwriters",
          });
        });
    },
    buycorpproduct() {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your quotations, just hold on ...",
        allowOutsideClick: true,
        allowEscapeKey: true,
        allowEnterKey: true,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      axios.post("/purchase/health/corporate/buy", this.form)
        .then((response) => {
          this.allerros = [];
          this.$notify({
            message: response.message,
            type: "success",
            title: "Success",
            duration: 5 * 1000,
          });
          window.location.href = '/';
          Swal.close();
        })
        .catch((error) => {
          this.checkerrors = true;
          this.$notify.error({
            message: 'there was an error on your form, kindly check',
            title: "Error",
            duration: 5 * 1000,
          });
          this.allerros = error.response.data.errors;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>