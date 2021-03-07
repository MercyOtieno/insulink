<template>
  <div class="swiper-slide step-two dsc_hero-section py-3">
    <div class="container">
      <div v-if="domesticinsurance.types.typeProduct === 'isTenant'">
        <h2
          class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
        >
          Your Physical Address
        </h2>
        <div class="row justify-content-center text-center my-6">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="">Enter your address below to search</label>
              <input
                class="form-control"
                placeholder="Enter a location to search"
                v-model="property.location"
                v-gmaps-searchbox="property"
              />
            </div>
          </div>
        </div>
      </div>
      <div v-else>
        <h2
          class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
        >
          Address of your Property
        </h2>
        <div class="row justify-content-center text-center my-6">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="">What is the Location of this property?</label>
              <input
                class="form-control"
                placeholder="Enter a location to search"
                v-model="property.location"
                v-gmaps-searchbox="property"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <div
            class="jituze-step-three-pagination__navigation jituze-pagination__navigation"
          >
            <button
              :disabled="checklocationset"
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200 active-item display-flex"
              @click="storelocation"
            >
              Add value of your Properties
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: ["domesticSwiper", "activateNext", "activateGetQuotes",],
  data() {
    return {
      property: {
        location: "",
      },
    };
  },
  computed: {
    ...mapGetters(["domesticinsurance"]),
    checklocationset() {
      if (
        this.property.location === "" ||
        this.property.location === null ||
        this.property.location === 0
      ) {
        return true;
      }
    },
  },
  methods: {
    storelocation(e) {
      e.preventDefault();

      Swal.fire({
        title: "Please Wait..",
        text: "We are processing this data ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
          let location = {
            location: this.property.place.name
          }
          this.$store.dispatch(
            "getpropertylocation",location
          );
          this.domesticSwiper.slideTo(2);
          this.domesticSwiper.update();
          Swal.close();
        },
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>