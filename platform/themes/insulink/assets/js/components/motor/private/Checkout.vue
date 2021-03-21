<template>
  <div class="swiper-slide step-three">
    <!-- Third Party starts here -->
    <div class="container" v-if="vehicle.cover_type === 'c7'">
      <div class="row py-5">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header flex bg-gray-50">
              <h4
                class="flex-none text-lg leading-5 font-medium text-gray-900 mr-3"
              >
                Product Details
              </h4>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c1'"
              >
                Comprehensive Commercial Motor Insurance - Own Goods
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c2'"
              >
                Third Party Only Commercial Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c3'"
              >
                Comprehensive PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c4'"
              >
                Third Party PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c5'"
              >
                Comprehensive PSV CHAUFFEUR DRIVEN
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c6'"
              >
                Comprehensive Private Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type = 'c7'"
              >
                Third Party Private Motor Insurance
              </span>
            </div>
            <div class="card-body">
              <ul class="product-checks">
                <li>
                  <div class="row">
                    <div class="col-sm-7">
                      <img
                        class="h-20 rounded-lg"
                        :src="vehicle.purchase.product.underwriter.logo"
                        :alt="vehicle.purchase.product.underwriter.company"
                      />
                    </div>
                    <div class="col-sm-5">
                      {{ vehicle.purchase.product.name }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="text-lg leading-6 font-medium text-gray-900">
                        Current Benefits
                      </h4>
                    </div>
                    <div class="col-sm-7">
                      <span>Emergency Medical Expenses</span>
                    </div>
                    <div
                      class="col-sm-5"
                      v-if="
                        vehicle.purchase.product.rates.emergency ===
                        'Not covered'
                      "
                    >
                      {{ vehicle.purchase.product.rates.emergency }}
                    </div>
                    <div class="col-sm-5" v-else>
                      Kes
                      {{
                        vehicle.purchase.product.rates.emergency
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Third Party Property Damage</span>
                    </div>
                    <div class="col-sm-5">
                      Kes
                      {{
                        vehicle.purchase.product.rates.tppd_3rdparty
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Passenger Legal Liability</span>
                    </div>
                    <div class="col-sm-5">
                      {{
                        vehicle.purchase.product.rates.passenger_legal_liability
                      }}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-7">
                  <h4><small>Total Premium: </small></h4>
                </div>
                <div class="col-sm-5">
                  <strong
                    >Kes
                    <span
                      class="text-2xl font-bold leading-tight text-gray-900 text-uppercase"
                      >{{ premiumwithorwithoutbenefits | formatCurrency }}</span
                    ></strong
                  >
                </div>
              </div>
            </div>
          </div>
          <h4 class="mt-3 text-lg leading-6 font-medium text-gray-900">
            Your Car Insurance Sticker
          </h4>
          <small class="text-sm leading-5">
            We will deliver your insurance sticker same day in Nairobi. Areas
            outside Nairobi may take up to 24hrs
          </small>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-2 rounded-lg mt-0 bg-gray-50 p-3">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Vehicle Make</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.motorvehicle }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Manufactured</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.year_of_manufacture }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Estimated Value</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        Kes {{ vehicle.v_value | formatCurrency }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Type of Cover</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c1'"
                        >
                          Comprehensive Commercial Motor Insurance - Own Goods
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c2'"
                        >
                          Third Party Only Commercial Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c3'"
                        >
                          Comprehensive PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c4'"
                        >
                          Third Party PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c5'"
                        >
                          Comprehensive PSV CHAUFFEUR DRIVEN
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c6'"
                        >
                          Comprehensive Private Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type === 'c7'"
                        >
                          Third Party Private Motor Insurance
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Third Party ends here -->
    <!-- General Cartage starts here -->
    <div class="container" v-if="vehicle.cover_type === 'c12'">
      <div class="row py-5">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header flex bg-gray-50">
              <h4
                class="flex-none text-lg leading-5 font-medium text-gray-900 mr-3"
              >
                Product Details
              </h4>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c1'"
              >
                Comprehensive Commercial Motor Insurance - Own Goods
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c2'"
              >
                Third Party Only Commercial Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c3'"
              >
                Comprehensive Commercial PSV Online Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c4'"
              >
                Third Party PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c5'"
              >
                Comprehensive PSV CHAUFFEUR DRIVEN
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c6'"
              >
                Comprehensive Private Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.cover_type === 'c7'"
              >
                Third Party Private Motor Insurance
              </span>
            </div>
            <div class="card-body">
              <ul class="product-checks">
                <li>
                  <div class="row">
                    <div class="col-sm-7">
                      <img
                        class="h-20 rounded-lg"
                        :src="vehicle.purchase.product.underwriter.logo"
                        :alt="vehicle.purchase.product.underwriter.company"
                      />
                    </div>
                    <div class="col-sm-5">
                      {{ vehicle.purchase.product.rates.name }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Emergency Medical Expenses</span>
                    </div>
                    <div
                      class="col-sm-5"
                      v-if="
                        vehicle.purchase.product.rates.medical == 'Not covered'
                      "
                    >
                      {{ vehicle.purchase.product.rates.medical }}
                    </div>
                    <div class="col-sm-5" v-else>
                      Kes
                      {{
                        vehicle.purchase.product.rates.medical | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Third Party Property Damage</span>
                    </div>
                    <div class="col-sm-5">
                      Kes
                      {{
                        vehicle.purchase.product.rates.tppd | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Passenger Legal Liability</span>
                    </div>
                    <div class="col-sm-5">
                      {{
                        vehicle.purchase.product.rates
                          .passenger_legal_liability
                      }}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <p class="text-lg leading-6 font-medium text-gray-900">
                Optional Benefits
              </p>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.road_rescue" class="inline-flex">
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
                    <strong>Road Rescue: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.road_rescue"
                    >KSh. {{ this.benefits.road_rescue | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.loss_use" class="inline-flex">
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
                    <strong>Loss of Use: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.loss_use"
                    >KSh. {{ lossofuse | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.pvt" class="inline-flex">
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
                    <strong>Political Violence & Terrorism: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.pvt"
                    >KSh. {{ this.pvt | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.excess_protector" class="inline-flex">
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
                    <strong>Excess Protector: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.excess_protector"
                    >KSh. {{ this.excess_protector | formatCurrency }}</span
                  >
                </div>
              </div>
               <div class="row">
                <div class="col-sm-6">
                  <h5><small>Sub Total: </small></h5>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    {{ vehicle.purchase.basicpremium | formatCurrency }}</strong
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h4><small>Total Premium: </small></h4>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    <span
                      class="text-2xl font-bold leading-tight text-gray-900 text-uppercase"
                      >{{ premiumwithorwithoutbenefits | formatCurrency }}</span
                    ></strong
                  >
                </div>
              </div>
            </div>
          </div>
          <h4 class="mt-3 text-lg leading-6 font-medium text-gray-900">
            Your Car Insurance Sticker
          </h4>
          <small class="text-sm leading-5">
            We will deliver your insurance sticker same day in Nairobi. Areas
            outside Nairobi may take up to 24hrs
          </small>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-2 rounded-lg mt-0 bg-gray-50 p-3">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Vehicle Make</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.motorvehicle }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Manufactured</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.year_of_manufacture }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Estimated Value</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        Kes {{ vehicle.v_value | formatCurrency }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Type of Cover</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c1'"
                        >
                          Comprehensive Commercial Motor Insurance - Own Goods
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c2'"
                        >
                          Third Party Only Commercial Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c3'"
                        >
                          Comprehensive Commercial PSV Online Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c4'"
                        >
                          Third Party PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c5'"
                        >
                          Comprehensive PSV CHAUFFEUR DRIVEN
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c6'"
                        >
                          Comprehensive Private Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.cover_type == 'c7'"
                        >
                          Third Party Private Motor Insurance
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h4 class="text-lg leading-6 font-medium text-gray-900"
              :class="{
        active: hidebenefits,
        'not-active': !hidebenefits,
      }">
                Add Benefits
              </h4>
              <table class="table font-sans table-hover" :class="{
        active: hidebenefits,
        'not-active': !hidebenefits,
      }">
                <thead class="bg-gray-600 rounded text-white">
                  <tr>
                    <th>Benefit</th>
                    <th>Rate</th>
                    <th>Minimum</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr class="text-semibold" 
                  :class="{
                      active: hidebenefits,
                      'not-active': !hidebenefits,
                    }">
                    <td>
                      <b-form-checkbox
                        id="pvt"
                        v-model="benefits.pvt"
                        name="pvt"
                        switch
                        size="lg"
                      >
                        Political Violence Terrorism
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.pvt">
                      {{ pvt }}
                    </td>
                    <td v-else>Not Added</td>
                    <td>3000</td>
                  </tr>
                  
                  <tr class="bg-gray-50" :class="{
        active: hidebenefits,
        'not-active': !hidebenefits,
      }">
                    <td>
                      <b-form-checkbox
                        id="excess_protector"
                        v-model="benefits.excess_protector"
                        name="excess_protector"
                        switch
                        size="lg"
                      >
                        Excess Protector
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.excess_protector">
                      {{ excess_protector }}
                    </td>
                    <td v-else>Not added yet</td>
                    <td>5000</td>
                  </tr>
                </tbody>
              </table>
              <div class="py-4">
                <h4 class="text-lg leading-6 font-medium text-gray-900">
                  Additional Benefits
                </h4>
                <small class="text-sm leading-5">
                  The following excess amounts are applicable in case you make a
                  claim on your car insurance policy. We recommend you add an
                  Excess Protector option to this policy to reduce any excesses
                  you are liable for in case of a claim. Check Benefits section
                  to find out if this policy already includes an Excess
                  Protector.
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- General Cartage ends here -->
    <div class="container" v-if="vehicle.cover_type === 'c3'">
      <div class="row py-5">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header flex bg-gray-50">
              <h4
                class="flex-none text-lg leading-5 font-medium text-gray-900 mr-3"
              >
                Product Details
              </h4>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c1'"
              >
                Comprehensive Commercial Motor Insurance - Own Goods
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c2'"
              >
                Third Party Only Commercial Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c3'"
              >
                Comprehensive PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c4'"
              >
                Third Party PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c5'"
              >
                Comprehensive PSV CHAUFFEUR DRIVEN
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c6'"
              >
                Comprehensive Private Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c7'"
              >
                Third Party Private Motor Insurance
              </span>
            </div>
            <div class="card-body">
              <ul class="product-checks">
                <li>
                  <div class="row">
                    <div class="col-sm-7">
                      <img
                        class="h-20 rounded-lg"
                        :src="vehicle.purchase.product.underwriter.logo"
                        :alt="vehicle.purchase.product.underwriter.company"
                      />
                    </div>
                    <div class="col-sm-5">
                      {{ vehicle.purchase.product.name }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Medical Expenses</span>
                    </div>
                    <div class="col-sm-5" v-if="vehicle.purchase.product.rates.medical ==='Not covered'">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.medical
                      }}
                    </div>
                    <div class="col-sm-5" v-else>
                      KSh.
                      {{
                        vehicle.purchase.product.rates.medical
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Third Party Property Damage</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.tppd
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Passenger Legal Liability</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.passenger_legal_liability
                      }}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <p class="text-lg leading-6 font-medium text-gray-900">
                Optional Benefits
              </p>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.road_rescue" class="inline-flex">
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
                    <strong>Road Rescue: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.road_rescue"
                    >KSh. {{ this.benefits.road_rescue | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.loss_use" class="inline-flex">
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
                    <strong>Loss of Use: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.loss_use"
                    >KSh. {{ lossofuse | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.pvt" class="inline-flex">
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
                    <strong>Political Violence & Terrorism: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.pvt"
                    >KSh. {{ this.pvt | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.excess_protector" class="inline-flex">
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
                    <strong>Excess Protector: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.excess_protector"
                    >KSh. {{ this.excess_protector | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h5><small>Sub Total: </small></h5>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    {{ vehicle.purchase.basicpremium | formatCurrency }}</strong
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h4><small>Total Premium: </small></h4>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    <span
                      class="text-2xl font-bold leading-tight text-gray-900 text-uppercase"
                      >{{ premiumwithorwithoutbenefits | formatCurrency }}</span
                    ></strong
                  >
                </div>
              </div>
            </div>
          </div>
          <h4 class="mt-3 text-lg leading-6 font-medium text-gray-900">
            Your Car Insurance Sticker
          </h4>
          <small class="text-sm leading-5">
            We will deliver your insurance sticker same day in Nairobi. Areas
            outside Nairobi may take up to 24hrs
          </small>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-2 rounded-lg mt-0 bg-gray-50 p-3">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Vehicle Make</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.motorvehicle }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Year of Manufacture</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.year_of_manufacture }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Estimated Value</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        Kes {{ vehicle.v_value | formatCurrency }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Type of Cover</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c1'"
                        >
                          Comprehensive Commercial Motor Insurance - Own Goods
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c2'"
                        >
                          Third Party Only Commercial Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c3'"
                        >
                          Comprehensive PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c4'"
                        >
                          Third Party PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c5'"
                        >
                          Comprehensive PSV CHAUFFEUR DRIVEN
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c6'"
                        >
                          Comprehensive Private Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c7'"
                        >
                          Third Party Private Motor Insurance
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h4 class="text-lg leading-6 font-medium text-gray-900">
                Add Benefits
              </h4>
              <table class="table font-sans table-hover">
                <thead class="bg-gray-600 rounded text-white">
                  <tr>
                    <th>Benefit</th>
                    <th>Rate</th>
                    <th>Minimum</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-gray-50">
                    <td>
                      <b-form-checkbox
                        id="Loss-Of-Use"
                        v-model="benefits.loss_use"
                        name="Loss-Of-Use"
                        switch
                        size="lg"
                      >
                        Loss of Use
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.loss_use">{{ lossofuse }}</td>
                    <td v-else>Not added yet</td>
                    <td>3000</td>
                  </tr>
                  <tr class="text-semibold">
                    <td>
                      <b-form-checkbox
                        id="pvt"
                        v-model="benefits.pvt"
                        name="pvt"
                        switch
                        size="lg"
                      >
                        Political Violence Terrorism
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.pvt">
                      {{ pvt }}
                    </td>
                    <td v-else>Not Added</td>
                    <td>3000</td>
                  </tr>
                  <tr class="bg-gray-50">
                    <td>
                      <b-form-checkbox
                        id="excess_protector"
                        v-model="benefits.excess_protector"
                        name="excess_protector"
                        switch
                        size="lg"
                      >
                        Excess Protector
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.excess_protector">
                      {{ excess_protector }}
                    </td>
                    <td v-else>Not added yet</td>
                    <td>3000</td>
                  </tr>
                  <tr class="text-semibold">
                    <td>
                      <b-form-checkbox
                        id="road_rescue"
                        v-model="benefits.road_rescue"
                        name="road_rescue"
                        switch
                        size="lg"
                        value="7500"
                        unchecked-value="0"
                      >
                        Road Rescue
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.road_rescue">7500</td>
                    <td v-else>Not added yet</td>
                    <td>N/A</td>
                  </tr>
                </tbody>
              </table>
              <div class="py-4">
                <h4 class="text-lg leading-6 font-medium text-gray-900">
                  Additional Benefits
                </h4>
                <small class="text-sm leading-5">
                  The following excess amounts are applicable in case you make a
                  claim on your car insurance policy. We recommend you add an
                  Excess Protector option to this policy to reduce any excesses
                  you are liable for in case of a claim. Check Benefits section
                  to find out if this policy already includes an Excess
                  Protector.
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end General Cartage  -->
    <!-- Own goods ends here -->
    <div class="container" v-if="vehicle.cover_type === 'c1'">
      <div class="row py-5">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header flex bg-gray-50">
              <h4
                class="flex-none text-lg leading-5 font-medium text-gray-900 mr-3"
              >
                Product Details
              </h4>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c1'"
              >
                Comprehensive Commercial Motor Insurance - Own Goods
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c2'"
              >
                Third Party Only Commercial Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c3'"
              >
                Comprehensive PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c4'"
              >
                Third Party PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c5'"
              >
                Comprehensive PSV CHAUFFEUR DRIVEN
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c6'"
              >
                Comprehensive Private Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c7'"
              >
                Third Party Private Motor Insurance
              </span>
            </div>
            <div class="card-body">
              <ul class="product-checks">
                <li>
                  <div class="row">
                    <div class="col-sm-7">
                      <img
                        class="h-20 rounded-lg"
                        :src="vehicle.purchase.product.underwriter.logo"
                        :alt="vehicle.purchase.product.underwriter.company"
                      />
                    </div>
                    <div class="col-sm-5">
                      {{ vehicle.purchase.product.name }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Authorized Repairs</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.repairs
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Medical Expenses</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.medical
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Windscreen / Window glass</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.windscreen
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Towing Charges</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.towing
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Radio Cassette / CD Player</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.entertainment
                          | formatCurrency
                      }}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <p class="text-lg leading-6 font-medium text-gray-900">
                Optional Benefits
              </p>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.road_rescue" class="inline-flex">
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
                    <strong>Road Rescue: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.road_rescue"
                    >KSh. {{ this.benefits.road_rescue | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.loss_use" class="inline-flex">
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
                    <strong>Loss of Use: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.loss_use"
                    >KSh. {{ lossofuse | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.pvt" class="inline-flex">
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
                    <strong>Political Violence & Terrorism: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.pvt"
                    >KSh. {{ this.pvt | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.excess_protector" class="inline-flex">
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
                    <strong>Excess Protector: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.excess_protector"
                    >KSh. {{ this.excess_protector | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h5><small>Sub Total: </small></h5>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    {{ vehicle.purchase.basicpremium | formatCurrency }}</strong
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h4><small>Total Premium: </small></h4>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    <span
                      class="text-2xl font-bold leading-tight text-gray-900 text-uppercase"
                      >{{ premiumwithorwithoutbenefits | formatCurrency }}</span
                    ></strong
                  >
                </div>
              </div>
            </div>
          </div>
          <h4 class="mt-3 text-lg leading-6 font-medium text-gray-900">
            Your Car Insurance Sticker
          </h4>
          <small class="text-sm leading-5">
            We will deliver your insurance sticker same day in Nairobi. Areas
            outside Nairobi may take up to 24hrs
          </small>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-2 rounded-lg mt-0 bg-gray-50 p-3">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Vehicle Make</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.motorvehicle }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Year of Manufacture</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.year_of_manufacture }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Estimated Value</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        Kes {{ vehicle.v_value | formatCurrency }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Type of Cover</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c1'"
                        >
                          Comprehensive Commercial Motor Insurance - Own Goods
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c2'"
                        >
                          Third Party Only Commercial Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c3'"
                        >
                          Comprehensive PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c4'"
                        >
                          Third Party PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c5'"
                        >
                          Comprehensive PSV CHAUFFEUR DRIVEN
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c6'"
                        >
                          Comprehensive Private Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c7'"
                        >
                          Third Party Private Motor Insurance
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h4 class="text-lg leading-6 font-medium text-gray-900">
                Add Benefits
              </h4>
              <table class="table font-sans table-hover">
                <thead class="bg-gray-600 rounded text-white">
                  <tr>
                    <th>Benefit</th>
                    <th>Rate</th>
                    <th>Minimum</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr class="bg-gray-50">
                    <td>
                      <b-form-checkbox
                        id="Loss-Of-Use"
                        v-model="benefits.loss_use"
                        name="Loss-Of-Use"
                        switch
                        size="lg"
                      >
                        Loss of Use
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.loss_use">{{ lossofuse }}</td>
                    <td v-else>Not added yet</td>
                    <td>3000</td>
                  </tr>
                  <tr class="text-semibold" v-show="!vehicle.purchase.productID ==='31'">
                    <td>
                      <b-form-checkbox
                        id="pvt"
                        v-model="benefits.pvt"
                        name="pvt"
                        switch
                        size="lg"
                      >
                        Political Violence Terrorism
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.pvt">
                      {{ pvt }}
                    </td>
                    <td v-else>Not Added</td>
                    <td>3000</td>
                  </tr>
                  <tr class="bg-gray-50">
                    <td>
                      <b-form-checkbox
                        id="excess_protector"
                        v-model="benefits.excess_protector"
                        name="excess_protector"
                        switch
                        size="lg"
                      >
                        Excess Protector
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.excess_protector">
                      {{ excess_protector }}
                    </td>
                    <td v-else>Not added yet</td>
                    <td>3000</td>
                  </tr>
                  <tr class="text-semibold">
                    <td>
                      <b-form-checkbox
                        id="road_rescue"
                        v-model="benefits.road_rescue"
                        name="road_rescue"
                        switch
                        size="lg"
                        value="7500"
                        unchecked-value="0"
                      >
                        Road Rescue
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.road_rescue">7500</td>
                    <td v-else>Not added yet</td>
                    <td>N/A</td>
                  </tr>
                </tbody>
              </table>
              <div class="py-4">
                <h4 class="text-lg leading-6 font-medium text-gray-900">
                  Additional Benefits
                </h4>
                <small class="text-sm leading-5">
                  The following excess amounts are applicable in case you make a
                  claim on your car insurance policy. We recommend you add an
                  Excess Protector option to this policy to reduce any excesses
                  you are liable for in case of a claim. Check Benefits section
                  to find out if this policy already includes an Excess
                  Protector.
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end Own goods -->
    <!-- General Cartage ends here -->
    <div class="container" v-if="vehicle.cover_type === 'c6'">
      <div class="row py-5">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header flex bg-gray-50">
              <h4
                class="flex-none text-lg leading-5 font-medium text-gray-900 mr-3"
              >
                Product Details
              </h4>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c1'"
              >
                Comprehensive Commercial Motor Insurance - Own Goods
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c2'"
              >
                Third Party Only Commercial Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c3'"
              >
                Comprehensive PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c4'"
              >
                Third Party PSV SELF DRIVE Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c5'"
              >
                Comprehensive PSV CHAUFFEUR DRIVEN
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c6'"
              >
                Comprehensive Private Motor Insurance
              </span>
              <span
                class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                v-if="vehicle.purchase.cover_type == 'c7'"
              >
                Third Party Private Motor Insurance
              </span>
            </div>
            <div class="card-body">
              <ul class="product-checks">
                <li>
                  <div class="row">
                    <div class="col-sm-7">
                      <img
                        class="h-20 rounded-lg"
                        :src="vehicle.purchase.product.underwriter.logo"
                        :alt="vehicle.purchase.product.underwriter.company"
                      />
                    </div>
                    <div class="col-sm-5">
                      {{ vehicle.purchase.product.name }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Authorized Repairs</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.authorised_repair
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Medical Expenses</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.medical_expense
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Windscreen / Window glass</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.windscreen
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Towing Charges</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.towing_recovery
                          | formatCurrency
                      }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-7">
                      <span>Radio Cassette / CD Player</span>
                    </div>
                    <div class="col-sm-5">
                      KSh.
                      {{
                        vehicle.purchase.product.rates.entertainment
                          | formatCurrency
                      }}
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <p class="text-lg leading-6 font-medium text-gray-900">
                Optional Benefits
              </p>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.road_rescue" class="inline-flex">
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
                    <strong>Road Rescue: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.road_rescue"
                    >KSh. {{ this.benefits.road_rescue | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.loss_use" class="inline-flex">
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
                    <strong>Loss of Use: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.loss_use"
                    >KSh. {{ lossofuse | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.pvt" class="inline-flex">
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
                    <strong>Political Violence & Terrorism: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.pvt"
                    >KSh. {{ this.pvt | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <p v-if="this.benefits.excess_protector" class="inline-flex">
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
                    <strong>Excess Protector: </strong>
                  </p>
                </div>
                <div class="col-sm-4">
                  <span v-if="this.benefits.excess_protector"
                    >KSh. {{ this.excess_protector | formatCurrency }}</span
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h5><small>Sub Total: </small></h5>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    {{ vehicle.purchase.basicpremium | formatCurrency }}</strong
                  >
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <h4><small>Total Premium: </small></h4>
                </div>
                <div class="col-sm-6">
                  <strong
                    >KSh.
                    <span
                      class="text-2xl font-bold leading-tight text-gray-900 text-uppercase"
                      >{{ premiumwithorwithoutbenefits | formatCurrency }}</span
                    ></strong
                  >
                </div>
              </div>
            </div>
          </div>
          <h4 class="mt-3 text-lg leading-6 font-medium text-gray-900">
            Your Car Insurance Sticker
          </h4>
          <small class="text-sm leading-5">
            We will deliver your insurance sticker same day in Nairobi. Areas
            outside Nairobi may take up to 24hrs
          </small>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-12">
              <div class="mb-2 rounded-lg mt-0 bg-gray-50 p-3">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Vehicle Make</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.motorvehicle }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Year of Manufacture</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        {{ vehicle.motorPrivate.year_of_manufacture }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Estimated Value</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        Kes {{ vehicle.v_value | formatCurrency }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <strong
                          class="text-md leading-5 font-medium text-gray-900"
                          >Type of Cover</strong
                        >
                      </div>
                      <div class="col-sm-6">
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c1'"
                        >
                          Comprehensive Commercial Motor Insurance - Own Goods
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c2'"
                        >
                          Third Party Only Commercial Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c3'"
                        >
                          Comprehensive PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c4'"
                        >
                          Third Party PSV SELF DRIVE Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c5'"
                        >
                          Comprehensive PSV CHAUFFEUR DRIVEN
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c6'"
                        >
                          Comprehensive Private Motor Insurance
                        </span>
                        <span
                          class="hidden sm:block flex-auto text-gray-400 text-sm leading-5 font-medium"
                          v-if="vehicle.purchase.cover_type == 'c7'"
                        >
                          Third Party Private Motor Insurance
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h4 class="text-lg leading-6 font-medium text-gray-900">
                Add Benefits
              </h4>
              <table class="table font-sans table-hover">
                <thead class="bg-gray-600 rounded text-white">
                  <tr>
                    <th>Benefit</th>
                    <th>Rate</th>
                    <th>Minimum</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-gray-50">
                    <td>
                      <b-form-checkbox
                        id="Loss-Of-Use"
                        v-model="benefits.loss_use"
                        name="Loss-Of-Use"
                        switch
                        size="lg"
                      >
                        Loss of Use
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.loss_use">{{ lossofuse }}</td>
                    <td v-else>Not added yet</td>
                    <td>3000</td>
                  </tr>
                  <tr class="text-semibold">
                    <td>
                      <b-form-checkbox
                        id="pvt"
                        v-model="benefits.pvt"
                        name="pvt"
                        switch
                        size="lg"
                      >
                        Political Violence Terrorism
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.pvt">
                      {{ pvt }}
                    </td>
                    <td v-else>Not Added</td>
                    <td>3000</td>
                  </tr>
                  <tr class="bg-gray-50">
                    <td>
                      <b-form-checkbox
                        id="excess_protector"
                        v-model="benefits.excess_protector"
                        name="excess_protector"
                        switch
                        size="lg"
                      >
                        Excess Protector
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.excess_protector">
                      {{ excess_protector }}
                    </td>
                    <td v-else>Not added yet</td>
                    <td>3000</td>
                  </tr>
                  <tr class="text-semibold">
                    <td>
                      <b-form-checkbox
                        id="road_rescue"
                        v-model="benefits.road_rescue"
                        name="road_rescue"
                        switch
                        size="lg"
                        value="7500"
                        unchecked-value="0"
                      >
                        Road Rescue
                      </b-form-checkbox>
                    </td>
                    <td v-if="benefits.road_rescue">7500</td>
                    <td v-else>Not added yet</td>
                    <td>N/A</td>
                  </tr>
                </tbody>
              </table>
              <div class="py-4">
                <h4 class="text-lg leading-6 font-medium text-gray-900">
                  Additional Benefits
                </h4>
                <small class="text-sm leading-5">
                  The following excess amounts are applicable in case you make a
                  claim on your car insurance policy. We recommend you add an
                  Excess Protector option to this policy to reduce any excesses
                  you are liable for in case of a claim. Check Benefits section
                  to find out if this policy already includes an Excess
                  Protector.
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container my-4">
      <div>
        <div
          class="jituze-step-three-pagination__navigation jituze-pagination__navigation col-12"
        >
          <div>
            <button
              class="swiper-motor-button-prev w-full sm:w-auto flex-none bg-gray-300 mr-4 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200"
              @click="swipePrev"
            >
              Back
            </button>
          </div>
          <div>
            <button
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200"
              @click="pushquotation"
            >
              Proceed to Purchase
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
  props: ["motorSwiper", "swipePrev"],
  data() {
    return {
      benefits: new Form({
        loss_use: 0,
        loss_of_use_days: 0,
        pvt: 0,
        excess_protector: 0,
        road_rescue: 0,
      }),
      checkedNumbers: [],
      isLoading: false,
      fullPage: true,
      checked:true,
      checkedpvt:true
    };
  },
  components: {},
  methods: {
    pushquotation() {
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
      let payload = {
        total: this.premiumwithorwithoutbenefits,
        pvt: this.pvt,
        road_rescue: this.benefits.road_rescue,
        loss_use: this.lossofuse,
        excess_protector: this.excess_protector,
        productID: this.vehicle.purchase.productID,
        v_value: this.vehicle.v_value,
        cover_type: this.vehicle.cover_type,
      };
      this.$store
        .dispatch("motorPrivateCheckout", payload)
        .then((response) => {
          if (response.data.quotation_id) {
            this.$notify({
            message: "benefits added successfully",
            type: "success",
            duration: 7 * 1000,
          });
          this.motorSwiper.slideTo(3);
          this.motorSwiper.update();
          
          }
          Swal.close();
        })
        .catch((err) => {
          Toast.fire({
            icon: "error",
            title: "Error Submiting Data",
          });
        });

    },
  },
  computed: {
    ...mapGetters(["vehicle", "getBuypurchase"]),
    hidebenefits() {
      if(this.getBuypurchase.productID === 36) {
        return false;
      } else {
        return true;
      }
    },
    premiumwithorwithoutbenefits() {
      return (
        parseInt(this.vehicle.purchase.basicpremium) +
        parseInt(this.pvt) +
        parseInt(this.benefits.road_rescue) +
        parseInt(this.lossofuse) +
        parseInt(this.excess_protector)
      );
    },
    pvt() {
      let rate = 0;
      if (this.benefits.pvt) {
        rate = 0.0025 * parseInt(this.vehicle.purchase.basicpremium);
        if (rate < 3000) {
          return (rate = 3000);
        }
      } else {
        this.benefits.pvt = 0;
      }
      return (this.benefits.pvt = rate);
    },
    lossofuse() {
      let rate = 0;
      if (this.benefits.loss_use) {
        rate = 30000 * 0.15;
        if (this.benefits.loss_of_use_days > 10) {
          return (rate = 3000);
        }
      } else {
        this.benefits.loss_use = 0;
        this.benefits.loss_of_use_days = 10;
      }
      return (this.benefits.loss_use = rate);
    },
    excess_protector() {
      let rate = 0;
      if (this.benefits.excess_protector) {
        rate = 0.0025 * parseInt(this.vehicle.purchase.basicpremium);
        if (rate < 3000) {
          return (rate = 3000);
        }
      } else {
        this.benefits.excess_protector = 0;
      }
      return (this.benefits.excess_protector = rate);
    },
  },
};
</script>


<style lang="scss" scoped>
</style>