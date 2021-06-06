<template>
  <div>
    <section class="bg-travel py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h2 class="text-white text-shadow mb-2">
              Travel is what you want it to be.
            </h2>
            <p class="text-white text-shadow mb-4">
              Whether you are reuniting with family and friends in faraway
              places outside of Kenya or embarking on a solo adventure to
              explore the unknown, make the most of your trip covered with our
              Travel Insurance.
            </p>
          </div>
          <div class="col-sm-3">
            <a href="#travel-form" class="btn my-3 btn-block btn-secondary"
              >Get Started</a
            >
          </div>
        </div>
      </div>
    </section>
    <section id="travel-form" class="bg-gray-200">
      <div class="container py-12">
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <el-card class="box-card mb-12">
              <div slot="header" class="clearfix">Basic Information</div>
              <div class="p-3">
                <label for="">Travel Duration</label>
                <div class="form-group">
                  <label for="">Which date are you travelling?</label>
                  <el-date-picker
                    v-model="travel_duration"
                    type="daterange"
                    range-separator="To"
                    start-placeholder="Start date"
                    end-placeholder="End date"
                    :picker-options="pickerOptions"
                  >
                  </el-date-picker>
                </div>
                <div class="form-group">
                  <label for="">How many People are Travelling?</label>
                  <div>
                    <el-radio v-model="travellers" label="me-spouse" border
                      >Just Me/My Spouse</el-radio
                    >
                    <el-radio v-model="travellers" label="couple" border
                      >Couple</el-radio
                    >
                    <el-radio v-model="travellers" label="family" border
                      >My Family</el-radio
                    >
                    <el-radio
                      v-model="travellers"
                      label="me-spouse-children"
                      border
                      >Me/My Spouse & Children</el-radio
                    >
                    <el-radio v-model="travellers" label="children" border
                      >Children alone</el-radio
                    >
                  </div>
                </div>
                <div class="form-group">
                  <label for=""
                    >Enter Age of the Oldest Person Travelling</label
                  >
                  <input type="text" class="form-control" v-model="age" />
                </div>
                <div class="form-group">
                  <label for="">Country of Destination</label>
                  <div>
                    <el-select
                      class="w-full"
                      v-model="destination"
                      clearable
                      filterable
                      reserve-keyword
                      placeholder="Select your Country of Destination"
                      :loading="loading"
                    >
                      <el-option
                        v-for="item in countries"
                        :key="item.value"
                        :label="item.value"
                        :value="item.value"
                      >
                      </el-option>
                    </el-select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">What is the Purpose of your Trip?</label>
                  <div>
                    <el-radio v-model="purpose" label="holiday-business" border
                      >Business/Holiday Trip</el-radio
                    >
                    <el-radio v-model="purpose" label="study" border
                      >Study</el-radio
                    >
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Enter Cellphone number</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="cellphone"
                    placeholder="254"
                  />
                </div>
                <div class="form-group">
                  <label for="">Enter Full Names</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="names"
                    placeholder="First name last Name"
                  />
                </div>
                <div class="form-group">
                  <label for="">Enter Email</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="email"
                    placeholder="you@mail.com"
                  />
                </div>
                <div class="bg-gray-200 p-4">
                  <div class="row justify-content-center">
                    <div class="col-sm-6">
                      <el-button
                        type="primary"
                        class="w-100"
                        :loading="buttonLoading"
                        @click="sendTravel"
                        >Get Travel Quotes</el-button
                      >
                    </div>
                  </div>
                </div>
                
              </div>
            </el-card>
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
      travel_duration: "",
      travellers: "",
      destination: "",
      cellphone: "",
      email: "",
      names:"",
      age: 18,
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
    sendTravel() {
      this.buttonLoading = true;
      let payload = {
        travel_duration: this.travel_duration,
        travellers: this.travellers,
        destination: this.destination,
        age: this.age,
        purpose: this.purpose,
        cellphone: this.cellphone,
        email: this.email,
        names:this.names
      };
      this.$recaptcha("travelquote").then((token) => {
          if (token) {
            axios
                .post("/ajax/travel-quote/request", payload)
                .then((response) => {
                  Toast.fire({
                    icon: "success",
                    title: "Request sent! We will respond to your email soon",
                  });
                  this.buttonLoading = false;
                  window.location.href = "/";
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
};
</script>