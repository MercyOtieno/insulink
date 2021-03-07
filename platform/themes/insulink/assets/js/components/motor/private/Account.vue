<template>
  <div class="swiper-slide step-four">
    <div class="container">
      <div class="row py-12">
        <div class="col-sm-8">
          <div class="uk-card uk-card-default uk-uk-card-body">
            <form class="needs-validation" novalidate>
              <div class="uk-card-header">
                <h4 class="uk-card-title">Tell us About you</h4>
              </div>
              <div class="uk-card-body">
                <!-- Full Names | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="name"
                    >Full Names</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="nameHelpBlock"
                      id="name"
                      name="name"
                      type="text"
                      v-model="customer.name"
                      v-validate="'required'"
                      placeholder="Enter your Name here"
                      class="uk-input"
                    />
                    <small id="nameHelpBlock" class="text-muted"
                      >e.g John Kamau</small
                    > 
                    <div v-if="errors.first('name')">{{ errors.first("name") }}</div>
                  </div>
                </div>

                <!-- Cell Phone | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="cell_phone"
                    >Cell Phone</label
                  >
                  <div class="col-md-6">
                    <vue-tel-input
                      v-model="customer.phone"
                      name="cell phone number"
                      v-validate="'required'"
                    ></vue-tel-input>

                    <small id="cellphoneHelpBlock" class="text-muted"
                      >e.g 0720000000</small
                    >
                    <div class="valid-feedback">
                      The Cellphone number you have provided is valid!
                    </div>
                    <div class="invalid-feedback">
                      {{ errors.first("cell phone number") }}
                    </div>
                  </div>
                </div>

                <!-- Email Address | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="email"
                    >Email Address</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="emailHelpBlock"
                      id="email"
                      name="email"
                      type="email"
                      v-validate="'required|email'"
                      v-model="customer.email"
                      placeholder="Enter your Email here"
                      class="uk-input"
                    />
                    <small id="emailHelpBlock" class="text-muted"
                      >e.g johndoe@mail.com</small
                    >
                    <div class="valid-feedback">The KRA PIN is valid!</div>
                    <div class="invalid-feedback">
                      {{ errors.first("email") }}
                    </div>
                  </div>
                </div>

                <!-- Document Number | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="document_number"
                    >ID Number</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="document_numberHelpBlock"
                      id="document_number"
                      name="ID number"
                      v-model="customer.document_number"
                      required
                      v-validate
                      type="text"
                      placeholder="Enter your Identification Number here"
                      class="uk-input"
                    />
                    <small id="document_numberHelpBlock" class="text-muted"
                      >e.g 12345678</small
                    >
                    <div class="valid-feedback">The KRA PIN is valid!</div>
                    <div class="invalid-feedback">
                      {{ errors.first("ID number") }}
                    </div>
                  </div>
                </div>

                <!-- Attach Copy of ID | File Button -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="copy_id"
                    >Attach Copy of ID</label
                  >
                  <div class="col-md-6">
                    <input
                      class="input-file"
                      v-validate="'ext:jpeg,jpg,png,pdf'"
                      data-vv-as="field"
                      type="file"
                      ref="copy_id"
                      v-on:change="handleIDUpload()"
                    />
                  </div>
                </div>

                <!-- KRA PIN Number | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="kra_pin"
                    >KRA PIN Number</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="krapinHelpBlock"
                      id="kra_pin"
                      name="kra pin"
                      type="text"
                      v-model="customer.kra_pin"
                      placeholder="Enter your KRA PIN here"
                      class="uk-input"
                      :class="{ 'is-invalid': vehicleForm.errors.has('customer.kra_pin') }"
                      @input="validateKra"
                    />
                    <small id="krapinHelpBlock" class="text-muted"
                      >e.g A123456789P</small
                    >
                   <span class="inputError" v-if="getKraError">{{ getKraError}}</span>
                    <has-error :form="vehicleForm" field="customer.kra_pin"></has-error>
                  </div>
                </div>

                <!-- Attach Copy of ID | File Button -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="copy_of_kra"
                    >Attach Copy of KRA PIN Certificate</label
                  >
                  <div class="col-md-6">
                    <input
                      class="input-file"
                      v-validate="'ext:jpeg,jpg,png,pdf'"
                      data-vv-as="field"
                      type="file"
                      ref="copy_kra"
                      v-on:change="handleKRAUpload()"
                    />
                  </div>
                </div>
              </div>
              <div class="uk-card-header">
                <h4 class="text-lg leading-6 font-medium text-gray-900">
                  Vehicle Details
                </h4>
              </div>
              <div class="uk-card-body">
                <!-- Registration Number | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="registration"
                    >Registration Number</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="registrationHelpBlock"
                      id="registration"
                      name="registration"
                      v-model="motorvehicle.registration"
                      type="text"
                      placeholder="Enter Vehicle Registration number here"
                      class="uk-input"
                      required
                      v-validate
                    />
                    <small id="registrationHelpBlock" class="text-muted"
                      >e.g KBK 998U</small
                    >
                  </div>
                </div>

                <!-- Chassis Number | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="chasis_number"
                    >Chassis Number</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="chasis_numberHelpBlock"
                      id="chasis_number"
                      name="chasis number"
                      v-model="motorvehicle.chassis"
                      type="text"
                      placeholder="Enter your Vehicle Chassis here"
                      class="uk-input"
                      required
                      v-validate
                    />
                    <small id="chasis_numberHelpBlock" class="text-muted"
                      >e.g SV30-0169266</small
                    >
                  </div>
                </div>

                <!-- Engine Number | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="engine_number"
                    >Engine Number</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="engine_numberHelpBlock"
                      id="engine_number"
                      name="engine number"
                      v-model="motorvehicle.engine"
                      type="text"
                      placeholder="Enter your Vehicle Engine number"
                      class="uk-input"
                      required
                      v-validate
                    />
                    <small id="engine_numberHelpBlock" class="text-muted"
                      >e.g PJ12345U123456P</small
                    >
                  </div>
                </div>

                <!-- Cc (cubic centimeters) | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="cc"
                    >Cc (cubic centimeters)</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="ccHelpBlock"
                      id="cc"
                      name="cc"
                      v-model="motorvehicle.cc"
                      type="text"
                      placeholder="Enter you Vehicle CC here"
                      class="uk-input"
                      required
                      v-validate
                    />
                    <small id="ccHelpBlock" class="text-muted">e.g 1300</small>
                  </div>
                </div>

                <!-- Seating Capacity | Text input-->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="seatingcapacity"
                    >Seating Capacity</label
                  >
                  <div class="col-md-6">
                    <input
                      aria-describedby="seatingcapacityHelpBlock"
                      id="seatingcapacity"
                      name="seating capacity"
                      v-model="motorvehicle.seat_capacity"
                      type="text"
                      placeholder="Enter your Vehicle Seating Capacity here"
                      class="uk-input"
                      required
                      v-validate
                    />
                    <small id="seatingcapacityHelpBlock" class="text-muted"
                      >e,g 5</small
                    >
                  </div>
                </div>

                <!-- Attach Copy of ID | File Button -->
                <div class="form-group row">
                  <label class="col-md-4 col-form-label" for="copy_of_logbook"
                    >Attach Copy of Log Book</label
                  >
                  <div class="col-md-6">
                    <input
                      class="input-file"
                      v-validate="'ext:jpeg,jpg,png,pdf'"
                      data-vv-as="field"
                      type="file"
                      ref="copy_logbook"
                      v-on:change="handleLogbookUpload()"
                    />
                  </div>
                </div>
              </div>
         
            </form>
          </div>
        </div>
        <div class="col-sm-4">
          <div>
            <div class="uk-card uk-card-default uk-uk-card-body">
              <div class="uk-card-header">
                <h3 class="uk-card-title">Quotation Summary</h3>
              </div>
              <div class="uk-card-body">
                <dl class="uk-description-list">
                  <dt>Product</dt>
                  <dd>
                    {{ vehicle.purchase.name }}
                  </dd>
                  <dt>Underwriting Partner</dt>
                  <dd>
                    {{ vehicle.purchase.product.underwriter.company }}
                  </dd>
                  <dt>Vehicle being Insured</dt>
                  <dd>{{ vehicle.motorPrivate.motorvehicle }}</dd>
                  <dt>Estimated Value of the Vehicle</dt>
                  <dd>
                    Kes {{ vehicle.v_value }}
                  </dd>
                </dl>
              </div>
              <div class="uk-card-footer">
                Total Kes
                <strong>{{ vehicle.purchase.premiumwithorwithoutbenefits | formatCurrency }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container my-4">
      <div>
        <div class="jituze-step-three-pagination__navigation jituze-pagination__navigation col-12">
          <div>
            <button class="swiper-motor-button-prev w-full sm:w-auto flex-none mr-4 bg-gray-300 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200" @click="swipePrev">Back</button>
          </div>
          <div>
            <button class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg  py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200" @click="collectdetails">Save Personal Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
import { ValidationObserver, ValidationProvider } from 'vee-validate';
export default {
  props: ["motorSwiper", "swipePrev"],
  data() {
    return {
      vehicleForm: new Form(),
    }
  },
  watch:{
    customer(newValue, oldValue){

    },
    motovehicle(newValue, oldValue) {}
  },
  components:{
    ValidationObserver,
    ValidationProvider
  },
  computed:{
    ...mapGetters(["vehicle", "motorvehicle", "customer", "getEmailError","getKraError","getPhoneError", "vehicleveh_type"]),
    makemodel() {
      return ;
    }
  },
  methods: {
    ...mapActions(["validateEmail", "validateKra", "validatePhone"]),
    handleIDUpload() {
      this.copy_id = this.$refs.copy_id.files[0];
    },
    handleKRAUpload() {
      this.customer.copy_kra_certificate = this.$refs.copy_kra.files[0];
    },
    handleLogbookUpload() {
      this.motorvehicle.logbook = this.$refs.copy_logbook.files[0];
    },
    collectdetails(e) {
       e.preventDefault();
      Swal.fire({
        title: "Please Wait..",
        text: "We are creating an Account for you, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      let payload = new FormData();
      payload.append("copy_id", this.$refs.copy_id.files[0]);
      payload.append("copy_kra_certificate", this.$refs.copy_kra.files[0]);
      payload.append("name", this.customer.name);
      payload.append("cellphone", this.customer.phone);
      payload.append("email", this.customer.email);
      payload.append("document_type", this.customer.document_type);
      payload.append("document_number", this.customer.document_number);
      payload.append("quotationId", this.vehicle.purchase.quotation_id);
      payload.append("value_vehicle", this.vehicle.v_value);
      payload.append("year_manufacture", this.vehicle.motorPrivate.year_of_manufacture);
      payload.append("kra_number", this.customer.kra_pin);
      payload.append("registration", this.motorvehicle.registration);
      payload.append("chassis", this.motorvehicle.chassis);
      payload.append("engine", this.motorvehicle.engine);
      payload.append("cc", this.motorvehicle.cc);
      payload.append("seat_capacity", this.motorvehicle.seat_capacity);
      payload.append("logbook", this.$refs.copy_logbook.files[0]);
      payload.append("cover_type", this.vehicle.purchase.cover_type);
      payload.append("makemodel", this.vehicleveh_type.make_model);
      this.$store
            .dispatch("CreateCustomer", payload)
            .then((response) => {
             this.$notify({
                message: "Your Policy Account created successfully",
                type: "success",
                duration: 7 * 1000,
              })
              this.motorSwiper.slideTo(4);
              this.motorSwiper.update();
              Swal.close();
            })
            .catch((err) => {
              Toast.fire({
                icon: "error",
                title: "Error Submiting Data"
              });
              this.motorSwiper.update();
              Swal.close();
            });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>