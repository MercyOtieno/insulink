<template>
  <div>
      <div class="motor-slides">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="motor-steps">
                          <p>{{stepText}}</p>
                          <div class="swiper-motor-pagination"></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="moto-swiper-container">
              <div class="swiper-wrapper parent-height">

              </div>
          </div>
      </div>
  </div>
</template>
<script>
  import SearchForm from './motor/private/SearchForm';
  import QuoteSummary from './motor/private/QuoteSummary';
  export default {
      name: "MotorPrivate",
    components: {
      SearchForm,
        QuoteSummary
    },
    mounted() {
        this.initMotorSwiper();
    },
    methods: {
      //Initialize Swiper
    initMotorSwiper() {
      let slides = document.querySelector(".jitunze-slides");
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
          type: "progressbar"
        },
        navigation: {
          nextEl: ".swiper-motor-button-next",
          prevEl: ".swiper-motor-button-prev"
        },
        breakpoints: {
          320: {
            touchRatio: 0
          },
          480: {
            touchRatio: 0
          },
          640: {
            touchRatio: 0
          },
          768: {
            touchRatio: 0
          }
        },
        on: {
          init: function() {
            slides.style.overflow = "hidden";
          }
        }
      });
      //Change step heading
      t.motorSwiper.on("slideChange", function() {
        if (t.motorSwiper.activeIndex === 0) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 1 of 5 : Describe your Vehicle";
          t.nextButton = "Next";
          t.motorSwiper.update();
        } else if (t.motorSwiper.activeIndex === 1) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 2 of 5 : Quote";
          t.nextButton = "Buy Now";
          t.motorSwiper.update();
         
          //Calculate applicable rate
          if(!t.vehicle.is_premier){
            //If vehicle is standard
            t.applicableRate();
          }else{
            //If vehicle is premier
            t.calculatePremierApplicableRate(t.vehicleAge());
          }
          t.getVehiclePremium();
          t.activate_benefits = true;
          t.calculate_total();
          t.activateSubmitVehicle = false;
          t.activateNext = true;
          t.hideRareVehicles();
          t.showPagination();
          if (t.vehicle.veh_applicable_rate == 0) {
            Toast.fire({
              icon: "error",
              title: "Sorry your vehicle does not have an applicable rate"
            });
            t.showRareVehicles();
            t.hidePagination();
            setTimeout(function() {
              t.motorSwiper.update(true);
            }, 1);
            t.motorSwiper.slideTo(0);
          }
        } else if (t.motorSwiper.activeIndex === 2) {
          slides.style.overflow = "hidden";
          t.stepText = "Step 3 of 5: Personal & Vehicle Information";
          t.hidePagination();
          t.terms = false;
          t.nextButton = "Next";
          t.activateNext = false;
          t.activateSubmitVehicle = true;
          t.activateSubmit = false;
          //Check total amount for restriction
          if (t.vehicle.veh_total > 200000) {
            Toast.fire({
              icon: "error",
              title:
                "Sorry we are not handling payments over 200,000 at the moment"
            });
            t.showRareVehicles();
            t.hidePagination();
            t.nextButton = "Next";
            t.activateNext = true;
            t.motorSwiper.slideTo(0);
            setTimeout(function() {
              t.motorSwiper.update(true);
            }, 1);
          }
          t.motorSwiper.update();
          //Check if it is a renewal journey
          if (t.renewal_verified) {
            t.motorSwiper.slideTo(3);
          }
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
    }
    },
  };
</script>