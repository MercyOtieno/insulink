<template>
  <div class="swiper-slide step-one dsc_hero-section py-3">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div
            v-if="gethealthquotations.cover_details === 'me-spouse-children'"
          >
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              Me or Spouse and Children
            </h2>
          </div>
          <div v-if="gethealthquotations.cover_details === 'family'">
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              My Family
            </h2>
          </div>
          <div v-if="gethealthquotations.cover_details === 'couple'">
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              Me and my Spouse
            </h2>
          </div>
          <div v-if="gethealthquotations.cover_details === 'me-spouse'">
            <h2
              class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            >
              Just for Me or my Spouse
            </h2>
          </div>

          <h1
            class="text-3xl leading-9 font-black text-orange-900 text-center mb-4"
          >
            Here are the best <strong>{{ quotesfound }}</strong> quotes we found
            for you
          </h1>
          <div class="bg-gray-700 p-4 mb-4 text-white">
            <div class="grid grid-cols-2 gap-4">
              <div class="col-span-1">
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                >
                  Inpatient Covered kes: {{ health.basic.ip | formatCurrency }}
                </h4>
                <h5
                  class="text-md font-medium text-gray-700 antialiased mb-4 text-white"
                  v-if="health.h_quotations.children.no_children > 1"
                >
                  Children being Covered:
                  {{ health.h_quotations.children.no_children }}
                </h5>
                <h5
                  class="text-md font-medium text-gray-700 antialiased mb-4 text-white"
                  v-else
                >
                  Children being Covered: none
                </h5>
              </div>
              <div class="col-span-1">
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                  v-if="health.basic.age === 1"
                >
                  Age Bracket: 18-30 | Your Date of Birth:
                  {{ health.basic.dob | formartDate }}
                </h4>
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                  v-if="health.basic.age === 2"
                >
                  Age Bracket: 31-40 | Date of Birth:
                  {{ health.basic.dob | formartDate }}
                </h4>
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                  v-if="health.basic.age === 3"
                >
                  Age Bracket: 41-50 | Date of Birth:
                  {{ health.basic.dob | formartDate }}
                </h4>
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                  v-if="health.basic.age === 4"
                >
                  Age Bracket: 51-60 | Date of Birth:
                  {{ health.basic.dob | formartDate }}
                </h4>
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                  v-if="health.basic.age === 5"
                >
                  Age Bracket: 61-70 | Date of Birth:
                  {{ health.basic.dob | formartDate }}
                </h4>
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                  v-if="health.basic.age === 6"
                >
                  Age Bracket: 70 and above | Your Date of Birth:
                  {{ health.basic.dob | formartDate }}
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
          <ul class="quoteresults">
            <li v-for="payload in HealthQuotes" class="bg-white shadow-md my-2">
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
                    :src="'/images/underwriter/' + payload.image"
                    :alt="payload.underwriter"
                  />
                </div>
                <div class="w-3/5 px-2 pb-4">
                  Product Description
                  <div style="height: 200px; overflow-y: scroll" class="mb-3">
                    <div v-html="payload.product_description"></div>
                  </div>
                  <b-button @click="showproductbrochure(payload)" variant="outline-primary" size="sm">
                    <svg
                      class="mr-2 inline-flex text-primary"
                      width="24"
                      height="24"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                      /></svg
                    >View Product Details</b-button
                  >
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
    <b-modal
      :id="'modal-1'"
      size="xl"
      hide-footer
      centered
      title="Product Brochure"
    >
      <div class="embed-responsive embed-responsive-16by9">
        <iframe
          class="embed-responsive-item"
          :src="brochure.product_brochure"
          allowfullscreen
        ></iframe>
      </div>
    </b-modal>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: ["healthSwiper", "activateNext", "activateGetQuotes"],
  data() {
    return {
      brochure: {},
    };
  },
  computed: {
    ...mapGetters(["gethealthquotations", "health"]),
    quotesfound() {
      return this.gethealthquotations.products.length;
    },
    HealthQuotes() {
      return this.gethealthquotations.products;
    },
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
        age: this.health.h_quotations.age_bracket,
        pre_existing: this.health.basic.pre_existing,
        children: this.health.h_quotations.children.no_children,
        ip: this.health.basic.ip,
        dob: this.health.basic.dob,
        data: payload,
        cover_details: this.gethealthquotations.cover_details,
        pre_existing_details: this.health.basic.pre_existing_details,
      };
      this.$store
        .dispatch("buyHealthproduct", megapayload)
        .then((response) => {
          this.$notify({
            message: "add Personal Details to complete",
            type: "success",
            duration: 5 * 1000,
          });
          this.healthSwiper.slideTo(3);
          this.healthSwiper.update();
          Swal.close();
        })
        .catch((err) => {
          console.error(err);
          Toast.fire({
            icon: "error",
            title: "Error Submiting Data",
          });
        });
      this.healthSwiper.update();
    },
    showproductbrochure(payload) {
      this.brochure = payload;
      this.$bvModal.show("modal-1");
    },
  },
};
</script>

<style lang="scss" scoped>
</style>