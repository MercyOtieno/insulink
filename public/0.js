(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["healthSwiper", "activateNext", "activateGetQuotes"],
  data: function data() {
    return {
      age: 0,
      ip: 200000,
      pre_existing: 0,
      pre_existing_details: 0,
      op: 0,
      inpatient: [{
        value: '200000',
        label: 'Kes 200,000'
      }, {
        value: '400000',
        label: 'Kes 400,000'
      }, {
        value: '500000',
        label: 'Kes 500,000'
      }, {
        value: '750000',
        label: 'Kes 750,000'
      }, {
        value: '1000000',
        label: 'Kes 1,000,000'
      }, {
        value: '2000000',
        label: 'Kes 2,000,000'
      }, {
        value: '3000000',
        label: 'Kes 3,000,000'
      }, {
        value: '5000000',
        label: 'Kes 5,000,000'
      }, {
        value: '6000000',
        label: 'Kes 6,000,000'
      }, {
        value: '10000000',
        label: 'Kes 10,000,000'
      }, {
        value: '12000000',
        label: 'Kes 12,000,000'
      }, {
        value: '20000000',
        label: 'Kes 20,000,000'
      }, {
        value: '40000000',
        label: 'Kes 40,000,000'
      }],
      maternity_limit: [{
        value: '25000',
        label: 'Kes 25,000'
      }, {
        value: '40000',
        label: 'Kes 40,000'
      }, {
        value: '50000',
        label: 'Kes 50,000'
      }, {
        value: '100000',
        label: 'Kes 100,000'
      }, {
        value: '250000',
        label: 'Kes 250,000'
      }, {
        value: '500000',
        label: 'Kes 500,000'
      }],
      optical_limit: [{
        value: '5000',
        label: 'Kes 5,000'
      }, {
        value: '10000',
        label: 'Kes 10,000'
      }, {
        value: '20000',
        label: 'Kes 20,000'
      }, {
        value: '30000',
        label: 'Kes 30,000'
      }, {
        value: '40000',
        label: 'Kes 40,000'
      }, {
        value: '50000',
        label: 'Kes 50,000'
      }],
      dental_limit: [{
        value: '5000',
        label: 'Kes 5,000'
      }, {
        value: '10000',
        label: 'Kes 10,000'
      }, {
        value: '20000',
        label: 'Kes 20,000'
      }, {
        value: '30000',
        label: 'Kes 30,000'
      }, {
        value: '40000',
        label: 'Kes 40,000'
      }, {
        value: '50000',
        label: 'Kes 50,000'
      }],
      dob: "",
      pickerOptions: {
        disabledDate: function disabledDate(time) {
          return time.getTime() > Date.now() - 18;
        },
        shortcuts: [{
          text: 'Today',
          onClick: function onClick(picker) {
            picker.$emit('pick', new Date());
          }
        }, {
          text: 'Yesterday',
          onClick: function onClick(picker) {
            var date = new Date();
            date.setTime(date.getTime() - 3600 * 1000 * 24);
            picker.$emit('pick', date);
          }
        }, {
          text: 'A week ago',
          onClick: function onClick(picker) {
            var date = new Date();
            date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
            picker.$emit('pick', date);
          }
        }]
      }
    };
  },
  computed: {
    checkifdob: function checkifdob() {
      if (this.dob === '') {
        return true;
      }
    }
  },
  methods: {
    customerselect: function customerselect() {
      //e.preventDefault();
      Swal.fire({
        title: "Please Wait..",
        text: "We are preparing the best for you, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: function onOpen() {
          Swal.showLoading();
        }
      });
      var payload = {
        age: this.age,
        dob: this.dob,
        ip: this.ip,
        pre_existing: this.pre_existing,
        pre_existing_details: this.pre_existing_details,
        maternity: this.maternity,
        maternity_rate: this.maternity_rate,
        optical_rate: this.optical_rate,
        dental_rate: this.dental_rate,
        optical: this.optical,
        dental: this.dental
      };
      this.$store.dispatch("gethealthcustomertype", payload);
      this.healthSwiper.slideTo(1);
      this.healthSwiper.update();
      Swal.close();
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--51-2!./node_modules/sass-loader/dist/cjs.js??ref--51-3!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".el-radio.is-bordered + .el-radio.is-bordered[data-v-4c994654] {\n  margin-left: 18px;\n}\n.el-radio[data-v-4c994654] {\n  margin-right: 0;\n  /* margin-right: 30px; */\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--51-2!./node_modules/sass-loader/dist/cjs.js??ref--51-3!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../../../node_modules/css-loader!../../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../node_modules/postcss-loader/src??ref--51-2!../../../../../../../node_modules/sass-loader/dist/cjs.js??ref--51-3!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=template&id=4c994654&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=template&id=4c994654&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "swiper-slide step-one dsc_hero-section py-3" },
    [
      _c("div", { staticClass: "container mt-6" }, [
        _c(
          "h2",
          {
            staticClass:
              "text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
          },
          [_vm._v("\n      You can save more by Providing Accurate data\n    ")]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "row justify-content-center my-6" }, [
          _c(
            "div",
            { staticClass: "col-sm-8" },
            [
              _c("el-card", { staticClass: "box-card" }, [
                _c(
                  "div",
                  { staticClass: "form-group" },
                  [
                    _c("label", { attrs: { for: "" } }, [
                      _vm._v("Select your Age Bracket below ")
                    ]),
                    _vm._v(" "),
                    _c(
                      "el-radio-group",
                      {
                        model: {
                          value: _vm.age,
                          callback: function($$v) {
                            _vm.age = $$v
                          },
                          expression: "age"
                        }
                      },
                      [
                        _c("el-radio", { attrs: { label: 1, border: "" } }, [
                          _vm._v("18 years - 30 years ")
                        ]),
                        _vm._v(" "),
                        _c("el-radio", { attrs: { label: 2, border: "" } }, [
                          _vm._v("31 years - 40 years ")
                        ]),
                        _vm._v(" "),
                        _c("el-radio", { attrs: { label: 3, border: "" } }, [
                          _vm._v("41 years - 50 years ")
                        ]),
                        _vm._v(" "),
                        _c("el-radio", { attrs: { label: 4, border: "" } }, [
                          _vm._v("51 years - 60 years ")
                        ]),
                        _vm._v(" "),
                        _c("el-radio", { attrs: { label: 5, border: "" } }, [
                          _vm._v("61 years - 70 years ")
                        ]),
                        _vm._v(" "),
                        _c("el-radio", { attrs: { label: 6, border: "" } }, [
                          _vm._v("71 years - above")
                        ])
                      ],
                      1
                    )
                  ],
                  1
                )
              ])
            ],
            1
          )
        ]),
        _vm._v(" "),
        this.age === 1 ||
        this.age === 2 ||
        this.age === 3 ||
        this.age === 4 ||
        this.age === 5
          ? _c("div", { staticClass: "row justify-content-center my-6" }, [
              _c(
                "div",
                { staticClass: "col-sm-8" },
                [
                  _c("el-card", { staticClass: "box-card" }, [
                    _c(
                      "div",
                      {
                        staticClass: "clearfix",
                        attrs: { slot: "header" },
                        slot: "header"
                      },
                      [_c("span", [_vm._v("Cover Details")])]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "card-body" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c(
                            "label",
                            { staticClass: "d-block", attrs: { for: "" } },
                            [_vm._v("Annual Inpatient Cover Limit")]
                          ),
                          _vm._v(" "),
                          _c(
                            "el-select",
                            {
                              staticClass: "d-block",
                              attrs: {
                                placeholder: "Select In-Patient Amount"
                              },
                              model: {
                                value: _vm.ip,
                                callback: function($$v) {
                                  _vm.ip = $$v
                                },
                                expression: "ip"
                              }
                            },
                            _vm._l(_vm.inpatient, function(item) {
                              return _c("el-option", {
                                key: item.value,
                                attrs: { label: item.label, value: item.value }
                              })
                            }),
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c(
                            "label",
                            { staticClass: "d-block", attrs: { for: "" } },
                            [
                              _vm._v(
                                "Do you have any pre-existing medical condition? "
                              ),
                              _c("small", [
                                _vm._v(
                                  "A health problem, like asthma, diabetes, or cancer"
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "el-radio-group",
                            {
                              model: {
                                value: _vm.pre_existing,
                                callback: function($$v) {
                                  _vm.pre_existing = $$v
                                },
                                expression: "pre_existing"
                              }
                            },
                            [
                              _c(
                                "el-radio",
                                { attrs: { label: 1, border: "" } },
                                [_vm._v("Yes")]
                              ),
                              _vm._v(" "),
                              _c(
                                "el-radio",
                                { attrs: { label: 0, border: "" } },
                                [_vm._v("No")]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: _vm.pre_existing === 1,
                              expression: "pre_existing ===1"
                            }
                          ],
                          staticClass: "form-group"
                        },
                        [
                          _c("label", { attrs: { for: "" } }, [
                            _vm._v(
                              "Kindly state the Pre-existing conditions below"
                            )
                          ]),
                          _vm._v(" "),
                          _c("el-input", {
                            attrs: {
                              type: "textarea",
                              rows: 2,
                              placeholder:
                                "Please state the Pre-existing conditions here ..."
                            },
                            model: {
                              value: _vm.pre_existing_details,
                              callback: function($$v) {
                                _vm.pre_existing_details = $$v
                              },
                              expression: "pre_existing_details"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c(
                            "label",
                            { staticClass: "d-block", attrs: { for: "" } },
                            [_vm._v("Date of Birth of the Applicant")]
                          ),
                          _vm._v(" "),
                          _c("el-date-picker", {
                            attrs: {
                              type: "date",
                              placeholder: "Pick the Day you were Born"
                            },
                            model: {
                              value: _vm.dob,
                              callback: function($$v) {
                                _vm.dob = $$v
                              },
                              expression: "dob"
                            }
                          })
                        ],
                        1
                      )
                    ])
                  ])
                ],
                1
              )
            ])
          : _vm._e()
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row justify-content-center" }, [
          _c("div", { staticClass: "col-sm-6" }, [
            _c(
              "div",
              {
                staticClass:
                  "jituze-step-three-pagination__navigation jituze-pagination__navigation"
              },
              [
                _c(
                  "button",
                  {
                    staticClass:
                      "swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200 active-item display-flex",
                    attrs: { disabled: _vm.checkifdob },
                    on: { click: _vm.customerselect }
                  },
                  [_vm._v("\n            Choose Who to Cover\n          ")]
                )
              ]
            )
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/Age.vue":
/*!**********************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/Age.vue ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Age_vue_vue_type_template_id_4c994654_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Age.vue?vue&type=template&id=4c994654&scoped=true& */ "./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=template&id=4c994654&scoped=true&");
/* harmony import */ var _Age_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Age.vue?vue&type=script&lang=js& */ "./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Age_vue_vue_type_style_index_0_id_4c994654_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true& */ "./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Age_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Age_vue_vue_type_template_id_4c994654_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Age_vue_vue_type_template_id_4c994654_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "4c994654",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "platform/themes/insulink/assets/js/components/health/Age.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Age.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true&":
/*!********************************************************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true& ***!
  \********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_51_2_node_modules_sass_loader_dist_cjs_js_ref_51_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_style_index_0_id_4c994654_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/style-loader!../../../../../../../node_modules/css-loader!../../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../../node_modules/postcss-loader/src??ref--51-2!../../../../../../../node_modules/sass-loader/dist/cjs.js??ref--51-3!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=style&index=0&id=4c994654&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_51_2_node_modules_sass_loader_dist_cjs_js_ref_51_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_style_index_0_id_4c994654_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_51_2_node_modules_sass_loader_dist_cjs_js_ref_51_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_style_index_0_id_4c994654_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_51_2_node_modules_sass_loader_dist_cjs_js_ref_51_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_style_index_0_id_4c994654_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_51_2_node_modules_sass_loader_dist_cjs_js_ref_51_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_style_index_0_id_4c994654_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=template&id=4c994654&scoped=true&":
/*!*****************************************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=template&id=4c994654&scoped=true& ***!
  \*****************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_template_id_4c994654_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Age.vue?vue&type=template&id=4c994654&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/Age.vue?vue&type=template&id=4c994654&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_template_id_4c994654_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Age_vue_vue_type_template_id_4c994654_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);