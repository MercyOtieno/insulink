<template>
  <div class="swiper-slide step-one dsc_hero-section py-3">
    <div class="container mt-6">
      <h2
        class="text-2xl font-bold leading-7 text-primary-color  sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
      >
        You can save more by Providing Accurate data
      </h2>
      <h3
        class="text-2xl font-medium leading-6 text-gray-600 sm:text-2xl sm:leading-8 sm:truncate mb-2 text-capitalize text-center"
      >
        Select who you are below
      </h3>
      <div class="row justify-content-center my-6">
        <div class="col-sm-9">
          <div class="flex flex-wrap -mx-3 overflow-hidden sm:-mx-3 md:-mx-4 lg:-mx-4 xl:-mx-4">
            <div class="choose-boxes my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 md:my-4 md:px-4 lg:my-4 lg:px-4 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/3">
              <input  type="radio" @change="customerselect"  id="isHomeowner" value="isHomeowner" v-model="homeinsurance">
              <label for="isHomeowner" class="choose-type" :class="checkifhomeselected">
                <div class="icon-svg">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="56"
                    height="56"
                    viewBox="0 0 58.828 58"
                    class="inline-flex"
                  >
                    <path
                      d="M3,31l6.222-6.222m0,0L31,3,52.778,24.778m-43.556,0V55.889A3.111,3.111,0,0,0,12.333,59h9.333M52.778,24.778,59,31m-6.222-6.222V55.889A3.111,3.111,0,0,1,49.667,59H40.333M21.667,59a3.111,3.111,0,0,0,3.111-3.111V43.444a3.111,3.111,0,0,1,3.111-3.111h6.222a3.111,3.111,0,0,1,3.111,3.111V55.889A3.111,3.111,0,0,0,40.333,59M21.667,59H40.333"
                      transform="translate(-1.586 -2)"
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                    />
                  </svg>
                </div>
                <span class="mt-3 domestic-text">Home Owner</span>
                
              </label>
            </div>
            <div class="choose-boxes my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 md:my-4 md:px-4 lg:my-4 lg:px-4 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/3">
              <input type="radio" @change="customerselect" id="isTenant"  value="isTenant" v-model="homeinsurance">
              <label for="isTenant" class="choose-type" :class="checkiftenantselected">
                <div class="icon-svg">
                  <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex special" width="56" height="56" viewBox="0 0 56 56"><g transform="translate(0 53.876)"><path d="M0,490.666v1.062a1.118,1.118,0,0,0,1.167,1.062H54.833A1.118,1.118,0,0,0,56,491.728v-1.062H0Z" transform="translate(0 -490.666)" fill="#5b6770"/></g><g transform="translate(2.124 24.137)"><path d="M39.389,192H22.4a1.062,1.062,0,0,0-1.062,1.062V222.8a1.062,1.062,0,0,0,1.062,1.062H39.389a1.062,1.062,0,0,0,1.062-1.062V193.062A1.062,1.062,0,0,0,39.389,192Zm-1.062,29.739H23.457V194.124H38.326Z" transform="translate(-21.333 -192)" fill="#5b6770"/></g><g transform="translate(34.758 6.373)"><path d="M316.722,64H299.728a1.127,1.127,0,0,0-1.062,1.182v47.264a1.127,1.127,0,0,0,1.062,1.182h16.993a1.127,1.127,0,0,0,1.062-1.182V65.182A1.127,1.127,0,0,0,316.722,64Zm-1.062,47.264H300.79v-44.9h14.869Z" transform="translate(-298.666 -64)" fill="#5b6770"/></g><g transform="translate(13.263)"><path d="M136.4,0H107.728a1.062,1.062,0,0,0-1.062,1.062V16.993h2.124V2.124h26.552V4.248h2.124V1.062A1.062,1.062,0,0,0,136.4,0Z" transform="translate(-106.666)" fill="#5b6770"/></g><g transform="translate(6.373 27.047)"><rect width="2.124" height="19.118" fill="#5b6770"/></g><g transform="translate(11.712 27.047)"><rect width="2.124" height="19.118" fill="#5b6770"/></g><g transform="translate(16.397 27.047)"><rect width="2.124" height="19.118" fill="#5b6770"/></g><g transform="translate(34.735 12.883)"><rect width="11.683" height="2.124" fill="#5b6770"/></g><g transform="translate(34.735 18.739)"><rect width="11.683" height="2.124" fill="#5b6770"/></g><g transform="translate(34.735 24.595)"><rect width="11.683" height="2.124" fill="#5b6770"/></g><g transform="translate(34.735 30.451)"><rect width="11.683" height="2.124" fill="#5b6770"/></g><g transform="translate(34.735 36.308)"><rect width="11.683" height="2.124" fill="#5b6770"/></g><g transform="translate(34.735 42.164)"><rect width="11.683" height="2.124" fill="#5b6770"/></g><g transform="translate(17.568 5.31)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(17.568 12.91)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(22.253 12.91)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(22.253 5.31)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(26.938 5.31)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(26.938 12.91)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(26.938 19.952)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(26.938 26.994)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(26.938 34.035)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(26.938 41.077)"><rect width="2.124" height="3.186" fill="#5b6770"/></g><g transform="translate(37.905 48.565)"><path d="M347.706,437.333H342.4a1.062,1.062,0,0,0-1.062,1.062v5.31h2.124v-4.248h3.186v4.248h2.124V438.4A1.062,1.062,0,0,0,347.706,437.333Z" transform="translate(-341.333 -437.333)" fill="#5b6770"/></g><g transform="translate(6.373 49.627)"><path d="M73.559,448h-8.5A1.062,1.062,0,0,0,64,449.062v4.248h2.124v-3.186H72.5v3.186h2.124v-4.248A1.062,1.062,0,0,0,73.559,448Z" transform="translate(-64 -448)" fill="#5b6770"/></g></svg>
                </div>
                <span class="mt-3 domestic-text">Tenant</span>
                
              </label>
            </div>
            <div class="choose-boxes my-3 px-3 w-full overflow-hidden sm:my-3 sm:px-3 md:my-4 md:px-4 lg:my-4 lg:px-4 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/3">
              <input type="radio" @change="customerselect" id="isLandlord"  value="isLandlord" v-model="homeinsurance">
              <label for="isLandlord" class="choose-type" :class="checkiflandlordselected">
                <div class="icon-svg">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="56"
                    height="56"
                    class="inline-flex"
                    viewBox="0 0 58 58"
                  >
                    <path
                      d="M52.778,59V9.222A6.222,6.222,0,0,0,46.556,3H15.444A6.222,6.222,0,0,0,9.222,9.222V59m43.556,0H59m-6.222,0H37.222m-28,0H3m6.222,0H24.778M21.667,15.444h3.111M21.667,27.889h3.111M37.222,15.444h3.111M37.222,27.889h3.111M24.778,59V43.444a3.111,3.111,0,0,1,3.111-3.111h6.222a3.111,3.111,0,0,1,3.111,3.111V59M24.778,59H37.222"
                      transform="translate(-2 -2)"
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                    />
                  </svg>
                </div>
                <span class="mt-3 domestic-text">Landlord</span>
                
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: ["domesticSwiper", "activateNext", "activateGetQuotes"],
  data() {
    return {
      homeinsurance: ""
    }
  },
  computed:{
    ...mapGetters(["typeofProduct", "domesticinsurance"]),
    checkifhomeselected: function () {
      if (this.homeinsurance === 'isHomeowner') {
        return 'selected-product';
      } else {
        return 'not-selected'
      }
  },
  checkiflandlordselected: function () {
      if (this.homeinsurance === 'isLandlord') {
        return 'selected-product';
      } else {
        return 'not-selected'
      }
  },
  checkiftenantselected: function () {
      if (this.homeinsurance === 'isTenant') {
        return 'selected-product';
      } else {
        return 'not-selected'
      }
  }
  },
  methods: {
    customerselect() {
       //e.preventDefault();
      Swal.fire({
        title: "Please Wait..",
        text: "We are preparing the best for you, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      this.$store
            .dispatch("getcustomertype", this.homeinsurance);
            this.domesticSwiper.slideTo(1);
            this.domesticSwiper.update();
            Swal.close();
    }
  },
};
</script>

<style lang="scss" scoped>
</style>