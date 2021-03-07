<template>
  <div class="motor-slides">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="motor-steps">
            <div class="swiper-motor-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <!--Swiper Start-->
    <div class="motor-swiper-container">
      <div class="swiper-wrapper parent-height">
        <MotorStepOne
          :activateGetQuotes="activateGetQuotes"
          :activateNext="activateNext"
          :motorSwiper="motorSwiper"
        />

        <MotorStepTwo :motorSwiper="motorSwiper" />

        <MotorStepThree
          :collectdetails="collectdetails"
          :motorSwiper="motorSwiper"
          :swipePrev="swipePrev"
        />

        <MotorStepFour :motorSwiper="motorSwiper" :swipePrev="swipePrev" />

        <MotorStepFive :motorSwiper="motorSwiper" :swipePrev="swipePrev"/>

        <MotorStepSix :motorSwiper="motorSwiper" />
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
      <div class="row">
        <div class="col-12">
          <div class="jituze-pagination">
            <div class="jituze-pagination__navigation">
              <div>
                <button
                  class="swiper-motor-button-prev w-full sm:w-auto flex-none bg-gray-900 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200"
                >
                  Back
                </button>
              </div>
              <div>
                <button
                  class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200"
                  :class="{
                    'active-item display-flex': activateNext,
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
import MotorStepOne from "./motor/private/SearchForm";
import MotorStepTwo from "./motor/private/QuoteSummary";
import MotorStepThree from "./motor/private/Checkout";
import MotorStepFour from "./motor/private/Account";
import MotorStepFive from "./motor/private/Payment";
import MotorStepSix from "./motor/private/Confirmation";
export default {
  name: "MotorPrivate",
  data() {
    return {
      stepText: "Step 1 of 5 : Describe your Vehicle",
      nextButton: "Compare Quotes",
      terms: false,
      termsValue: "",
      motorSwiper: "",
      activateSubmit: false,
      activateGetQuotes: true,
      collectdetails: false,
      activateStatus: false,
      activateValuation: false,
      activateSubmitVehicle: false,
      activateNext: false,
    };
  },
  components: {
    MotorStepOne,
    MotorStepTwo,
    MotorStepThree,
    MotorStepFour,
    MotorStepFive,
    MotorStepSix,
  },
  mounted() {
    this.initMotorSwiper();
  },
  methods: {
    ...mapActions(["showPagination", "hidePagination"]),
    //Slide to last slide
    slideToLastSlide() {
      this.motorSwiper.slideTo(6);
      this.motorSwiper.update();
      $("#paymentModal").modal("hide");
    },
    //Slide to first slide
    slideToFirstSlide() {
      this.resetMotorState();
      this.motorSwiper.slideTo(0);
      this.activateNext = false;
      this.nextButton = "Next";
      this.hidePagination();
      this.motorSwiper.update();
      $("#paymentModal").modal("hide");
      this.$router.go();
    },
    //Swipes to previous slide
    swipePrev() {
      this.motorSwiper.slidePrev();
      this.motorSwiper.update();
    },

    //Initialize Swiper
    initMotorSwiper() {
      let slides = document.querySelector(".motor-slides");
      let t = this;
      t.motorSwiper = new MotorSwiper(".motor-swiper-container", {
        autoHeight: true,
        touchRatio: 0,
        effect: "fade",
        fade: { crossFade: true },
        observer: true,
        observerUpdate: true,
        observeParents: true,
        observeSlideChildren: true,
        pagination: {
          el: ".swiper-motor-pagination",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".swiper-motor-button-next",
          prevEl: ".swiper-motor-button-prev",
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
      //Change step heading
      t.motorSwiper.on("slideChange", function () {
        if (t.motorSwiper.activeIndex === 0) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 1 of 5 : Vehicle Details";
          t.hidePagination();
          t.activateNext = false;
          t.activateGetQuotes = true;
          t.activateSubmit = false;
          t.motorSwiper.update();
        } else if (t.motorSwiper.activeIndex === 1) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 2 of 5 : Quote";
          t.hidePagination();
          t.activateNext = false;
          t.activateGetQuotes = false;
          t.activateSubmit = false;
          t.motorSwiper.update();
        } else if (t.motorSwiper.activeIndex === 2) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 3 of 5: Personal & Vehicle Information";
          t.hidePagination();
          t.terms = false;
          t.nextButton = "Next";
          t.activateNext = false;
          t.collectdetails = false;
          t.activateSubmit = false;
          t.motorSwiper.update();
        } else if (t.motorSwiper.activeIndex === 3) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 4 of 5 : Payment & Confirmation";
          t.terms = true;
          t.hidePagination();
          t.activateValuation = false;
          t.activateSubmitVehicle = false;
          t.activateSubmit = true;
          t.motorSwiper.update();
        } else if (t.motorSwiper.activeIndex === 4) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 4 of 5 : Payment & Confirmation";
          t.terms = true;
          t.hidePagination();
          t.activateValuation = false;
          t.activateSubmitVehicle = false;
          t.activateSubmit = true;
          t.motorSwiper.update();
        } else if (t.motorSwiper.activeIndex === 5) {
          slides.style.overflow = "scroll";
          t.stepText = "Step 5 of 5 : Book Valuation";
          t.hidePagination();
          t.terms = false;
          t.nextButton = "Save Valuation";
          t.activateNext = false;
          t.activateSubmit = false;
          t.activateStatus = false;
          t.activateValuation = true;
          t.motorSwiper.update();
        }
      });
    },
  },
  computed: {
    ...mapGetters(["activatePagination", "vehicle"]),
  },
};
</script>
<style lang="scss">
body {
  overflow-x: hidden;
  background: #fff;
}
.swiper-slide {
  background: #fff;
}
.active-item {
  display: block;
}
.not-active {
  display: none !important;
}
.swiper-slide {
  opacity: 1;
  &:not(.swiper-slide-active) {
    opacity: 0 !important;
  }
}
.display-flex {
  display: flex !important;
}
.swiper-motor-button-next {
  top: 0px;
}
.swiper-motor-button-next:disabled,
.swiper-motor-button-next[disabled] {
  border: 1px solid #5b6770;
  background-color: #5b6770;
  color: #ffffff;
  cursor: no-drop;
}
.motor-swiper-container .step-four .select-group #payment-options .cc-selector {
  width: 100%;
}
// .swiper-container-autoheight,
// .swiper-container-autoheight .swiper-slide {
//   overflow: hidden;
// }
</style>
