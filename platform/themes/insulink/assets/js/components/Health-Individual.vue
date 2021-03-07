<template>
  <div class="health-individual">
    <!--Swiper Start-->
    <div class="health-swiper-container">
      <div class="swiper-wrapper parent-height">
        <Age
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"
        />
        <Cover
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"
        />
        <QuoteDetails
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"
        />
        <Benefits
        :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"/>
        <MemberDetails
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"
          :gethealthcustomerForm="gethealthcustomerForm"
        />
        <Payment
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"
        />
        <Confirmation
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :healthSwiper="healthSwiper"
        />
      </div>
    </div>
    <!--Pagination Start-->
    <div
      class="container"
      :class="{
        active: activatePagination,
        'not-active': !activatePagination,
      }"
    >
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <div class="jituze-pagination">
            <div class="jituze-pagination__navigation">
              <div
                class="flex flex-wrap -mx-4 overflow-hidden sm:-mx-4 md:-mx-6 lg:-mx-8 xl:-mx-8"
              ></div>
              <div
                class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-6 md:px-6 md:w-1/2 lg:my-8 lg:px-8 lg:w-1/2 xl:my-8 xl:px-8 xl:w-1/2"
              >
                <button
                  class="swiper-domestic-button-prev w-full text-center bg-gray-900 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-2 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200"
                >
                  Back
                </button>
              </div>
              <div
                class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-6 md:px-6 md:w-1/2 lg:my-8 lg:px-8 lg:w-1/2 xl:my-8 xl:px-8 xl:w-1/2"
              >
                <button
                  class="swiper-domestic-button-next w-full text-center bg-primary-blue hover:bg-blue-700 text-white text-lg py-2 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200"
                  :class="{
                    'active-item': activateNext,
                    'not-active': !activateNext,
                  }"
                >
                  {{ nextButton }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Pagination End-->
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
import Age from "./health/Age";
import Cover from "./health/CoverDetails";
import QuoteDetails from "./health/QuoteDetails";
import MemberDetails from "./health/MemberDetails";
import Payment from "./health/Payments";
import Confirmation from "./health/Confirmation";
import Benefits from './health/Benefits.vue';
export default {
  data: function () {
    return {
      healthSwiper: "",
      activateNext: false,
      activateSubmit: false,
      activateGetQuotes: true,
      nextButton: "Next",
      gethealthcustomerForm: new Form(),
    };
  },
  components: {
    Age,
    Cover,
    QuoteDetails,
    MemberDetails,
    Payment,
    Confirmation,
    Benefits,
  },
  mounted() {
    this.initHealthSwiper();
  },
  computed: {
    ...mapGetters(["activatePagination"]),
  },
  methods: {
    ...mapActions(["showPagination", "hidePagination"]),
    //Slide to last slide
    slideToLastSlide() {
      this.healthSwiper.slideTo(7);
      this.healthSwiper.update();
      $("#paymentModal").modal("hide");
    },
    //Slide to first slide
    slideToFirstSlide() {
      this.resetMotorState();
      this.healthSwiper.slideTo(0);
      this.activateNext = false;
      this.nextButton = "Next";
      this.hidePagination();
      this.healthSwiper.update();
      $("#paymentModal").modal("hide");
      this.$router.go();
    },
    //Swipes to previous slide
    swipePrev() {
      this.healthSwiper.slidePrev();
      this.healthSwiper.update();
    },
    //Initialize Swiper
    initHealthSwiper() {
      let slides = document.querySelector(".health-individual");
      let t = this;
      t.healthSwiper = new DomesticSwiper(".health-swiper-container", {
        autoHeight: true,
        touchRatio: 0,
        effect: "fade",
        fade: { crossFade: true },
        observer: true,
        observerUpdate: true,
        observeParents: true,
        observeSlideChildren: true,
        pagination: {
          el: ".swiper-health-pagination",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".swiper-health-button-next",
          prevEl: ".swiper-health-button-prev",
        },
        breakpoints: {
          320: {
            touchRatio: 0,
          },
          480: {
            touchRatio: 0,
          },
          640: {
            touchRatio: 0,
          },
          768: {
            touchRatio: 0,
          },
        },
        on: {
          init: function () {
            slides.style.overflow = "hidden";
          },
        },
      });
      t.healthSwiper.on("slideChange", function () {
        if (t.healthSwiper.activeIndex === 0) {
          slides.style.overflow = "hidden";
          t.hidePagination();
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.activateSubmit = false;
          //t.healthSwiper.slideTo(1);
          t.healthSwiper.update();
        } else if (t.healthSwiper.activeIndex === 1) {
          slides.style.overflow = "hidden";
          t.hidePagination();
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.healthSwiper.update();
        } else if (t.healthSwiper.activeIndex === 2) {
          slides.style.overflow = "hidden";
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.hidePagination();
          //t.healthSwiper.slideTo(3);
          t.healthSwiper.update();
        } else if (t.healthSwiper.activeIndex === 3) {
          slides.style.overflow = "hidden";
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.hidePagination();
          t.healthSwiper.update();
        } else if (t.healthSwiper.activeIndex === 4) {
          slides.style.overflow = "hidden";
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.hidePagination();
          t.healthSwiper.update();
        } else if (t.healthSwiper.activeIndex === 5) {
          slides.style.overflow = "hidden";
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.hidePagination();
          t.healthSwiper.update();
        } else if (t.healthSwiper.activeIndex === 6) {
          slides.style.overflow = "hidden";
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.hidePagination();
          t.healthSwiper.update();
        }
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>