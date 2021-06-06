<template>
  <div class="swiper-slide step-five">
    <div class="container">
      <div class="row py-12">
        <div class="col-sm-8">
          <div class="uk-card uk-card-default uk-uk-card-body">
            <div
              v-if="status_msg"
              :class="{ 'alert-success': status, 'alert-danger': !status }"
              class="alert"
              role="alert"
            >
              {{ status_msg }}
            </div>
            <ValidationObserver
              ref="observer"
              v-slot="{ invalid }"
              tag="form"
              @submit.prevent="collectdetails()"
            >
              <form>
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
                        v-model="member.name"
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
                        v-model="member.phone"
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
                        v-model="member.email"
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
                        v-model="member.document_number"
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
                      <b-form-file
                        v-model="member.copy_id"
                        :state="Boolean(member.copy_id)"
                        ref="copy_id"
                        @change="handleIDUpload"
                        placeholder="Choose a file or drop it here..."
                        drop-placeholder="Drop file here..."
                      ></b-form-file>
                      <div class="mt-3">
                        Selected file:
                        {{ member.copy_id ? member.copy_id.name : "" }}
                      </div>
                      <!-- <input
                        class="input-file"
                        v-validate="'ext:jpeg,jpg,png,pdf'"
                        data-vv-as="field"
                        type="file"
                        ref="copy_id"
                        v-on:change="handleIDUpload()"
                      /> -->
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
                        v-model="member.kra_pin"
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
                      <b-form-file
                        v-model="member.copy_kra_certificate"
                        :state="Boolean(member.copy_kra_certificate)"
                        @change="handleKRAUpload"
                        ref="copy_kra_certificate"
                        placeholder="Choose a file or drop it here..."
                        drop-placeholder="Drop file here..."
                      ></b-form-file>
                      <div class="mt-3">
                        Selected file:
                        {{
                          member.copy_kra_certificate
                            ? member.copy_kra_certificate.name
                            : ""
                        }}
                      </div>
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
                                          getHealthDependants.dependants[0].name
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
                                            getHealthDependants.dependants[0]
                                              .dob
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
                                          getHealthDependants.dependants[1].name
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
                                            getHealthDependants.dependants[1]
                                              .dob
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
                                          getHealthDependants.dependants[2].name
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
                                            getHealthDependants.dependants[2]
                                              .dob
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
                                          getHealthDependants.dependants[3].name
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
                                            getHealthDependants.dependants[3]
                                              .dob
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
                                          getHealthDependants.dependants[4].name
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
                                            getHealthDependants.dependants[4]
                                              .dob
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
                                          getHealthDependants.dependants[5].name
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
                                            getHealthDependants.dependants[5]
                                              .dob
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
                  health.h_purchased.premiumwithorwithoutbenefits
                    | formatCurrency
                }}</strong>
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
              class="swiper-motor-button-prev w-full sm:w-auto flex-none mr-4 bg-gray-300 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200"
              @click="swipePrev"
            >
              Back
            </button>
          </div>
          <div>
            <button
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200"
              :class="{ 'opacity-25': checkrequirements }"
              :disabled="checkrequirements"
              @click="collectdetails"
            >
              Save Personal Details
            </button>
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
    "swipePrev",
  ],
  data() {
    return {
      minDate: new Date(),
      status: "",
      status_msg: "",
      member: new Form({
        name: "",
        phone: "",
        email: "",
        document_type: "",
        document_number: "",
        kra_pin: "",
        copy_id: null,
        copy_kra_certificate: null,
      }),
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
      "getHealthDependants",
      "dependants",
      "fifthChildOption",
      "typeofHealthProduct",
      "getEmailError",
      "getKraError",
      "getPhoneError",
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
        this.member.name === "" ||
        this.member.name === null ||
        this.member.name === 0 ||
        this.member.phone === "" ||
        this.member.email === "" ||
        this.member.document_number === "" ||
        this.member.kra_pin === ""
      ) {
        return true;
      }
    },
  },
  methods: {
    showNotification(message) {
      this.status_msg = message;
      setTimeout(() => {
        this.status_msg = "";
      }, 3000);
    },
    validateForm() {
      if (!this.member.name) {
        this.status = false;
        this.showNotification("You forgot to enter your Names");
        return false;
      }
      if (!this.member.phone) {
        this.status = false;
        this.showNotification("You forgot to enter your Cellphone Number");
        return false;
      }
      if (!this.member.email) {
        this.status = false;
        this.showNotification("You forgot to enter your Email Address");
        return false;
      }
      if (!this.member.kra_pin) {
        this.status = false;
        this.showNotification("You forgot to enter your Valid KRA Pin Number");
        return false;
      }
      if (!this.member.document_number) {
        this.status = false;
        this.showNotification(
          "You forgot to enter your Valid National ID Number"
        );
        return false;
      }
      if (!this.member.copy_id.length < 1) {
        this.status = false;
        this.showNotification(
          "You forgot to attach a copy of your Valid National ID Number"
        );
        return false;
      }
      if (!this.member.copy_kra_certificate.length < 1) {
        this.status = false;
        this.showNotification(
          "You forgot to attach a copy of your Valid KRA PIN Certificate"
        );
        return false;
      }
    },
    handleIDUpload(e) {
      this.member.copy_id = this.$refs.copy_id.files[0];
    },
    handleKRAUpload() {
      this.member.copy_kra_certificate = this.$refs.copy_kra_certificate.files[0];
    },
    collectdetails(e) {
      e.preventDefault();
      // if(!this.validateForm()) {
      //   return false;
      // }
      Swal.fire({
        title: "Please Wait..",
        text: "We are creating an Account for you, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        didOpen: () => {
          Swal.showLoading();
        },
      });
      let payload = {
        copy_id: this.$refs.copy_id.files[0],
        copy_kra_certificate: this.$refs.copy_kra_certificate.files[0],
        name: this.member.name,
        cellphone: this.member.phone,
        email: this.member.email,
        document_type: this.member.document_type,
        document_number: this.member.document_number,
        quotationId: this.gethealthpurchased.quotation_id,
        kra_number: this.member.kra_pin,
        principal_dob: this.health.basic.dob.toISOString().split("T")[0],
        pre_existing: this.typeofHealthProduct.pre_existing,
        dependants: JSON.stringify(this.getHealthDependants.dependants),
        cover_type: "h1",
      };

      this.$store
        .dispatch("CreatehealthCustomer", payload)
        .then((response) => {
          this.status = true;
          if (response.data.status === 200) {
            this.$notify({
              message: "Your Policy Account created successfully",
              type: "success",
              duration: 7 * 1000,
            });
            this.healthSwiper.slideTo(5);
            this.healthSwiper.update();
            Swal.close();
          }
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