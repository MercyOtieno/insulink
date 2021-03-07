<template>
  <div class="swiper-slide step-five">
    <div class="container">
      <div class="row py-12">
        <div class="col-sm-8">
          <div class="uk-card uk-card-default uk-uk-card-body">
            <ValidationObserver
              ref="observer"
              v-slot="{ invalid }"
              tag="form"
              @submit.prevent="collectdetails()"
            >
              <form @submit.prevent="collectdetails">
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
                      <div v-if="errors.first('name')">
                        {{ errors.first("name") }}
                      </div>
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
                        v-validate="{ required: true, regex: /^A\d{9}[A-Z]$/i }"
                        v-model="customer.kra_pin"
                        placeholder="Enter your KRA PIN here"
                        class="uk-input"
                        required=""
                      />
                      <small id="krapinHelpBlock" class="text-muted"
                        >e.g A123456789P</small
                      >
                      <div class="valid-feedback">The KRA PIN is valid!</div>
                      <div class="invalid-feedback">
                        {{ errors.first("kra pin") }}
                      </div>
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
                <div class="uk-card-footer">
                  <div class="row justify-content-center">
                    <div class="col-sm-8">
                      <div class="my-2">
                        <el-button
                          type="primary"
                          native-type="submit"
                          :disabled="checkrequirements"
                          @click="collectdetails"
                          class="inline-flex items-center primary justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
                        >
                          Save Details
                        </el-button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </ValidationObserver>
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
                    {{ homeProduct.name }}
                  </dd>
                  <dt>Underwriting Partner</dt>
                  <dd>
                    {{ homeProduct.underwriter.company }}
                  </dd>
                  <dt>Domestic Product type</dt>
                  <dd>
                    <div
                      v-if="domesticinsurance.types.typeProduct === 'isTenant'"
                    >
                      <h2
                        class="text-gray-900 font-small  mb-2"
                      >
                        Home Insurance - Tenant
                      </h2>
                    </div>
                    <div
                      v-if="
                        domesticinsurance.types.typeProduct === 'isHomeowner'
                      "
                    >
                      <h2
                        class="text-gray-900 font-small mb-2"
                      >
                        Home Insurance - Home Owner
                      </h2>
                    </div>
                    <div
                      v-if="
                        domesticinsurance.types.typeProduct === 'isLandlord'
                      "
                    >
                      <h2
                        class="text-gray-900 font-small  mb-2"
                      >
                        Home Insurance - Land Owner
                      </h2>
                    </div>
                  </dd>
                </dl>
              </div>
              <div class="uk-card-footer">
                Total Kes
                <strong>{{ homeProduct.basicpremium | formatCurrency }}</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  props: ["domesticSwiper", "activateNext", "activateGetQuotes"],
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  computed: {
    ...mapGetters([
      "domesticinsurance",
      "customer",
      "homeProduct",
      "getquotations",
      "getpurchased"
    ]),
    checkrequirements(){
      if (
        this.customer.name === "" || this.customer.name === null || this.customer.name === 0 || this.customer.phone === "" || this.customer.email === "" || this.customer.document_number === "" || this.customer.kra_pin === "") {
        return true;
      }
    }
  },
  methods: {
    handleIDUpload() {
      this.copy_id = this.$refs.copy_id.files[0];
    },
    handleKRAUpload() {
      this.customer.copy_kra_certificate = this.$refs.copy_kra.files[0];
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
        },
      });
      let payload = new FormData();
      payload.append("copy_id", this.$refs.copy_id.files[0]);
      payload.append("copy_kra_certificate", this.$refs.copy_kra.files[0]);
      payload.append("name", this.customer.name);
      payload.append("cellphone", this.customer.phone);
      payload.append("email", this.customer.email);
      payload.append("document_type", this.customer.document_type);
      payload.append("document_number", this.customer.document_number);
      payload.append("quotationId", this.getpurchased.quotation_id);
      payload.append("kra_number", this.customer.kra_pin);

      this.$store
        .dispatch("CreatedomesticCustomer", payload)
        .then((response) => {
          this.$notify({
            message: "Your Policy Account created successfully",
            type: "success",
            duration: 7 * 1000,
          });
          this.domesticSwiper.slideTo(5);
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
</style>