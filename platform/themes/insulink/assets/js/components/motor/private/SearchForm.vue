<template>
  <div class="swiper-slide step-one dsc_hero-section py-3">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <section class="">
            <div class="p-4">
              <div class="container lg:w-6/7 xl:w-6/7 mx-auto my-8">
                <div class="rounded-lg bg-white shadow-lg">
                  <div class="rounded-lg shadow-xs overflow-hidden">
                    <div class="p-12 border-b border-gray-200">
                      <h3 class="header-major text-gray-900 text-center">
                        Buying your Motor Insurance couldn't be this simpler
                      </h3>
                      <p
                        class="mt-1 header-mid text-uppercase text-gray-500 text-center mb-4"
                      >
                        Get your policy in 5 minutes
                      </p>
                      <div>
                        <div class="-mx-3 md:flex mb-6">
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0 z-0">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Vehicle is Used for?
                            </label>
                            <b-form-select
                              v-model="v_business"
                              class="form-control"
                              id="grid-policy"
                            >
                              <option value="" disabled selected>
                                Select Vehicle Activity below
                              </option>
                              <option
                                value="private"
                                v-show="
                                  currentUrl === '/motor-private-comprehensive'
                                "
                              >
                                Private Business
                              </option>
                              <option
                                value="commercial"
                                v-show="
                                  currentUrl ===
                                  '/motor-commercial-comprehensive'
                                "
                              >
                                Commercial Business
                              </option>
                            </b-form-select>
                          </div>
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Choose Policy Cover
                            </label>
                            <b-form-select
                              v-model="cover_type"
                              class="form-control"
                              id="grid-cover_type"
                            >
                              <option value="" disabled selected>
                                Select Cover type below
                              </option>
                              <option
                                value="c1"
                                v-show="v_business == 'commercial'"
                              >
                                Commercial (Comprehensive) - Own Goods
                              </option>
                              <!-- <option
                                value="c2"
                                v-show="v_business == 'commercial'"
                              >
                                Commercial (Third Party Only)
                              </option> -->
                              <option
                                value="c3"
                                v-show="v_business == 'commercial'"
                              >
                                Commercial PSV Online Comprehensive
                              </option>
                              <!-- <option
                                value="c4"
                                v-show="v_business == 'commercial'"
                              >
                                PSV SELF DRIVE (Third Party)
                              </option>
                              <option
                                value="c5"
                                v-show="v_business == 'commercial'"
                              >
                                PSV CHAUFFEUR DRIVEN (Comprehensive)
                              </option> -->
                              <option
                                value="c6"
                                v-show="v_business == 'private'"
                              >
                                Private (Comprehensive)
                              </option> 
                              <option
                                value="c7"
                                v-show="v_business == 'private'"
                              >
                                Private (Third Party Only)
                              </option>
                              <!-- <option
                                value="c8"
                                v-show="v_business == 'commercial'"
                              >
                                Tankers (Comprehensive)
                              </option> -->
                              <!-- <option
                                value="c9"
                                v-show="v_business == 'commercial'"
                              >
                                Special Vehicles (Comprehensive)
                              </option> -->
                              <!-- <option
                                value="c10"
                                v-show="v_business == 'commercial'"
                              >
                                Institutional (Comprehensive)
                              </option> -->
                              <!-- <option
                                value="c11"
                                v-show="v_business == 'commercial'"
                              >
                                Driving School (Comprehensive)
                              </option> -->
                              <option
                                value="c12"
                                v-show="v_business == 'commercial'"
                              >
                                General Cartage (Comprehensive)
                              </option>
                              <!-- <option
                                value="c13"
                                v-show="v_business == 'commercial'"
                              >
                                Motor Trade/Yard (Comprehensive)
                              </option> -->
                            </b-form-select>
                          </div>
                        </div>
                        <div
                          class="row justify-content-center bg-gray-200 p-3 my-2 mx-3"
                          v-show="
                            cover_type === 'c1' ||
                            cover_type === 'c8' ||
                            cover_type === 'c9' ||
                            cover_type === 'c10' ||
                            cover_type === 'c11' ||
                            cover_type === 'c12' ||
                            cover_type === 'c13'
                          "
                        >
                          <div class="col-sm-5">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Are you Insuring Fleet or Single Vehicle?
                            </label>
                            <div
                              class="uk-margin uk-grid-small uk-child-width-auto uk-grid"
                            >
                              <label
                                ><input
                                  class="uk-radio"
                                  type="radio"
                                  name="radio2"
                                  v-model="vehicle.is_fleet"
                                  value="true"
                                  checked
                                />
                                Fleet</label
                              >
                              <label
                                ><input
                                  class="uk-radio"
                                  type="radio"
                                  name="radio2"
                                  v-model="vehicle.is_fleet"
                                  value="false"
                                />
                                Single Vehicle</label
                              >
                            </div>
                          </div>
                        </div>
                        <div class="-mx-3 md:flex mb-6">
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0 z-0">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Choose Make of your Vehicle
                            </label>
                            <b-form-select
                              v-model="v_make"
                              @change="getthismodel"
                              :class="{
                                'opacity-25': vehicle.is_fleet == 'true',
                              }"
                              :disabled="vehicle.is_fleet == 'true'"
                              class="form-control"
                              id="grid-makes"
                            >
                              <option value="" disabled selected>
                                Select Vehicle Make below
                              </option>
                              <option
                                v-for="make in getthismakes"
                                :key="make.id"
                                :value="make.id"
                              >
                                {{ make.name }}
                              </option>
                            </b-form-select>
                          </div>
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Choose Model of your Vehicle
                            </label>
                            <b-form-select
                              v-model="v_model"
                              :class="{
                                'opacity-25': vehicle.is_fleet == 'true',
                              }"
                              :disabled="vehicle.is_fleet == 'true'"
                              class="form-control"
                              id="grid-models"
                            >
                              <option value="" disabled selected>
                                Select Model below
                              </option>
                              <option
                                :value="item.id"
                                v-for="item in v_models"
                                :key="item.id"
                              >
                                {{ item.name }}
                              </option>
                            </b-form-select>
                          </div>
                        </div>
                        <div class="-mx-3 md:flex mb-6">
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0 z-0">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Choose the Year of Manufacture of your Vehicle
                            </label>
                            <b-form-select
                              v-model="v_manufacture"
                              :class="{
                                'opacity-25': vehicle.is_fleet == 'true',
                              }"
                              :disabled="vehicle.is_fleet == 'true'"
                              class="form-control"
                              id="grid-makes"
                            >
                              <option value="" disabled selected>
                                Select Vehicle Year of Manufacture below
                              </option>
                              <option
                                :value="year"
                                v-for="year in getYears"
                                :key="year"
                              >
                                {{ year }}
                              </option>
                            </b-form-select>
                          </div>
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0 relative">
                            <label
                              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                              for="grid-first-name"
                            >
                              Enter Estimated Value of your Vehicle
                            </label>
                            <b-form-input
                              id="value"
                              :class="{
                                'opacity-25': vehicle.is_fleet == 'true',
                              }"
                              :disabled="vehicle.is_fleet == 'true'"
                              type="text"
                              class="mt-1 block w-full"
                              v-model.lazy="v_value"
                              required
                              placeholder="Car Value in Kenyan Shillings eg.750000"
                            />
                            <div
                              v-show="message"
                              class="mt-2"
                              v-if="checkvehiclevalue == true"
                            >
                              <p class="text-sm text-red-600">
                                sorry, Vehicle Value has to be above 499000
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-center my-3">
                          <div class="col-sm-5">
                            <b-button
                              v-if="vehicle.is_fleet === 'true'"
                              type="submit"
                              size="lg"
                              block
                              @click="
                                $root.$emit(
                                  'bv::show::modal',
                                  'modal-1',
                                  $event.target
                                )
                              "
                              class="shadow-sm group-hover:shadow-lg rounded-full btn btn-fill-out py-3 px-5 border transform group-hover:-translate-y-0.5 transition-all duration-150"
                              >Get Quotes</b-button
                            >
                            <b-button
                              v-else
                              type="submit"
                              size="lg"
                              block
                              :class="{ 'opacity-25': checkvehiclevalue }"
                              :disabled="checkvehiclevalue"
                              class="shadow-sm group-hover:shadow-lg rounded-full btn btn-fill-out py-3 px-5 border transform group-hover:-translate-y-0.5 transition-all duration-150"
                              @click="generatequote"
                            >
                              Compare Quotes
                            </b-button>
                          </div>
                        </div>
                        <hr>
                        <div class="row justify-center mt-4">
                          <div class="col-sm-10">
                             <b-alert show>Cant find your Vehicle Make & model or the type of cover you want?
                               <a href="/contact" class="btn btn-primary my-3 ml-5">Talk to us now!</a>
                             </b-alert>
        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div class="animation-effect-1">
            <i class="uil uil-pentagon effect-icon text-primary"></i>
          </div>
          <div class="animation-effect-2">
            <i class="uil uil-triangle effect-icon text-danger"></i>
          </div>
          <div class="animation-effect-3">
            <i class="uil uil-star effect-icon text-warning"></i>
          </div>
          <div class="animation-effect-4">
            <i class="uil uil-octagon effect-icon text-success"></i>
          </div>
          <div class="animation-effect-5">
            <i class="uil uil-square effect-icon text-info"></i>
          </div>
          <div class="animation-effect-6">
            <i class="uil uil-pentagon effect-icon text-primary"></i>
          </div>
          <div class="animation-effect-7">
            <i class="uil uil-cloud effect-icon text-danger"></i>
          </div>
          <!-- END HERO -->
        </div>
      </div>
    </div>
    <b-modal
      id="modal-1"
      title="Get best Rates for your Fleet"
      centered
      hide-footer
    >
      <div class="uk-form-stacked">
        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-text"
            >Full Names</label
          >
          <div class="uk-form-controls">
            <input
              class="uk-input"
              v-model="fleet.names"
              id="form-stacked-text"
              type="text"
              required
              placeholder="Enter your full names here ..."
            />
          </div>
        </div>
        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-text"
            >Email Address</label
          >
          <div class="uk-form-controls">
            <input
              class="uk-input"
              v-model="fleet.email"
              id="form-stacked-text"
              type="email"
              required
              placeholder="enter a valid email address..."
            />
          </div>
        </div>
        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-text"
            >Phone Number</label
          >
          <div class="uk-form-controls">
            <input
              class="uk-input"
              v-model="fleet.phone"
              id="form-stacked-text"
              type="text"
              required
              placeholder="enter a working cell phone number here ..."
            />
          </div>
        </div>
        <div class="uk-margin">
          <label class="uk-form-label" for="form-stacked-text"
            >Size of your Fleet</label
          >
          <div class="uk-form-controls">
            <input
              class="uk-input"
              v-model="fleet.fleet_size"
              id="form-stacked-text"
              type="text"
              required
              placeholder="enter the number of vehicles you want to insure ..."
            />
          </div>
        </div>
        <b-button
          type="submit"
          @click="getFleetCustomer"
          class="rounded-lg shadow-sm group-hover:shadow-lg py-3 px-5 border border-transparent transform group-hover:-translate-y-0.5 transition-all duration-150"
          >Send me Quotes</b-button
        >
      </div>
    </b-modal>
  </div>
</template>


<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: ["message", "motorSwiper", "activateNext"],
  data: function () {
    return {
      isLoading: true,
      fleet: {
        names: "",
        email: "",
        phone: "",
        fleet_size: "",
      },
      v_models: {},
      v_make: "",
      v_model: "",
      v_business: "",
      v_manufacture: "",
      v_value: "",
      cover_type: "",
      money: {
        thousands: ",",
        precision: false,
      },
      isLoading: false,
      fullPage: true,
    };
  },
  mounted() {
    this.$store.dispatch("allVehicleMakes"),
      this.$store.dispatch("YearManufacture");
  },
  methods: {
    ...mapActions(["showPagination", "hidePagination"]),
    getthismodel() {
      Swal.fire({
        title: "Please Wait..",
        text: "We are loading the model, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      this.$store
        .dispatch("getVehicleModel", this.v_make)
        .then((response) => {
          this.v_models = response.data;
          return false;
        })
        .catch((err) => {
          console.error(err);
        });
      Swal.close();
    },
    generatequote(e) {
      e.preventDefault();

      Swal.fire({
        title: "Please Wait..",
        text: "We are processing the best Quotations for you ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });

      let payload = {
        cover_type: this.cover_type,
        v_value: this.v_value,
        v_make: this.v_make,
        v_model: this.v_model,
        v_manufacture: this.v_manufacture,
        v_business: this.v_business,
        endpoint: route("generate.quote"),
      };
      this.$store
        .dispatch("MotorPrivateQuote", payload)
        .then((response) => {
          this.$notify({
            message: "This are the best we have tailor made for you",
            type: "success",
            duration: 5 * 1000,
          });
          this.motorSwiper.slideTo(1);
          this.motorSwiper.update();
          Swal.close();
        })
        .catch((err) => {
          console.error(err);
          Toast.fire({
            icon: "error",
            title: "Error Submiting Data",
          });
          this.motorSwiper.update();
        });
    },
    getFleetCustomer() {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing the best Quotations for you ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      let formdata = {
        name: this.fleet.names,
        email: this.fleet.email,
        phone: this.fleet.phone,
        fleet: this.fleet.fleet_size,
        cover_type: this.cover_type,
      };
      this.$store
        .dispatch("MotorcommercialfleetQuote", formdata)
        .then((response) => {
          this.$notify({
            message: response.data.message,
            type: "success",
            duration: 5 * 1000,
          });
          Swal.close();
          window.location.href = "/";
        })
        .catch((err) => {
          console.error(err);
          Toast.fire({
            icon: "error",
            title: err,
          });
        });
    },
  },
  computed: {
    currentUrl() {
      return window.location.pathname;
    },
    checkvehiclevalue() {
      if (this.v_value <= 499000) {
        return true;
      }
    },
    ...mapGetters(["vehicle", "activatePagination"]),
    ...mapState({
      getthismakes: (state) => state.motor.vMakes,
      getYears: (state) => state.motor.vYears,
    }),
  },
};
</script>


<style lang="scss" scoped>
</style>