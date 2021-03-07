<template>
  <div class="swiper-slide step-one dsc_hero-section py-3">
    <div class="container mt-6">
      <h2
        class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
      >
        How Many People are you going to Cover
      </h2>
      <h3
        class="text-2xl font-medium leading-6 text-gray-600 sm:text-2xl sm:leading-8 sm:truncate mb-2 text-capitalize text-center"
      >
        Choose who to Cover below
      </h3>
      <div class="row justify-content-center my-6">
        <div class="col-sm-12">
          <div
            class="flex flex-wrap -mx-3 overflow-hidden sm:-mx-4 md:-mx-4 lg:-mx-5 xl:-mx-5"
          >
            <div
              class="choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
            >
              <input
                type="radio"
                id="me-spouse"
                value="me-spouse"
                v-model="cover_details"
              />
              <label
                for="me-spouse"
                class="choose-type"
                :class="checkif1selected"
              >
                <div class="icon-svg">
                  <svg
                    width="56"
                    height="56"
                    class="inline-flex"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                </div>
                <span class="domestic-text">Me or My Spouse</span>
              </label>
            </div>
            <div
              class="choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
            >
              <input
                type="radio"
                id="family"
                value="family"
                v-model="cover_details"
              />
              <label for="family" class="choose-type" :class="checkif2selected">
                <div class="icon-svg">
                  <svg
                    width="56"
                    height="56"
                    class="inline-flex"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                    />
                  </svg>
                </div>
                <span class="domestic-text">Family</span>
              </label>
            </div>
            <div
              class="choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
            >
              <input
                type="radio"
                id="me-spouse-children"
                value="me-spouse-children"
                v-model="cover_details"
              />
              <label
                for="me-spouse-children"
                class="choose-type"
                :class="checkif3selected"
              >
                <div class="icon-svg">
                  <svg
                    width="56"
                    height="56"
                    class="inline-flex"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                    />
                  </svg>
                </div>
                <span class="domestic-text">Me/Spouse + Children</span>
              </label>
            </div>
            <div
              class="choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
            >
              <input
                type="radio"
                id="couple"
                value="couple"
                v-model="cover_details"
              />
              <label for="couple" class="choose-type" :class="checkif4selected">
                <div class="icon-svg">
                  <svg
                    width="56"
                    height="56"
                    class="inline-flex"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                    />
                  </svg>
                </div>
                <span class="domestic-text">Couple</span>
              </label>
            </div>
          </div>
        </div>
        <div class="col-sm-6" v-if="cover_details ==='family' | cover_details === 'me-spouse-children'" style="transition: all .3s ease-out;">
          <div class="card">
            <div class="card-header">
              How Many Children do you want to cover?
            </div>
            <div class="card-body">
              <div class="form-group">
                <b-form-group v-slot="{ ariaDescribedby }" size="xl">
                  <b-form-radio
                    v-model="no_children"
                    :aria-describedby="ariaDescribedby"
                    name="chilren"
                    value="1"
                    >A Child</b-form-radio
                  >
                  <b-form-radio
                    v-model="no_children"
                    :aria-describedby="ariaDescribedby"
                    name="chilren"
                    value="2"
                    >2 Children</b-form-radio
                  >
                  <b-form-radio
                    v-model="no_children"
                    :aria-describedby="ariaDescribedby"
                    name="chilren"
                    value="3"
                    >3 Children</b-form-radio
                  >
                  <b-form-radio
                    v-model="no_children"
                    :aria-describedby="ariaDescribedby"
                    name="chilren"
                    value="4"
                    >4 Children</b-form-radio
                  >
                  <b-form-radio
                    v-model="no_children"
                    :aria-describedby="ariaDescribedby"
                    name="chilren"
                    value="5"
                    >5 Children</b-form-radio
                  >
                  <b-form-radio
                  v-if="cover_details === 'me-spouse-children'"
                    v-model="no_children"
                    :aria-describedby="ariaDescribedby"
                    name="chilren"
                    value="6"
                    >6 Children</b-form-radio
                  >
                </b-form-group>
              </div>
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
              :disabled="checkcoverset"
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200 active-item display-flex"
              @click="gethealthquotes"
            >
              Compare Quotes
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
  props: ["healthSwiper", "activateNext", "activateGetQuotes"],
  data() {
    return {
      cover_details: "",
      no_children: 0,
    };
  },
  computed: {
    checkcoverset() {
      if (
        this.cover_details === "" ||
        this.cover_details === null ||
        this.cover_details === 0
      ) {
        return true;
      }
    },
    checkif1selected: function () {
      if (this.cover_details === "me-spouse") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    checkif2selected: function () {
      if (this.cover_details === "family") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    checkif3selected: function () {
      if (this.cover_details === "me-spouse-children") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    checkif4selected: function () {
      if (this.cover_details === "couple") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    ...mapGetters(["typeofHealthProduct"])
  },
  methods: {
    gethealthquotes(e) {
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
        no_children: this.no_children,
        cover_details:this.cover_details,
        age:this.typeofHealthProduct.age,
        dob:Math.round(new Date(this.typeofHealthProduct.dob).getTime()/1000),
        ip:this.typeofHealthProduct.ip,
        preexisting:this.typeofHealthProduct.pre_existing,
        cover_type:"h1",
        maternity:this.typeofHealthProduct.maternity,
        maternity_rate:this.typeofHealthProduct.maternity_rate,
        optical_rate:this.typeofHealthProduct.optical_rate,
        dental_rate:this.typeofHealthProduct.dental_rate,
        optical:this.typeofHealthProduct.optical,
        dental:this.typeofHealthProduct.dental,
      };
      this.$store.dispatch("HealthQuote", payload)
      .then((response) => {
          this.$notify({
            message: "See what we have for you",
            type: "success",
            duration: 5 * 1000,
          });
          this.healthSwiper.slideTo(2);
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
  },
};
</script>

<style lang="scss" scoped>
</style>