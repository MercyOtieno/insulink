<template>
  <div class="swiper-slide step-six">
    <div class="container">
      <b-row class="py-12">
        <div class="col-sm-8">
          <form @submit.prevent="makepayment">
            <div class="uk-card uk-card-default uk-uk-card-body">
              <div class="uk-card-header">
                <h3 class="uk-card-title">Payment Methods</h3>
              </div>
              <div class="uk-card-body">
                <div
                  class="border-solid border p-3 border-gray-300 w-26 text-center"
                >
                  <label>Lipa na Mpesa</label>
                  <img
                    src="/images/mpesa.png"
                    alt="Mpesa"
                    style="margin: 0 auto"
                  />
                </div>
                <p>
                  To pay through Paybill Number follow the instructions below
                </p>
                <ul class="uk-list uk-list-decimal">
                  <li>Go to M-PESA menu</li>
                  <li>Select Lipa na Mpesa</li>
                  <li>Select the Paybill option</li>
                  <li>
                    Enter business number
                    <strong class="text-orange-color">{{
                      homeProduct.underwriter.payments.paybill
                    }}</strong>
                  </li>
                  <li>
                    Enter your account number as
                    <strong class="text-primary">{{
                      getpurchased.quotation_number
                    }}</strong>
                  </li>
                  <li>Enter PIN and press OK to send</li>
                  <li>
                    Enter the amount
                    <strong
                      >KES
                      {{ homeProduct.basicpremium | formatCurrency }}</strong
                    >
                  </li>
                  <li>
                    You will receive a confirmation SMS from Mpesa with your
                    payment reference/transaction number
                  </li>
                </ul>
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-stacked-text"
                    >Enter Mpesa Confirmation/Transaction code</label
                  >
                  <div class="uk-form-controls">
                    <input
                      class="uk-input"
                      type="text"
                      placeholder="Mpesa Confirmation Code"
                      v-model="form.transactioncode"
                      required
                    />
                  </div>
                </div>
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-stacked-text"
                    >Mpesa Phone Number That was used to pay with</label
                  >
                  <div class="uk-form-controls">
                    <input
                      class="uk-input"
                      type="text"
                      v-model="form.phone"
                    />
                  </div>
                </div>
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-stacked-text"
                    >Choose Policy Start Date</label
                  >
                  <div class="uk-form-controls">
                    <el-date-picker
                      v-model="form.policy_start_date"
                      type="date"
                      required
                      placeholder="Pick a date that this policy should start"
                    >
                    </el-date-picker>
                  </div>
                </div>
                <div class="uk-margin">
                  <label class="uk-form-label" for="form-stacked-text"
                    >We will send your Policy Pack here</label
                  >
                  <div class="uk-form-controls">
                    <input
                      class="uk-input"
                      type="text"
                      placeholder="disabled"
                      v-model="email"
                      disabled
                    />
                  </div>
                </div>
              </div>
              <div class="uk-card-footer">
                <div class="row justify-content-center">
                  <div class="col-sm-8">
                    <div class="mb-2">
                      <label class="checkbox" for="checkbox-terms">
                        <input
                          id="checkbox-terms"
                          class="check"
                          name="checkbox"
                          type="checkbox"
                          v-model="form.tnl"
                          @change="termsChanged"
                        />
                        <span class="box"></span>
                        I confirm I have read and accepted the Terms &
                        Conditions
                      </label>
                    </div>
                    <div class="my-2">
                      <el-button
                        type="primary"
                        native-type="submit"
                        :disabled="!termscondition"
                        class="inline-flex items-center primary justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out"
                      >
                        Make Payments
                      </el-button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
                      <h2 class="text-gray-900 font-small mb-2">
                        Home Insurance - Tenant
                      </h2>
                    </div>
                    <div
                      v-if="
                        domesticinsurance.types.typeProduct === 'isHomeowner'
                      "
                    >
                      <h2 class="text-gray-900 font-small mb-2">
                        Home Insurance - Home Owner
                      </h2>
                    </div>
                    <div
                      v-if="
                        domesticinsurance.types.typeProduct === 'isLandlord'
                      "
                    >
                      <h2 class="text-gray-900 font-small mb-2">
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
      </b-row>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      form:{
        transactioncode: "",
        phone: "",
        policy_start_date: new Date(),
        tnl: "",
      }
    }
  },
  props: ["domesticSwiper", "activateNext", "activateGetQuotes"],
  computed: {
    ...mapGetters([
      "domesticinsurance",
      "getpurchased",
      "homeProduct",
      "customer",
      "getquotations",
    ]),
     ...mapState({
      email: state => state.domestic.homeData.customer.email
    }),
    termscondition() {
      if (this.form.tnl === true) return true;
    },
  },
  methods: {
    termsChanged() {
      var t = this;
      if (this.form.tnl == true) {
        Swal.fire({
          html:
            '<div class="terms_alert">' +
            '<p class="copy-large">Please Read & Confirm these Terms & Conditions</p>' +
            '<div class="terms-alert__copy scrollbar">' +
            '<p class="copy-small red"><strong>Privacy Policy</strong></p>' +
            '<p class="alert-list-item">By sharing your data on our platform, www.insulink.co.ke, you authorize us to share the same with our affiliates & our associate partners who might contact you via email or phone call, or text messages. These will enable them to offer you the services for the product you have opted for, through us and allow us to impart product knowledge, offer promotional offers running on the website & offers offered by the associated third parties, for which reasons, as well as web aggregation, personally identifiable information, may be collected as detailed below.</p>' +
            "<p>Once you key in your details, they will remain on our database and, you will only be required to log in and out using your email and password. You will only be required to key in any personal information that we don't have on our end, but is required by an underwriter to process your policy.</p>" +
            "<p>This policy, therefore, does not apply to the practices of companies that Insulink Kenya Ltd does not own or control, or to people that Insulink Kenya Ltd does not employ or manage.</p>" +
            "<p>This Privacy Policy covers Insulink Kenya Ltd against the treatment of personally identifiable information that it collects when you are on the website and when you use Insulink Kenya Ltd services.</p>" +
            "<p>When you register with us, we ask for your name, email, national identification number, KRA Pin, and any other information that will be required by the underwriters to have. By registering with Insulink Kenya Ltd, and signing in to our services, you authorize us to send SMS/email alerts to you for your login details and any other service requirements or some advertising messages/emails from us.<p>" +
            "<p><strong>Privacy Policy Changes</strong></p>" +
            "<p>Insulink Kenya Ltd may amend its privacy policy from time to time, at its discretion. Should Insulink make any substantial changes along the way, you will be informed using your personal information.</p>" +
            "<p><strong>Data Sharing and Disclosure</strong></p>" +
            "<p>Insulink Kenya Ltd follows the guidelines of the Non-Disclosure Agreement and is very keen on protecting our clients’ data. Given our legal responsibilities to legal authorities and regulators, there may be situations when we need to share your information with legal authorities or processes or need to protect our rights or comply with terms and conditions. We, however, have no control over what the 3rd parties choose to do with the data.<br>Insulink Kenya Ltd may use your personal information to share other marketing information, advising on the best policies to take, upselling/cross-selling as well as share any updates from your underwriters.</p>" +
            "<p><strong>Premium Payment Disclosure</strong>" +
            "<p>Insulink Kenya Ltd follows the guidelines provided by the regulator and does not collect premiums on behalf of the client. All the premium payments are made to the MPESA Pay-bills of the underwriters. Should there be an underpayment after valuation and assessment, you will be required to top up your premium. In case there’s an overpayment of premium, it can be carried forward to your policy renewal or a request for a refund will be arranged.</p>" +
            "</div>",

          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText: "I Accept",
          confirmButtonAriaLabel: "I Accept",
          cancelButtonText: "I Decline",
          cancelButtonAriaLabel: "I Decline",
          customClass: {
            container: "terms-alert",
            actions: "terms-alert__actions-class",
            confirmButton: "terms-alert__confirm-button-class",
            cancelButton: "terms-alert__cancel-button-class",
          },
        }).then((result) => {
          if (result.value) {
            this.form.tnl = true;
          } else {
            this.form.tnl = false;
          }
        });
      } else {
        console.log("false");
      }
    },
    makepayment() {
      Swal.fire({
        title: "Please Wait..",
        text: "We are your Payment, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        },
      });
      let payload = {
        transaction_code: this.form.transactioncode,
        email: this.email,
        phone_paid: this.form.phone,
        policy_start_date: this.form.policy_start_date,
        quotation_id: this.getpurchased.quotation_id,
        tnl: this.form.tnl,
      };
      this.$store
        .dispatch("makeDomesticPayment", payload)
        .then((response) => {
          this.$notify({
            message: "Payment Received successfully",
            type: "success",
            duration: 7 * 1000,
          });
          return false;
        })
        .catch((err) => {
          console.error(err);
        });
      this.domesticSwiper.slideTo(6);
      this.domesticSwiper.update();
      Swal.close();
    },
  },
};
</script>

<style lang="scss" scoped>
.terms-alert {
    .swal2-popup {
        padding-bottom: 0;
    }
    #swal2-content{
        position: relative;
        top: 100%;
        margin-top: 281px;
        border: 1px solid #ddd;
    padding: 1.2rem;
        .terms-alert__copy {
            text-align: justify;
        }
    
    }
}
.terms-alert__actions-class {
        position: sticky;
        left: 0;
        right: 0;
        bottom: 0;
        background: #f8f8f8;
        margin: 0;
}
</style>