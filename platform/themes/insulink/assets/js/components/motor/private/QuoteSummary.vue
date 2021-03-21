<template>
  <div class="swiper-slide step-two">
      <div class="container py-4">
      <div class="lg:w-4/4 xl:w-5/5 mx-auto my-8">
        <div class="rounded-lg overflow-hidden py-4">
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c1'"
          >
            Comprehensive Commercial Motor Insurance - Own Goods
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c2'"
          >
            Third Party Only Commercial Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c3'"
          >
            Comprehensive PSV SELF DRIVE Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c4'"
          >
            Third Party PSV SELF DRIVE Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c5'"
          >
            Comprehensive PSV CHAUFFEUR DRIVEN
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c6'"
          >
            Comprehensive Private Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="vehicle.cover_type == 'c7'"
          >
            Third Party Private Motor Insurance
          </h2>
          <h1
            class="text-3xl leading-9 font-black text-orange-900 text-center mb-4"
          >
            Here are the best <strong>{{ quotesfound }}</strong> quotes we found for your {{ vehicleveh_type.make_model }}
          </h1>
          <div class="bg-gray-700 p-4 mb-4 text-white">
            <div class="grid grid-cols-2 gap-4">
              <div class="col-span-1">
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                >
                  Vehicle Details
                </h4>
                <div>Vehicle is used for: {{ vehicle.v_business }} purpose</div>
                <div>
                  Value of your Vehicle in (Kshs):
                  {{ vehicle.v_value | formatCurrency }}
                </div>
                <div>
                  Year of Manufacture for this Vehicle:
                  {{ vehicle.motorPrivate.year_of_manufacture }}
                </div>
              </div>

            </div>
          </div>
          <!--Third party -->
          <ul id="third-party" class="quoteresults" v-if="vehicle.cover_type === 'c7'">
            <li v-for="product in getQuotes" class="bg-white" :key="product.id">
              <h3
                class="text-xl font-normal text-white bg-orange uppercase antialiased pl-4 border-b-2 border-gray-200 px-4 mb-3"
              >
                {{ product.product_name }} - Underwritten by
                {{ product.underwriter }}
              </h3>
              <div class="flex">
                <div class="w-1/5 px-2 p-6">
                  <img
                    class="h-20 p-3 ml-8 rounded-lg shadow-xs"
                    :src="product.image"
                    :alt="product.underwriter"
                  />
                </div>
                <div class="w-3/5 px-2">
                  <div class="px-2">
                    <h4
                      class="text-lg font-bold text-gray-700 antialiased mb-4"
                    >
                      Basic Benefits
                    </h4>

                    <span class="flex mb-2 bg-gray-200 p-1" v-if="product.emergency =='Not covered'">
                      <strong class="text-orange">Emergency Medical Expense</strong>:
                      {{ product.emergency  }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1" v-else>
                      <strong class="text-orange">Emergency Medical Expense</strong>:
                      Kes: {{ product.emergency  }}
                    </span>
                    <span class="flex mb-2 p-1">
                      <strong class="text-orange">Third Party Property Damage</strong>: Kes:
                      {{ product.tppd  }}
                    </span>
                   
                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange">Passenger Legal Liability</strong>:
                      {{ product.passenger_legal_liability  }}
                    </span>
                  </div>
                </div>
                <div class="w-1/5 px-2">
                  <h4 class="text-lg font-bold text-gray-700 antialiased">
                    Price
                  </h4>
                  Kes: {{ product.basicpremium.premium | formatCurrency }}
                  <div class="my-2">
                    <!-- component -->
                    <b-button
                    variant="primary"
                    @click="buyproduct3rdparty(product)"
                      class="btn-local-primary btns transition-colors duration-200"
                    >
                      <svg
                        class="w-4 h-4 mr-2 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                      </svg>
                      <span>Buy Cover</span>
                    </b-button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- Third party ends here -->
           <!-- Commercial PSV online -->
          <ul class="quoteresults" v-if="vehicle.cover_type === 'c3'">
            <li v-for="product in getQuotes" class="bg-white" :key="product.id">
              <h3
                class="text-xl font-normal text-white bg-orange uppercase antialiased pl-4 border-b-2 border-gray-200 px-4 mb-3"
              >
                {{ product.product_name }} - Underwritten by
                {{ product.underwriter }}
              </h3>
              <div class="flex">
                <div class="w-1/5 px-2 p-6">
                  <img
                    class="h-20 p-3 ml-8 rounded-lg shadow-xs"
                    :src="product.image"
                    :alt="product.underwriter"
                  />
                </div>
                <div class="w-3/5 px-2">
                  <div class="px-2">
                    <h4
                      class="text-lg font-bold text-gray-700 antialiased mb-4"
                    >
                      Basic Benefits
                    </h4>

                    <span class="flex mb-2 bg-gray-200 p-1" v-if="product.medical ==='Not covered'">
                      <strong class="text-orange">Emergency Medical Expenses</strong>: Kes: {{ product.medical }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1" v-else>
                      <strong class="text-orange" >Emergency Medical Expenses</strong>: Kes: {{ product.medical | formatCurrency }}
                    </span>

                    <span class="flex mb-2 p-1">
                      <strong class="text-orange">Third Party Property Damage</strong>: Kes:
                      {{ product.tppd | formatCurrency }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange">Passenger Legal Liability</strong>: Kes:
                      {{ product.passenger_legal_liability }}
                    </span>
                  </div>
                </div>
                <div class="w-1/5 px-2">
                  <h4 class="text-lg font-bold text-gray-700 antialiased">
                    Price
                  </h4>
                  Kes: {{ product.basicpremium.premium | formatCurrency }}
                  <div class="my-2">
                    <!-- component -->
                    <b-button
                    variant="primary"
                    @click="buyproductonlinecommercial(product)"
                      class="btn-local-primary btns transition-colors duration-200"
                    >
                      <svg
                        class="w-4 h-4 mr-2 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                      </svg>
                      <span>Buy Cover</span>
                    </b-button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <ul class="quoteresults" v-if="vehicle.cover_type === 'c12'">
            <li v-for="product in getQuotes" class="bg-white" :key="product.id">
              <h3
                class="text-xl font-normal text-white bg-orange uppercase antialiased pl-4 border-b-2 border-gray-200 px-4 mb-3"
              >
                {{ product.product_name }} - Underwritten by
                {{ product.underwriter }}
              </h3>
              <div class="flex">
                <div class="w-1/5 px-2 p-6">
                  <img
                    class="h-20 p-3 ml-8 rounded-lg shadow-xs"
                    :src="product.image"
                    :alt="product.underwriter"
                  />
                </div>
                <div class="w-3/5 px-2">
                  <div class="px-2">
                    <h4
                      class="text-lg font-bold text-gray-700 antialiased mb-4"
                    >
                      Basic Benefits
                    </h4>

                    <span class="flex mb-2 bg-gray-200 p-1" v-if="product.medical =='Not covered'">
                      <strong class="text-orange">Medical Expenses</strong>:
                      {{ product.medical  }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1" v-else>
                      <strong class="text-orange">Medical Expenses</strong>:
                      Kes: {{ product.medical  }}
                    </span>
                    <span class="flex mb-2 p-1">
                      <strong class="text-orange">Third Party Property Damage</strong>: Kes:
                      {{ product.tppd | formatCurrency }}
                    </span>
                   
                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange">Passenger Legal Liability</strong>:
                      {{ product.passenger_legal_liability  }}
                    </span>
                    
                  </div>
                </div>
                <div class="w-1/5 px-2">
                  <h4 class="text-lg font-bold text-gray-700 antialiased">
                    Price
                  </h4>
                  Kes: {{ product.basicpremium.premium | formatCurrency }}
                  <div class="my-2">
                     <b-button
                    variant="primary"
                    @click="buyproductcartagecommercial(product)"
                      class="btn-local-primary btns transition-colors duration-200"
                    >
                      <svg
                        class="w-4 h-4 mr-2 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                      </svg>
                      <span>Buy Cover</span>
                    </b-button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <ul class="quoteresults" v-if="vehicle.cover_type==='c6'">
            <li
              v-for="product in getQuotes"
              :key="product.id"
              class="bg-white"
            >
              <h3
                class="text-xl font-normal text-white bg-orange uppercase antialiased pl-4 border-b-2 border-gray-200 px-4 mb-3"
              >
                {{ product.product_name }} - Underwritten by
                {{ product.underwriter }}
              </h3>
              <div class="flex">
                <div class="w-1/5 px-2 p-6">
                  <img
                    class="h-20 p-3 ml-8 rounded-lg shadow-xs"
                    :src="product.image"
                    :alt="product.underwriter"
                  />
                </div>
                <div class="w-3/5 px-2">
                  <div class="px-2">
                    <h4
                      class="text-lg font-bold text-gray-700 antialiased mb-4"
                    >
                      Basic Benefits
                    </h4>

                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange">Medical Expense</strong>: Kes:
                      {{ product.medical_expense | formatCurrency }}
                    </span>

                    <span class="flex mb-2 p-1">
                      <strong class="text-orange">WindScreen</strong>: Kes:
                      {{ product.windscreen | formatCurrency }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange">Entertainment</strong>: Kes:
                      {{ product.entertainment | formatCurrency }}
                    </span>
                    <span class="flex mb-2 p-1">
                      <strong class="text-orange">Towing/Recovery</strong>: Kes:
                      {{ product.towing_recovery | formatCurrency }}
                    </span>
                  </div>
                </div>
                <div class="w-1/5 px-2">
                  <h4 class="text-lg font-bold text-gray-700 antialiased">
                    Price
                  </h4>
                  Kes: {{ product.basicpremium.premium | formatCurrency }}
                  <div class="my-2">
                    <!-- component -->
                    <b-button
                    variant="primary"
                    @click="buyproduct(product)"
                      class="btn-local-primary btns transition-colors duration-200"
                    >
                      <svg
                        class="w-4 h-4 mr-2 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                      </svg>
                      <span>Buy Cover</span>
                    </b-button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
           <ul class="quoteresults" v-if="vehicle.cover_type==='c1'">
            <li
              v-for="product in getQuotes"
              :key="product.id"
              class="bg-white"
            >
              <h3
                class="text-xl font-normal text-white bg-orange uppercase antialiased pl-4 border-b-2 border-gray-200 px-4 mb-3"
              >
                {{ product.product_name }} - Underwritten by
                {{ product.underwriter }}
              </h3>
              <div class="flex">
                <div class="w-1/5 px-2 p-6">
                  <img
                    class="h-20 p-3 ml-8 rounded-lg shadow-xs"
                    :src="product.image"
                    :alt="product.underwriter"
                  />
                </div>
                <div class="w-3/5 px-2">
                  <div class="px-2">
                    <h4
                      class="text-lg font-bold text-gray-700 antialiased mb-4"
                    >
                      Basic Benefits
                    </h4>

                    <span class="flex mb-2 bg-gray-200 p-1" v-if="product.medical =='Not covered'">
                      <strong class="text-orange">Medical Expenses</strong>:
                      {{ product.medical  }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1" v-else>
                      <strong class="text-orange">Medical Expenses</strong>:
                      Kes: {{ product.medical  }}
                    </span>
                    <span class="flex mb-2 p-1">
                      <strong class="text-orange">Third Party Property Damage</strong>: Kes:
                      {{ product.tppd | formatCurrency }}
                    </span>
                   
                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange">Passenger Legal Liability</strong>:
                      {{ product.passenger_legal_liability  }}
                    </span>
                    
                  </div>
                </div>
                <div class="w-1/5 px-2">
                  <h4 class="text-lg font-bold text-gray-700 antialiased">
                    Price
                  </h4>
                  Kes: {{ product.basicpremium.premium | formatCurrency }}
                  <div class="my-2">
                    <!-- component -->
                    <b-button
                    variant="primary"
                    @click="buyproductowngoods(product)"
                      class="btn-local-primary btns transition-colors duration-200"
                    >
                      <svg
                        class="w-4 h-4 mr-2 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                      </svg>
                      <span>Buy Cover</span>
                    </b-button>
                  </div>
                </div>
              </div>
            </li>
          </ul>
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: [
    "motorSwiper",
    "swipePrev",
  ],
  computed: {
    ...mapGetters(["vehicle", "vehicleveh_type"]),
    getQuotes() {
      return this.vehicle.motorPrivate.products;
    },
    quotesfound() {
      if (this.vehicle.motorPrivate.products) {
        return this.vehicle.motorPrivate.products.length;
      } else {
        return 0;
      }
      
    },
    
  },
  methods: {
    buyproduct(product) {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      this.$store
            .dispatch("buyMotorprivateproduct", product)
            .then((response) => {
             this.$notify({
                message: "add some additional benefits",
                type: "success",
                duration: 5 * 1000,
              });
              this.motorSwiper.slideTo(2);
          this.motorSwiper.update();
          Swal.close();
            })
            .catch((err) => {
               Toast.fire({
                icon: "error",
                title: "Error Submiting Data"
              });
              this.motorSwiper.update();
              Swal.close();
            });
    },
    buyproduct3rdparty(product) {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      this.$store
            .dispatch("buyMotorthirdpartyproduct", product)
            .then((response) => {
             this.$notify({
                message: "add some additional benefits",
                type: "success",
                duration: 5 * 1000,
              });
              this.motorSwiper.slideTo(2);
          this.motorSwiper.update();
              Swal.close();
            })
            .catch((err) => {
              Toast.fire({
                icon: "error",
                title: "Error Submiting Data"
              });
              this.motorSwiper.update();
              Swal.close();
            });
    },
    buyproductonlinecommercial(product) {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      this.$store
            .dispatch("buyMotorcommercialonlinepsvproduct", product)
            .then((response) => {
             this.$notify({
                message: "add some additional benefits",
                type: "success",
                duration: 5 * 1000,
              });
              this.motorSwiper.slideTo(2);
          this.motorSwiper.update();
          Swal.close();
            })
            .catch((err) => {
              Toast.fire({
                icon: "error",
                title: "Error Submiting Data"
              });
              this.motorSwiper.update();
              Swal.close();
            });
    },
    buyproductcartagecommercial(product) {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      this.$store
            .dispatch("buyMotorcommercialogeneralcartageproduct", product)
            .then((response) => {
             this.$notify({
                message: "add some additional benefits",
                type: "success",
                duration: 5 * 1000,
              });
              this.motorSwiper.slideTo(2);
          this.motorSwiper.update();
          Swal.close();
            })
            .catch((err) => {
              Toast.fire({
                icon: "error",
                title: "Error Submiting Data"
              });
              this.motorSwiper.update();
              Swal.close();
            });
          Swal.close();
    },
    buyproductowngoods(product) {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      this.$store
            .dispatch("buyMotorcommercialowngoodsproduct", product)
            .then((response) => {
             this.$notify({
                message: "add some additional benefits",
                type: "success",
                duration: 5 * 1000,
              });
              this.motorSwiper.slideTo(2);
          this.motorSwiper.update();
          Swal.close();
            })
            .catch((err) => {
              Toast.fire({
                icon: "error",
                title: "Error Submiting Data"
              });
              this.motorSwiper.update();
              Swal.close();
            });
      
    },
  },
};
</script>

<style lang="scss" scoped>
</style>