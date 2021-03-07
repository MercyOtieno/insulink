<template>
  <div class="swiper-slide step-four">
    <div class="container">
      <div class="row py-5">
        <div class="col-sm-5">
          <div>
            <div class="uk-card uk-card-default uk-uk-card-body">
              <div class="uk-card-header">
                <h3 class="uk-card-title">Quotation Summary</h3>
              </div>
              <div class="uk-card-body">
                <dl class="uk-description-list">
                  <dt>Product</dt>
                  <dd>
                    {{ healthProduct.name }}
                  </dd>
                  <dt>Underwriting Partner</dt>
                  <dd>
                    {{ healthProduct.underwriter.company }}
                  </dd>
                  <dt>Domestic Product type</dt>
                  <dd>
                    <div
                      v-if="
                        gethealthquotations.cover_details ===
                        'me-spouse-children'
                      "
                    >
                      <h2 class="text-gray-900 font-small mb-2">
                        Me or Spouse and Children
                      </h2>
                    </div>
                    <div v-if="gethealthquotations.cover_details === 'family'">
                      <h2 class="text-gray-900 font-small mb-2">My Family</h2>
                    </div>
                    <div v-if="gethealthquotations.cover_details === 'couple'">
                      <h2 class="text-gray-900 font-small mb-2">
                        Me and my Spouse
                      </h2>
                    </div>
                    <div
                      v-if="gethealthquotations.cover_details === 'me-spouse'"
                    >
                      <h2 class="text-gray-900 font-small mb-2">
                        Just for Me or my Spouse
                      </h2>
                    </div>
                  </dd>
                </dl>
              </div>
              <div class="uk-card-header"><h4 class="uk-card-title">Benefits</h4></div>
              <div class="uk-card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <p v-if="add_maternity === true" class="inline-flex">
                      <svg
                        class="text-green-400 w-6 h-6 mr-1 transform transition-transform duration-500 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <strong>Maternity Cover: </strong>
                    </p>
                  </div>
                  <div class="col-sm-6">
                    <span v-if="add_maternity === true"
                      >KSh. {{ maternity | formatCurrency }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p v-if="add_optical === true" class="inline-flex">
                      <svg
                        class="text-green-400 w-6 h-6 mr-1 transform transition-transform duration-500 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <strong>Optical Cover: </strong>
                    </p>
                  </div>
                  <div class="col-sm-6">
                    <span v-if="add_optical === true"
                      >KSh. {{ optical | formatCurrency }}</span
                    >
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p v-if="add_dental === true" class="inline-flex">
                      <svg
                        class="text-green-400 w-6 h-6 mr-1 transform transition-transform duration-500 ease-in-out"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <strong>Dental Cover: </strong>
                    </p>
                  </div>
                  <div class="col-sm-6">
                    <span v-if="add_dental === true"
                      >KSh. {{ dental | formatCurrency }}</span
                    >
                  </div>
                </div>
              </div>
              <div class="uk-card-footer">
                Total Kes
                <strong>{{
                  healthpremiumwithorwithoutbenefits | formatCurrency
                }}</strong>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-7">
          <div
            class="uk-card uk-card-default uk-uk-card-body"
            v-if="showbenefits === true"
          >
            <div class="uk-card-header">
              <h4 class="uk-card-title">Additional Benefits</h4>
            </div>
            <div class="uk-card-body">
              <div class="form-group" v-if="checkAAR === false">
                <b-form-checkbox
                  v-model="add_maternity"
                  name="check-button"
                  switch
                >
                  Add Maternity cover
                  <div class="ml-2 inline-flex" v-if="add_maternity === true" style=" top: 5.5px; position: relative; ">
                    <svg
                      class="text-green-400 transform inline-flex transition-transform duration-500 ease-in-out"
                      width="24"
                      height="24"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    added!
                  </div>
                </b-form-checkbox>
                <div v-if="checkGA ===true && add_maternity === true">
                  <label for="">Maternity Limit</label>
                  <select name="ga_maternity" class="form-control" id="" v-model="ga_maternity">
                    <option value="13975">Kes 50,000</option>
                    <option value="15992">Kes 75,000</option>
                    <option value="18525">Kes 100,000</option>
                    <option value="20250">Kes 150,000</option>
                  </select>
                </div>
              </div>
              <div
                class="form-group"
                v-if="!checkbritam === true && !checkAAR === true && !checkGA ===true"
              >
                <b-form-checkbox
                  v-model="add_dental"
                  name="check-button"
                  switch
                >
                  Add Dental cover
                  <div class="ml-2 inline-flex" v-if="add_dental === true" style=" top: 5.5px; position: relative; ">
                    <svg
                      class="text-green-400 inline-flex transform transition-transform duration-500 ease-in-out"
                      width="24"
                      height="24"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    added!
                  </div>
                </b-form-checkbox>
              </div>
              <div
                class="form-group"
                v-if="!checkbritam === true && !checkAAR === true && !checkGA ===true"
              >
                <b-form-checkbox
                  v-model="add_optical"
                  name="check-button"
                  switch
                >
                  Add Optical cover
                  <div class="ml-2 inline-flex" v-if="add_optical === true" style=" top: 5.5px; position: relative; ">
                    <svg
                      class="text-green-400 inline-flex transform transition-transform duration-500 ease-in-out"
                      width="24"
                      height="24"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    added!
                  </div>
                </b-form-checkbox>
              </div>
            </div>
          </div>
          <div class="uk-card uk-card-default uk-uk-card-body" v-else>
            <div class="uk-card-header">
              <h4 class="uk-card-title">Additional Benefits</h4>
            </div>
            <div class="uk-card-body">
              <b-alert show>All Benefits are Inclusive</b-alert>
            </div>
          </div>
          <div class="bg-gray-50 mt-3">
            <div class="float-right">
              <el-button
                type="primary"
                icon="el-icon-shopping-cart-1"
                @click="pushhealthquotation"
                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
              >
                Proceed to Purchase
              </el-button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h4 class="uk-card-title">Product Brochure/Policy Document</h4>
          <div class="mt-2">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe
                class="embed-responsive-item"
                :src="healthProduct.brochure"
                allowfullscreen
              ></iframe>
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
  props: [
    "healthSwiper",
    "activateNext",
    "activateGetQuotes",
    "gethealthcustomerForm",
  ],
  data() {
    return {
      add_maternity: "",
      add_dental: "",
      add_optical: "",
      ga_maternity:0
    };
  },
  computed: {
    ...mapGetters([
      "health",
      "gethealthcustomer",
      "healthProduct",
      "gethealthquotations",
      "gethealthpurchased",
      "dependants",
      "fifthChildOption",
      "typeofHealthProduct",
    ]),
    checkbritam() {
      if (
        this.healthProduct.productID === 41 ||
        this.healthProduct.productID === 55 ||
        this.healthProduct.productID === 56 ||
        this.healthProduct.productID === 57 ||
        this.healthProduct.productID === 58 ||
        this.healthProduct.productID === 59
      ) {
        return true;
      } else {
        return false;
      }
    },
    checkAAR() {
      if (
        this.healthProduct.productID === 40 ||
        this.healthProduct.productID === 45 ||
        this.healthProduct.productID === 44 ||
        this.healthProduct.productID === 43 ||
        this.healthProduct.productID === 46 ||
        this.healthProduct.productID === 47
      ) {
        return true;
      } else {
        return false;
      }
    },
    checkGA() {
      if (
        this.healthProduct.productID === 42 ||
        this.healthProduct.productID === 60 ||
        this.healthProduct.productID === 61 ||
        this.healthProduct.productID === 62 ||
        this.healthProduct.productID === 63
      ) {
        return true;
      } else {
        return false;
      }
    },
    showbenefits() {
      if (
        this.healthProduct.has_benefits === "null" ||
        this.healthProduct.has_benefits === "false"
      ) {
        return false;
      } else {
        return true;
      }
    },
    healthpremiumwithorwithoutbenefits() {
      return (
        parseInt(this.healthProduct.basicpremium) +
        parseInt(this.maternity) +
        parseInt(this.dental) +
        parseInt(this.optical)
      );
    },
    maternity() {
      let rate = 0;
      if (this.checkGA ===true) {
          if (this.add_maternity === true) {
          return parseInt(this.ga_maternity);
        } else {
          return rate;
        }
      } else {
        if (this.add_maternity === true) {
          return parseInt(this.healthProduct.maternity);
        } else {
          return rate;
        }
      }
      
    },
    dental() {
      let rate = 0;
      switch (this.gethealthquotations.cover_details) {
        case 'family':
          switch (this.health.h_quotations.children.no_children) {
            case 2:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 4;
              } else {
                return rate;
              }
              break;
            case 3:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 5;
              } else {
                return rate;
              }
              break;
            case 4:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 6;
              } else {
                return rate;
              }
              break;
            case 5:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 7;
              } else {
                return rate;
              }
              break;
          
            default:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 3;
              } else {
                return rate;
              }
              break;
          }
          break;
        case 'me-spouse-children':
          switch (this.health.h_quotations.children.no_children) {
            case 2:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 3;
              } else {
                return rate;
              }
              break;
            case 3:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 4;
              } else {
                return rate;
              }
              break;
            case 4:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 5;
              } else {
                return rate;
              }
              break;
            case 5:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 6;
              } else {
                return rate;
              }
              break;
          
            default:
              if (this.add_dental === true) {
                return parseInt(this.healthProduct.dental) * 2;
              } else {
                return rate;
              }
              break;
          }
          break;
        case 'couple':
          if (this.add_dental === true) {
            return parseInt(this.healthProduct.dental) *2;
          } else {
            return rate;
          }
          break;
      
        default:
          if (this.add_dental === true) {
            return parseInt(this.healthProduct.dental);
          } else {
            return rate;
          }
          break;
      }
    },
    optical() {
      let rate = 0;
      switch (this.gethealthquotations.cover_details) {
        case 'family':
          switch (this.health.h_quotations.children.no_children) {
            case 2:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 4;
              } else {
                return rate;
              }
              break;
            case 3:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 5;
              } else {
                return rate;
              }
              break;
            case 4:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 6;
              } else {
                return rate;
              }
              break;
            case 5:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 7;
              } else {
                return rate;
              }
              break;
          
            default:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 3;
              } else {
                return rate;
              }
              break;
          }
          break;
        case 'me-spouse-children':
          switch (this.health.h_quotations.children.no_children) {
            case 2:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 3;
              } else {
                return rate;
              }
              break;
            case 3:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 4;
              } else {
                return rate;
              }
              break;
            case 4:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 5;
              } else {
                return rate;
              }
              break;
            case 5:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 6;
              } else {
                return rate;
              }
              break;
          
            default:
              if (this.add_optical === true) {
                return parseInt(this.healthProduct.optical) * 2;
              } else {
                return rate;
              }
              break;
          }
          break;
        case 'couple':
          if (this.add_optical === true) {
            return parseInt(this.healthProduct.optical) *2;
          } else {
            return rate;
          }
          break;
      
        default:
          if (this.add_optical === true) {
            return parseInt(this.healthProduct.optical);
          } else {
            return rate;
          }
          break;
      }
    },
  },
  methods: {
    pushhealthquotation() {
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
        total: this.healthpremiumwithorwithoutbenefits,
        maternity: this.maternity,
        productID:this.healthProduct.productID,
        levies :this.healthProduct.levies,
        premium :this.healthProduct.premium,
        stamp_duty :this.healthProduct.stamp_duty,
        dental: this.dental,
        optical: this.optical,
        cover_details: this.gethealthquotations.cover_details,
        pre_existing_details: this.health.basic.pre_existing_details,
        cover_type: this.health.h_product.cover_type,
      };
      this.$store
        .dispatch("buyHealthproductfinal", megapayload)
        .then((response) => {
          this.$notify({
            message: "add Personal Details to complete",
            type: "success",
            duration: 5 * 1000,
          });
          this.healthSwiper.slideTo(4);
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

<style>
</style>