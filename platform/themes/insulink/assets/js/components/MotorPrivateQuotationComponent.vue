<template>
  <div>
    <div class="container py-4">
      <div class="lg:w-4/4 xl:w-5/5 mx-auto my-8">
        <div class="rounded-lg overflow-hidden py-4">
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c1'"
          >
            Comprehensive Commercial Motor Insurance - Own Goods
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c2'"
          >
            Third Party Only Commercial Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c3'"
          >
            Comprehensive PSV SELF DRIVE Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c4'"
          >
            Third Party PSV SELF DRIVE Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c5'"
          >
            Comprehensive PSV CHAUFFEUR DRIVEN
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c6'"
          >
            Comprehensive Private Motor Insurance
          </h2>
          <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
            v-if="cover_type == 'c7'"
          >
            Third Party Private Motor Insurance
          </h2>
          <h1
            class="text-3xl leading-9 font-black text-orange-900 text-center mb-4"
          >
            Here are the best quotes we found for your {{ vehicle }}
          </h1>
          <div class="bg-gray-700 p-4 mb-4 text-white">
            <div class="grid grid-cols-2 gap-4">
              <div class="col-span-1">
                <h4
                  class="text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                >
                  Vehicle Details
                </h4>
                <div>Vehicle is used for: {{ used_for }}</div>
                <div>
                  Value of your Vehicle in (Kshs):
                  {{ value_vehicle | formatCurrency }}
                </div>
                <div>
                  Year of Manufacture for this Vehicle:
                  {{ year_of_manufacture }}
                </div>
              </div>
            </div>
          </div>
          <ul class="quoteresults">
            <li
              v-for="product in products.resultArray"
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

                    <span
                      class="flex mb-2 bg-gray-200 p-1"
                      v-if="product.emergency == 'Not covered'"
                    >
                      <strong class="text-orange"
                        >Emergency Medical Expense</strong
                      >:
                      {{ product.emergency }}
                    </span>
                    <span class="flex mb-2 bg-gray-200 p-1" v-else>
                      <strong class="text-orange"
                        >Emergency Medical Expense</strong
                      >: Kes: {{ product.emergency }}
                    </span>
                    <span class="flex mb-2 p-1">
                      <strong class="text-orange"
                        >Third Party Property Damage</strong
                      >: Kes:
                      {{ product.tppd | formatCurrency }}
                    </span>

                    <span class="flex mb-2 bg-gray-200 p-1">
                      <strong class="text-orange"
                        >Passenger Legal Liability</strong
                      >:
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
                    <b-link
                      :href="
                        '/purchase/product/new/motor/thirdparty/' +
                        product.productID +
                        '/' +
                        product.basicpremium.premium +
                        '/' +
                        value_vehicle +
                        '/' +
                        year_of_manufacture +
                        '/' +
                        vehicle +
                        '/' +
                        cover_type
                      "
                      class="btn-local-primary text-white font-bold py-2 px-4 rounded inline-flex items-center"
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
                    </b-link>
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
export default {
  data: function () {
    return {
      isLoading: true,
      data: [],
    };
  },

  mounted() {
    this.getData();
  },
  props: [
    "products",
    "cover_type",
    "vehicle",
    "value_vehicle",
    "year_of_manufacture",
    "used_for",
  ],

  methods: {
    getData() {
      this.data = [];
      this.isLoading = true;
      axios.get(this.url).then((res) => {
        this.data = res.data.data;
        this.isLoading = false;
      });
    },
  },
};
</script>
