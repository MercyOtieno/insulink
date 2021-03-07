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
                        v-model="gethealthcustomer.name"
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
                        v-model="gethealthcustomer.phone"
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
                        v-model="gethealthcustomer.email"
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
                        v-model="gethealthcustomer.document_number"
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
                        v-model="gethealthcustomer.kra_pin"
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
                <div class="uk-card-body bg-blue-100" v-if="checkifchildren">
                  <div class="row">
                    <div class="col-12">
                      <div class="dependants-header">
                        <p class="copy-extra-large">Dependants Information</p>
                        <p class="copy-small">
                          Tell us the details of your Dependants
                        </p>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="dependants">
                        <div id="dependantsAccordion" class="myaccordion">
                          <!--Spouse-->
                          <div
                            class="card"
                            v-if="
                              (health.h_quotations.cover_details === 'family') |
                                (health.h_quotations.cover_details === 'couple')
                            "
                          >
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button
                                  class="d-flex align-items-center justify-content-start btn btn-link initial-collapse"
                                  data-toggle="collapse"
                                  data-target="#collapseSpouse"
                                  aria-expanded="true"
                                  aria-controls="collapseOne"
                                  type="button"
                                >
                                  Spouse Details
                                  <svg
                                    class="inline-flex closed ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"
                                    />
                                  </svg>
                                  <svg
                                    class="inline-flex opened ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"
                                    />
                                  </svg>
                                </button>
                              </h2>
                            </div>
                            <div
                              id="collapseSpouse"
                              class="collapse show"
                              aria-labelledby="headingOne"
                              data-parent="#dependantsAccordion"
                            >
                              <div class="card-body">
                                <div class="card-body__inner">
                                  <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Type FULL Names here</label
                                      >
                                      <input
                                        type="text"
                                        v-model="
                                          gethealthcustomer.dependants[0].name
                                        "
                                        class="form-control"
                                        id="validationCustom02"
                                        placeholder="Full Names"
                                        :class="{
                                          'is-invalid': gethealthcustomerForm.errors.has(
                                            'dependants.0.name'
                                          ),
                                        }"
                                        required
                                      />
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.0.name"
                                      ></has-error>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Choose Date of Birth below</label
                                      >
                                      <div class="d-block">
                                        <el-date-picker
                                          v-model="
                                            gethealthcustomer.dependants[0].dob
                                          "
                                          :class="[
                                            {
                                              'is-invalid': gethealthcustomerForm.errors.has(
                                                'dependants.0.dob'
                                              ),
                                            },
                                          ]"
                                          type="date"
                                          placeholder="Pick Date of Birth"
                                        >
                                        </el-date-picker>
                                      </div>
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.0.dob"
                                      ></has-error>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--First Child-->
                          <div
                            class="card"
                            v-if="
                              (health.h_quotations.children.no_children ===
                                '1') |
                                (health.h_quotations.children.no_children ===
                                  '2') |
                                (health.h_quotations.children.no_children ===
                                  '3') |
                                (health.h_quotations.children.no_children ===
                                  '4') |
                                (health.h_quotations.children.no_children ===
                                  '5') |
                                (health.h_quotations.children.no_children ===
                                  '6')
                            "
                          >
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button
                                  class="d-flex align-items-center justify-content-start btn btn-link initial-collapse"
                                  :class="{ collapsed: !fifthChildOption }"
                                  data-toggle="collapse"
                                  data-target="#collapseDependants1"
                                  aria-expanded="true"
                                  aria-controls="collapseOne"
                                  type="button"
                                >
                                  First Child’s Details
                                  <svg
                                    class="inline-flex closed ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"
                                    />
                                  </svg>
                                  <svg
                                    class="inline-flex opened ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"
                                    />
                                  </svg>
                                </button>
                              </h2>
                            </div>
                            <div
                              id="collapseDependants1"
                              class="collapse"
                              :class="{ show: fifthChildOption }"
                              aria-labelledby="headingOne"
                              data-parent="#dependantsAccordion"
                            >
                              <div class="card-body">
                                <div class="card-body__inner">
                                  <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Type FULL NameS HERE</label
                                      >
                                      <input
                                        type="text"
                                        v-model="
                                          gethealthcustomer.dependants[1].name
                                        "
                                        class="form-control"
                                        id="validationCustom02"
                                        placeholder="Full Names"
                                        :class="{
                                          'is-invalid': gethealthcustomerForm.errors.has(
                                            'dependants.1.name'
                                          ),
                                        }"
                                        required
                                      />
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.1.name"
                                      ></has-error>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >ENTER Age or Date of Birth BELOW</label
                                      >
                                      <div class="d-block">
                                        <el-date-picker
                                          v-model="
                                            gethealthcustomer.dependants[1].dob
                                          "
                                          :class="{
                                            'is-invalid': gethealthcustomerForm.errors.has(
                                              'dependants.1.dob'
                                            ),
                                          }"
                                          type="date"
                                          placeholder="Pick Date of Birth"
                                        >
                                        </el-date-picker>
                                      </div>
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.1.dob"
                                      ></has-error>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--Second Child-->
                          <div
                            class="card"
                            v-if="
                              (health.h_quotations.children.no_children ===
                                '2') |
                                (health.h_quotations.children.no_children ===
                                  '3') |
                                (health.h_quotations.children.no_children ===
                                  '4') |
                                (health.h_quotations.children.no_children ===
                                  '5') |
                                (health.h_quotations.children.no_children ===
                                  '6')
                            "
                          >
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button
                                  class="d-flex align-items-center justify-content-start btn btn-link initial-collapse collapsed"
                                  data-toggle="collapse"
                                  data-target="#collapseDependants2"
                                  aria-expanded="true"
                                  aria-controls="collapseOne"
                                  type="button"
                                >
                                  Second Child’s Details
                                  <svg
                                    class="inline-flex closed ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"
                                    />
                                  </svg>
                                  <svg
                                    class="inline-flex opened ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"
                                    />
                                  </svg>
                                </button>
                              </h2>
                            </div>
                            <div
                              id="collapseDependants2"
                              class="collapse"
                              aria-labelledby="headingOne"
                              data-parent="#dependantsAccordion"
                            >
                              <div class="card-body">
                                <div class="card-body__inner">
                                  <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Type FULL NameS HERE</label
                                      >
                                      <input
                                        type="text"
                                        v-model="
                                          gethealthcustomer.dependants[2].name
                                        "
                                        class="form-control"
                                        id="validationCustom02"
                                        placeholder="Full Names"
                                        :class="{
                                          'is-invalid': gethealthcustomerForm.errors.has(
                                            'dependants.2.name'
                                          ),
                                        }"
                                        required
                                      />
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.2.name"
                                      ></has-error>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >ENTER Age or Date of Birth BELOW</label
                                      >
                                      <div class="d-block">
                                        <el-date-picker
                                          v-model="
                                            gethealthcustomer.dependants[2].dob
                                          "
                                          :class="{
                                            'is-invalid': gethealthcustomerForm.errors.has(
                                              'dependants.2.dob'
                                            ),
                                          }"
                                          type="date"
                                          placeholder="Pick Date of Birth"
                                        >
                                        </el-date-picker>
                                      </div>
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.2.dob"
                                      ></has-error>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--Third Child-->
                          <div
                            class="card"
                            v-if="
                              (health.h_quotations.children.no_children ===
                                '3') |
                                (health.h_quotations.children.no_children ===
                                  '4') |
                                (health.h_quotations.children.no_children ===
                                  '5') |
                                (health.h_quotations.children.no_children ===
                                  '6')
                            "
                          >
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button
                                  class="d-flex align-items-center justify-content-start btn btn-link initial-collapse collapsed"
                                  data-toggle="collapse"
                                  data-target="#collapseDependants3"
                                  aria-expanded="true"
                                  aria-controls="collapseOne"
                                  type="button"
                                >
                                  Third Child’s Details
                                  <svg
                                    class="inline-flex closed ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"
                                    />
                                  </svg>
                                  <svg
                                    class="inline-flex opened ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"
                                    />
                                  </svg>
                                </button>
                              </h2>
                            </div>
                            <div
                              id="collapseDependants3"
                              class="collapse"
                              aria-labelledby="headingOne"
                              data-parent="#dependantsAccordion"
                            >
                              <div class="card-body">
                                <div class="card-body__inner">
                                  <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Type FULL NameS HERE</label
                                      >
                                      <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        v-model="
                                          gethealthcustomer.dependants[3].name
                                        "
                                        placeholder="Full Names"
                                        :class="{
                                          'is-invalid': gethealthcustomerForm.errors.has(
                                            'dependants.3.name'
                                          ),
                                        }"
                                        required
                                      />
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.3.name"
                                      ></has-error>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >ENTER Age or Date of Birth BELOW</label
                                      >
                                      <div class="d-block">
                                        <el-date-picker
                                          v-model="
                                            gethealthcustomer.dependants[3].dob
                                          "
                                          :class="{
                                            'is-invalid': gethealthcustomerForm.errors.has(
                                              'dependants.3.dob'
                                            ),
                                          }"
                                          type="date"
                                          placeholder="Pick Date of Birth"
                                        >
                                        </el-date-picker>
                                      </div>

                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.3.dob"
                                      ></has-error>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--Fourth Child-->
                          <div
                            class="card"
                            v-if="
                              (health.h_quotations.children.no_children ===
                                '4') |
                                (health.h_quotations.children.no_children ===
                                  '5') |
                                (health.h_quotations.children.no_children ===
                                  '6')
                            "
                          >
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button
                                  class="d-flex align-items-center justify-content-start btn btn-link initial-collapse collapsed"
                                  data-toggle="collapse"
                                  data-target="#collapseDependants4"
                                  aria-expanded="true"
                                  aria-controls="collapseOne"
                                  type="button"
                                >
                                  Fourth Child’s Details
                                  <svg
                                    class="inline-flex closed ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 19l-7-7 7-7"
                                    />
                                  </svg>
                                  <svg
                                    class="inline-flex opened ml-2"
                                    width="24"
                                    height="24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"
                                    />
                                  </svg>
                                </button>
                              </h2>
                            </div>
                            <div
                              id="collapseDependants4"
                              class="collapse"
                              aria-labelledby="headingOne"
                              data-parent="#dependantsAccordion"
                            >
                              <div class="card-body">
                                <div class="card-body__inner">
                                  <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Type FULL NameS HERE</label
                                      >
                                      <input
                                        type="text"
                                        v-model="
                                          gethealthcustomer.dependants[4].name
                                        "
                                        class="form-control"
                                        id="validationCustom02"
                                        placeholder="Full Names"
                                        :class="{
                                          'is-invalid': gethealthcustomerForm.errors.has(
                                            'dependants.4.name'
                                          ),
                                        }"
                                        required
                                      />
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.4.name"
                                      ></has-error>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >ENTER Age or Date of Birth BELOW</label
                                      >
                                      <div class="d-block">
                                        <el-date-picker
                                          v-model="
                                            gethealthcustomer.dependants[4].dob
                                          "
                                          :class="{
                                            'is-invalid': gethealthcustomerForm.errors.has(
                                              'dependants.4.dob'
                                            ),
                                          }"
                                          type="date"
                                          placeholder="Pick Date of Birth"
                                        >
                                        </el-date-picker>
                                      </div>
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.4.dob"
                                      ></has-error>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--Fifth Child-->
                          <div
                            class="card"
                            v-if="
                              health.h_quotations.children.no_children === '5'
                            "
                          >
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button
                                  class="d-flex align-items-center justify-content-start btn btn-link initial-collapse collapsed"
                                  data-toggle="collapse"
                                  data-target="#collapseDependants5"
                                  aria-expanded="true"
                                  type="button"
                                  aria-controls="collapseOne"
                                >
                                  <i class="fas fa-plus"></i>
                                  <i class="fas fa-minus"></i>
                                  Fifth Child’s Details
                                </button>
                              </h2>
                            </div>
                            <div
                              id="collapseDependants5"
                              class="collapse"
                              aria-labelledby="headingOne"
                              data-parent="#dependantsAccordion"
                            >
                              <div class="card-body">
                                <div class="card-body__inner">
                                  <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >Type FULL NameS HERE</label
                                      >
                                      <input
                                        type="text"
                                        v-model="
                                          gethealthcustomer.dependants[5].name
                                        "
                                        class="form-control"
                                        id="validationCustom02"
                                        placeholder="Full Names"
                                        :class="{
                                          'is-invalid': gethealthcustomerForm.errors.has(
                                            'dependants.5.name'
                                          ),
                                        }"
                                        required
                                      />
                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.5.name"
                                      ></has-error>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="validationCustom02"
                                        >ENTER Age or Date of Birth BELOW</label
                                      >
                                      <div class="d-block">
                                        <el-date-picker
                                          v-model="
                                            gethealthcustomer.dependants[5].dob
                                          "
                                          :class="{
                                            'is-invalid': gethealthcustomerForm.errors.has(
                                              'dependants.5.dob'
                                            ),
                                          }"
                                          type="date"
                                          placeholder="Pick Date of Birth"
                                        >
                                        </el-date-picker>
                                      </div>

                                      <has-error
                                        :form="gethealthcustomerForm"
                                        field="dependants.5.dob"
                                      ></has-error>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--End Fifth Child-->
                        </div>
                      </div>
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
              <div class="uk-card-footer">
                Total Kes
                <strong>{{
                  health.h_purchased.premiumwithorwithoutbenefits | formatCurrency
                }}</strong>
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
  props: [
    "healthSwiper",
    "activateNext",
    "activateGetQuotes",
    "gethealthcustomerForm",
  ],
  data() {
    return {
      minDate: new Date(),
    };
  },
  components: {
    ValidationObserver,
    ValidationProvider,
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
      "typeofHealthProduct"
    ]),
    checkifchildren() {
      if (
        (this.health.h_quotations.cover_details === "me-spouse-children") |
        (this.health.h_quotations.cover_details === "family") |
        (this.health.h_quotations.cover_details === "couple")
      ) {
        return true;
      }
    },
    checkrequirements() {
      if (
        this.gethealthcustomer.name === "" ||
        this.gethealthcustomer.name === null ||
        this.gethealthcustomer.name === 0 ||
        this.gethealthcustomer.phone === "" ||
        this.gethealthcustomer.email === "" ||
        this.gethealthcustomer.document_number === "" ||
        this.gethealthcustomer.kra_pin === ""
      ) {
        return true;
      }
    },
  },
  methods: {
    handleIDUpload() {
      this.copy_id = this.$refs.copy_id.files[0];
    },
    handleKRAUpload() {
      this.gethealthcustomer.copy_kra_certificate = this.$refs.copy_kra.files[0];
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
      payload.append("name", this.gethealthcustomer.name);
      payload.append("cellphone", this.gethealthcustomer.phone);
      payload.append("email", this.gethealthcustomer.email);
      payload.append("document_type", this.gethealthcustomer.document_type);
      payload.append("document_number", this.gethealthcustomer.document_number);
      payload.append("quotationId", this.gethealthpurchased.quotation_id);
      payload.append("kra_number", this.gethealthcustomer.kra_pin);
      payload.append("principal_dob", this.health.basic.dob.toISOString().split('T')[0]);
      payload.append("pre_existing", this.typeofHealthProduct.pre_existing);
      payload.append("dependants", JSON.stringify(this.gethealthcustomer.dependants));
      payload.append("cover_type", "h1");
      this.$store
        .dispatch("CreatehealthCustomer", payload)
        .then((response) => {
          this.$notify({
            message: "Your Policy Account created successfully",
            type: "success",
            duration: 7 * 1000,
          });
          this.healthSwiper.slideTo(4);
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

<style lang="scss" scoped>
</style>