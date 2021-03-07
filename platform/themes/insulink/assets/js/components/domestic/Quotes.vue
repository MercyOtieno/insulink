<template>
  <div class="swiper-slide step-four dsc_hero-section py-3" id="dsc__quotation">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div v-if="domesticinsurance.types.typeProduct === 'isTenant'">
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              Home Insurance - Tenant
            </h2>
          </div>
          <div v-if="domesticinsurance.types.typeProduct === 'isHomeowner'">
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              Home Insurance - Home Owner
            </h2>
          </div>
          <div v-if="domesticinsurance.types.typeProduct === 'isLandlord'">
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              Home Insurance - Land Owner
            </h2>
          </div>

          <h1
            class="text-3xl leading-9 font-black text-orange-900 text-center mb-4"
          >
            Here are the best <strong>{{quotesfound}}</strong> quotes we found for you
          </h1>
          <div class="bg-gray-700 p-4 mb-4 text-white">
            <div class="grid grid-cols-2 gap-4">
              <div class="col-span-1">
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white" v-if="getquotations.content_value > 0"
                >
                  Content Covered kes: {{getquotations.content_value | formatCurrency}}
                </h4>
              </div>
              <div class="col-span-1">
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white" v-if="getquotations.furniture > 0"
                >
                  Furniture Value Covered kes:{{getquotations.furniture | formatCurrency}}
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <ul class="quoteresults"
          >
            <li
              v-for="payload in DomesticQuotes"
              class="bg-white shadow-md my-2"
            >
              <h3
                class="text-xl font-normal text-white bg-orange uppercase antialiased py-2 pl-4 border-b-2 border-gray-200 px-4 mb-3"
              >
                {{ payload.product_name }} - Underwritten by
                {{ payload.underwriter }}
              </h3>
              <div class="flex">
                <div class="w-1/5 px-2 p-6">
                  <img
                    class="h-20 p-3 ml-8 rounded-lg shadow-xs"
                    :src="payload.image"
                    :alt="payload.underwriter"
                  />
                </div>
                 <div class="w-3/5 px-2">
                  <div class="px-2">
                    <!-- <h4
                      class="text-lg font-bold text-gray-700 antialiased mb-4"
                    >
                      Basic Benefits
                    </h4> -->

                     <span class="flex mb-2 bg-gray-200 p-1" v-if="payload.basicpremium.building">
                      <strong class="text-orange">Building</strong>: Kes:
                      {{ payload.basicpremium.building | formatCurrency }}
                    </span>

                    <span class="flex mb-2 p-1" v-if="payload.basicpremium.phone_jewella">
                      <strong class="text-orange">Phones, Laptops & Jewellery</strong>: Kes:
                      {{ payload.basicpremium.phone_jewella | formatCurrency }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1" v-if="payload.basicpremium.valuables">
                      <strong class="text-orange">Other Valuables</strong>: Kes:
                      {{ payload.basicpremium.valuables | formatCurrency }}
                    </span>
                  </div>
                </div>
                <div class="w-1/5 px-2">
                  <h4 class="text-lg font-bold text-gray-700 antialiased">
                    Price
                  </h4>
                  Kes: {{ payload.basicpremium.premium | formatCurrency }}
                  <div class="my-2">
                    <!-- component -->
                    <b-button
                      variant="primary"
                      @click="buyproduct(payload)"
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: ["domesticSwiper", "activateNext", "activateGetQuotes"],
  computed: {
    ...mapGetters(["domesticinsurance", "getquotations", "location"]),
    DomesticQuotes() {
            return this.getquotations.products;
    },
    quotesfound() {
        return this.getquotations.products.length
    }
  },
  methods: {
    buyproduct(payload) {
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      let megapayload = {
            location: this.location.name.location,
            personal_accident:this.getquotations.personal_accident,
            occupier_liability:this.getquotations.occupier_liability,
            owners_liability:this.getquotations.owners_liability,
            content_value:this.getquotations.content_value,
            what_to_insure:this.getquotations.what_to_insure,
            wiba_servants_indoor:this.getquotations.wiba_servants_indoor,
            wiba_servants_outdoor:this.getquotations.wiba_servants_outdoor,
            data: payload,
            domestic_type:this.domesticinsurance.types.typeProduct
      }
      this.$store
        .dispatch("buyDomesticproduct", megapayload)
        .then((response) => {
            this.$notify({
            message: "add Personal Details to complete",
            type: "success",
            duration: 5 * 1000,
          });
          this.domesticSwiper.slideTo(4);
          this.domesticSwiper.update();
          Swal.close();
        })
        .catch((err) => {
          console.error(err);
          Toast.fire({
            icon: "error",
            title: "Error Submiting Data",
          });
        });
        this.domesticSwiper.update();
    },
  },
};
</script>

<style lang="scss" scoped>
#dsc__quotations {
    margin-top: 290px;
    padding-bottom: 40px;
}
</style>