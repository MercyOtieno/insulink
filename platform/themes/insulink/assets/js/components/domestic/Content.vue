<template>
  <div class="swiper-slide step-three dsc_hero-section py-3">
    <div class="container" v-if="domesticinsurance.types.typeProduct === 'isTenant'">
      <h2
        class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
      >
        Value of your Property
      </h2>
      <div class="row justify-content-center text-center my-6">
        <div class="col-sm-6">
          <div class="form-group">
            <label
              for=""
              data-toggle="tooltip"
              data-placement="right"
              title="carpets, clothes, kitchen items and appliances, household goods and personal effects for which the proposer is legally responsible, not being landlord’s fixtures and fitting, in the buildings of the proposer’s residence"
              >What is the value of your house-hold content? -
              <small
                >Items like carpets, clothes, kitchen items and appliances,
                household goods and personal effects for which the proposer is
                legally responsible, not being landlord’s fixtures and fitting,
                in the buildings of the proposer’s residence</small
              ></label
            >
            <input
              type="text"
              class="form-control"
              v-model="form.content_value"
              placeholder="enter value in Kes"
            />
          </div>
          <b-alert :show="max_compensation">
            Maximum Compensation for any single item will be: KES
            {{ max_compensation }}
          </b-alert>
          <b-alert :show="max_compensation === true"> </b-alert>
          <div class="form-group">
            <label for="">What is the value of your furniture?</label>
            <input
              type="text"
              class="form-control"
              v-model="form.furniture"
              placeholder="enter value in Kes"
            />
          </div>
          <div class="form-group">
            <label
              for=""
              data-toggle="tooltip"
              data-placement="right"
              title="Covers portable valuables like mobile phones, tablets, laptops, jewellery, watches, spectacles etc. against fire & perils, theft, loss and accidental damage."
              >What is the value of your PHONES , LAPTOPS & JEWELERY and any
              other portables?
              <small
                >Portable items like mobile phones, tablets, laptops, jewellery,
                watches, spectacles etc</small
              ></label
            >
            <input
              type="text"
              class="form-control"
              v-model="form.phones_laptops"
              placeholder="enter value in Kes"
            />
          </div>
          <hr />

          <div class="card">
            <div class="card-header">
              <h4>Additional Benefits <small>Optional</small></h4>
            </div>
            <div class="card-body text-left">
              <div class="form-group">
                <b-form-checkbox
                  v-model="form.personal_accident_add"
                  name="check-button"
                  switch
                >
                  Personal Accident
                </b-form-checkbox>
              </div>
              <div class="form-group">
                <b-form-checkbox
                  v-model="form.occupiers_liabity_add"
                  name="check-button"
                  switch
                >
                  Occupiers Liability <small>Free upto 500,000</small>
                </b-form-checkbox>
                <b-form-input
                  v-model="form.occupiers_liabity"
                  placeholder="Minimum Limit is Kes 500000"
                  min="500000"
                  v-if="form.occupiers_liabity_add === true"
                ></b-form-input>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" v-if="domesticinsurance.types.typeProduct === 'isHomeowner'">
      <h2
        class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
      >
        Value of your Property
      </h2>
      <div class="row justify-content-center my-6">
        <div class="col-sm-6">
            <b-form-group label="What would you like to Insure" v-slot="{ ariaDescribedby }">
              <b-form-radio v-model="form.what_to_insure" :aria-describedby="ariaDescribedby" name="hometype" value="house_belongings">House & Belongings</b-form-radio>
              <b-form-radio v-model="form.what_to_insure" :aria-describedby="ariaDescribedby" name="hometype" value="house">House Only</b-form-radio>
              <b-form-radio v-model="form.what_to_insure" :aria-describedby="ariaDescribedby" name="hometype" value="belongings">Belongings Only</b-form-radio>
            </b-form-group>
            <div class="form-group" v-if="this.form.what_to_insure ==='house_belongings' || this.form.what_to_insure ==='house'">
              <label for="">What is the estimated value of your building?</label>
              <input type="text" class="form-control" v-model="form.building_value">
            </div>
            <div class="form-group" v-if="this.form.what_to_insure ==='house_belongings' || this.form.what_to_insure ==='belongings'">
            <label
              for=""
              data-toggle="tooltip"
              data-placement="right"
              title="carpets, clothes, kitchen items and appliances, household goods and personal effects for which the proposer is legally responsible, not being landlord’s fixtures and fitting, in the buildings of the proposer’s residence"
              >What is the value of your house-hold content? -
              <small
                >Items like carpets, clothes, kitchen items and appliances,
                household goods and personal effects for which the proposer is
                legally responsible, not being landlord’s fixtures and fitting,
                in the buildings of the proposer’s residence</small
              ></label
            >
            <input
              type="text"
              class="form-control"
              v-model="form.content_value"
              placeholder="enter value in Kes"
            />
          </div>
          <b-alert :show="max_compensation">
            Maximum Compensation for any single item will be: KES
            {{ max_compensation }}
          </b-alert>
          <b-alert :show="max_compensation === true"> </b-alert>
          <div class="form-group" v-if="this.form.what_to_insure ==='house_belongings' || this.form.what_to_insure ==='belongings'">
            <label for="">What is the value of your furniture?</label>
            <input
              type="text"
              class="form-control"
              v-model="form.furniture"
              placeholder="enter value in Kes"
            />
          </div>
          <div class="form-group" v-if="this.form.what_to_insure ==='house_belongings' || this.form.what_to_insure ==='belongings'">
            <label
              for=""
              data-toggle="tooltip"
              data-placement="right"
              title="Covers portable valuables like mobile phones, tablets, laptops, jewellery, watches, spectacles etc. against fire & perils, theft, loss and accidental damage."
              >What is the value of your PHONES , LAPTOPS & JEWELERY and any
              other portables?
              <small
                >Portable items like mobile phones, tablets, laptops, jewellery,
                watches, spectacles etc</small
              ></label
            >
            <input
              type="text"
              class="form-control"
              v-model="form.phones_laptops"
              placeholder="enter value in Kes"
            />
          </div>
          <hr />

          <div class="card">
            <div class="card-header">
              <h4>Additional Benefits <small>Optional</small></h4>
            </div>
            <div class="card-body text-left">
              <div class="form-group">
                <label for="wiba">Workmen Injury Benefit Act</label>
                <b-form-checkbox v-model="form.wiba" name="wiba" value="true" id="wiba">Add WIBA <small>this will cover for both your indoor and outdoor domestic servants. </small></b-form-checkbox>
              </div>
            
              <div class="form-group" v-show="form.wiba === 'true'">
                  <input type="text" class="form-control mb-3" v-model="form.wiba_servants_indoor" placeholder="How many Outdoor Servants do you have?">
                  <input type="text" class="form-control" v-model="form.wiba_servants_outdoor" placeholder="How many Indoor Servants do you have?">
                </div>
              <div class="form-group">
                <b-form-checkbox
                  v-model="form.personal_accident_add"
                  name="check-button"
                  switch
                >
                  Personal Accident
                </b-form-checkbox>
              </div>
              <div class="form-group">
                <b-form-checkbox
                  v-model="form.owners_liabity_add"
                  name="check-button"
                  switch
                >
                  Owners Liability <small>Free upto 500,000</small>
                </b-form-checkbox>
                <b-form-input
                  v-model="form.owners_liabity"
                  placeholder="Minimum Limit is Kes 500000"
                  min="500000"
                  v-if="form.owners_liabity_add === true"
                ></b-form-input>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" v-if="domesticinsurance.types.typeProduct === 'isLandlord'">
      <h2
        class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
      >
        Value of your Property
      </h2>
      <div class="row justify-content-center my-6">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">What is the estimated value of your building?</label>
            <input type="text" class="form-control" v-model="form.building_value">
          </div>
          <hr />

          <div class="card">
            <div class="card-header">
              <h4>Additional Benefits <small>Optional</small></h4>
            </div>
            <div class="card-body text-left">
              <div class="form-group">
                <b-form-checkbox
                  v-model="form.personal_accident_add"
                  name="check-button"
                  switch
                >
                  Personal Accident
                </b-form-checkbox>
              </div>
              <div class="form-group">
                <b-form-checkbox
                  v-model="form.owners_liabity_add"
                  name="check-button"
                  switch
                >
                  Owners Liability <small>Free upto 500,000</small>
                </b-form-checkbox>
                <b-form-input
                  v-model="form.owners_liabity"
                  placeholder="Minimum Limit is Kes 500000"
                  min="500000"
                  v-if="form.owners_liabity_add === true"
                ></b-form-input>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center my-6">
        <div class="col-sm-6">
          <div
            class="jituze-step-three-pagination__navigation jituze-pagination__navigation"
          >
           <button v-if="domesticinsurance.types.typeProduct === 'isLandlord'"
              :disabled="checkbuildingvalue"
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200 active-item display-flex"
              @click="generatequote"
            >
              Compare Quotes now
            </button>
            <button v-else
              :disabled="checkcontentvalue"
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200 active-item display-flex"
              @click="generatequote"
            >
              Compare Quotes now
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
  props: ["domesticSwiper", "activateNext", "activateGetQuotes"],
  data() {
    return {
      form: {
        content_value: 0,
        furniture: 0,
        personal_accident_add: false,
        occupiers_liabity: 0,
        occupiers_liabity_add: false,
        owners_liabity_add: false,
        owners_liabity: 500000,
        phones_laptops: 0,
        what_to_insure:"none",
        building_value:0,
        wiba:false,
        wiba_servants_indoor: 0,
        wiba_servants_outdoor: 0,
      },
    };
  },
  computed: {
    ...mapGetters(["domesticinsurance", "typeofProduct"]),
    housebelongings(){
      if (this.form.what_to_insure ==="house_belongings") {
        return true;
      }
    },
    checkcontentvalue() {
      if (
        this.form.content_value === "" ||
        this.form.content_value === null ||
        this.form.content_value === 0
      ) {
        return true;
      }
    },
    checkbuildingvalue() {
      if (
        this.form.building_value === "" ||
        this.form.building_value === null ||
        this.form.building_value === 0
      ) {
        return true;
      }
    },
    max_compensation() {
      if (this.form.content_value > 0 && this.form.content_value < 750000) {
        return 150000;
      } else if (
        this.form.content_value > 750001 &&
        this.form.content_value < 1000000
      ) {
        return 200000;
      } else if (
        this.form.content_value > 1000001 &&
        this.form.content_value < 1250000
      ) {
        return 250000;
      } else if (
        this.form.content_value > 1250001 &&
        this.form.content_value < 1500000
      ) {
        return 300000;
      } else if (
        this.form.content_value > 1500001 &&
        this.form.content_value < 2000000
      ) {
        return 400000;
      } else if (
        this.form.content_value > 750001 &&
        this.form.content_value < 1000000
      ) {
        return true;
      }
    },
  },
  methods: {
    generatequote(e) {
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
        personal_accident: this.form.personal_accident_add,
        product_type: this.domesticinsurance.types.typeProduct,
        content_value: this.form.content_value,
        occupiers_liabity: this.form.occupiers_liabity,
        owners_liabity: this.form.owners_liabity,
        cover_type: "d1",
        furniture: this.form.furniture,
        phones_laptops: this.form.phones_laptops,
        what_to_insure:this.form.what_to_insure,
        building_value:this.form.building_value,
        wiba:this.form.wiba,
        wiba_servants_indoor:this.form.wiba_servants_indoor,
        wiba_servants_outdoor:this.form.wiba_servants_outdoor
       
      };
      this.$store
        .dispatch("DomesticQuote", payload)
        .then((response) => {
          this.$notify({
            message: "This are the best we have tailor made for you",
            type: "success",
            duration: 5 * 1000,
          });
          this.domesticSwiper.slideTo(3);
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
.custom-control {
  display: inline-flex;
  margin-right: 20px;
}
</style>