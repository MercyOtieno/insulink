<template>
    <div class="domestic-insurance">
         <!--Swiper Start-->
      <div class="domestic-swiper-container">
        <div class="swiper-wrapper parent-height">
            <Choose :activateGetQuotes="activateGetQuotes" :activateNext="activateNext" :domesticSwiper="domesticSwiper"/>
            <Address :domesticSwiper="domesticSwiper" :activateGetQuotes="activateGetQuotes"/>
            <Contents :activateGetQuotes="activateGetQuotes" :domesticSwiper="domesticSwiper"/>
            <Quotes :activateGetQuotes="activateGetQuotes" :domesticSwiper="domesticSwiper"/>
            <Account :domesticSwiper="domesticSwiper" :activateGetQuotes="activateGetQuotes"/>
            <DomesticPayment :domesticSwiper="domesticSwiper" :activateGetQuotes="activateGetQuotes"/>
            <Confirmation :domesticSwiper="domesticSwiper" :activateNext="activateNext"/>
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
                  <div class="flex flex-wrap -mx-4 overflow-hidden sm:-mx-4 md:-mx-6 lg:-mx-8 xl:-mx-8"></div>
                <div class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-6 md:px-6 md:w-1/2 lg:my-8 lg:px-8 lg:w-1/2 xl:my-8 xl:px-8 xl:w-1/2">
                  <button class="swiper-domestic-button-prev w-full text-center bg-gray-900 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-2 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200">Back</button>
                </div>
                <div class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-6 md:px-6 md:w-1/2 lg:my-8 lg:px-8 lg:w-1/2 xl:my-8 xl:px-8 xl:w-1/2">
                  <button
                    class="swiper-domestic-button-next w-full text-center bg-primary-blue hover:bg-blue-700 text-white text-lg  py-2 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200"
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
import Choose from "./domestic/Choose";
import Address from "./domestic/Address";
import Contents from "./domestic/Content";
import Quotes from "./domestic/Quotes";
import Account from "./domestic/Account";
import DomesticPayment from "./domestic/Payments";
import Confirmation from "./domestic/Confirmation";
    export default {
        data() {
            return {
                domesticSwiper: "",
                activateNext: false,
                activateSubmit: false,
                activateGetQuotes:true,
                nextButton: "Next",
            }
        },
        components: {
            Choose, Address, Contents, Quotes,Account,DomesticPayment,Confirmation,
        },
        mounted() {
            this.initDomesticSwiper();
        },
        computed:{
            ...mapGetters(["activatePagination"])
        },
        methods: {
            ...mapActions(["showPagination", "hidePagination"]),
            //Slide to last slide
            slideToLastSlide() {
              this.domesticSwiper.slideTo(7);
              this.domesticSwiper.update();
              $("#paymentModal").modal("hide");
            },
            //Slide to first slide
            slideToFirstSlide() {
              this.resetMotorState();
              this.domesticSwiper.slideTo(0);
              this.activateNext = false;
              this.nextButton = "Next";
              this.hidePagination();
              this.domesticSwiper.update();
              $("#paymentModal").modal("hide");
              this.$router.go();
            },
            //Swipes to previous slide
            swipePrev() {
              this.domesticSwiper.slidePrev();
              this.domesticSwiper.update();
            },
            //Initialize Swiper
            initDomesticSwiper() {
                let slides = document.querySelector(".domestic-insurance");
                let t = this;
                t.domesticSwiper = new DomesticSwiper(".domestic-swiper-container", {
                    autoHeight: true,
                    touchRatio: 0,
                    effect: "fade",
                    fade: { crossFade: true },
                    observer: true,
                    observerUpdate: true,
                    observeParents: true,
                    observeSlideChildren: true,
                    pagination: {
                    el: ".swiper-domestic-pagination",
                    type: "progressbar",
                    },
                    navigation: {
                    nextEl: ".swiper-domestic-button-next",
                    prevEl: ".swiper-domestic-button-prev",
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
                t.domesticSwiper.on("slideChange", function () {
                    if (t.domesticSwiper.activeIndex === 0) {
                        slides.style.overflow = "hidden";
                        t.hidePagination();
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.activateSubmit = false;
                        //t.domesticSwiper.slideTo(1);
                        t.domesticSwiper.update();
                    } else if (t.domesticSwiper.activeIndex === 1) {
                        slides.style.overflow = "hidden";
                        t.hidePagination();
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.domesticSwiper.update();
                    } else if (t.domesticSwiper.activeIndex === 2) {
                        slides.style.overflow = "hidden";
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.hidePagination();
                        //t.domesticSwiper.slideTo(3);
                        t.domesticSwiper.update();
                    }else if (t.domesticSwiper.activeIndex === 3) {
                        slides.style.overflow = "hidden";
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.hidePagination();
                        t.domesticSwiper.update();
                    }else if (t.domesticSwiper.activeIndex === 4) {
                        slides.style.overflow = "hidden";
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.hidePagination();
                        t.domesticSwiper.update();
                    }else if (t.domesticSwiper.activeIndex === 5) {
                        slides.style.overflow = "hidden";
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.hidePagination();
                        t.domesticSwiper.update();
                    }else if (t.domesticSwiper.activeIndex === 6) {
                        slides.style.overflow = "hidden";
                        t.activateNext = false;
                        t.activateGetQuotes = true;
                        t.hidePagination();
                        t.domesticSwiper.update();
                    }
                });
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>