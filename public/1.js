(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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
      cover_details: "",
      no_children: 0
    };
  },
  computed: _objectSpread({
    checkcoverset: function checkcoverset() {
      if (this.cover_details === "" || this.cover_details === null || this.cover_details === 0) {
        return true;
      }
    },
    checkif1selected: function checkif1selected() {
      if (this.cover_details === "me-spouse") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    checkif2selected: function checkif2selected() {
      if (this.cover_details === "family") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    checkif3selected: function checkif3selected() {
      if (this.cover_details === "me-spouse-children") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    },
    checkif4selected: function checkif4selected() {
      if (this.cover_details === "couple") {
        return "selected-product";
      } else {
        return "not-selected";
      }
    }
  }, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(["typeofHealthProduct"])),
  methods: {
    gethealthquotes: function gethealthquotes(e) {
      var _this = this;

      e.preventDefault();
      Swal.fire({
        title: "Please Wait..",
        text: "We are processing the best Quotations for you ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: function onOpen() {
          Swal.showLoading();
        }
      });
      var payload = {
        no_children: this.no_children,
        cover_details: this.cover_details,
        age: this.typeofHealthProduct.age,
        dob: Math.round(new Date(this.typeofHealthProduct.dob).getTime() / 1000),
        ip: this.typeofHealthProduct.ip,
        preexisting: this.typeofHealthProduct.pre_existing,
        cover_type: "h1",
        maternity: this.typeofHealthProduct.maternity,
        maternity_rate: this.typeofHealthProduct.maternity_rate,
        optical_rate: this.typeofHealthProduct.optical_rate,
        dental_rate: this.typeofHealthProduct.dental_rate,
        optical: this.typeofHealthProduct.optical,
        dental: this.typeofHealthProduct.dental
      };
      this.$store.dispatch("HealthQuote", payload).then(function (response) {
        _this.$notify({
          message: "See what we have for you",
          type: "success",
          duration: 5 * 1000
        });

        _this.healthSwiper.slideTo(2);

        _this.healthSwiper.update();

        Swal.close();
      })["catch"](function (err) {
        console.error(err);
        Toast.fire({
          icon: "error",
          title: "Error Submiting Data"
        });
      });
      this.healthSwiper.update();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************************************/
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
          [_vm._v("\n      How Many People are you going to Cover\n    ")]
        ),
        _vm._v(" "),
        _c(
          "h3",
          {
            staticClass:
              "text-2xl font-medium leading-6 text-gray-600 sm:text-2xl sm:leading-8 sm:truncate mb-2 text-capitalize text-center"
          },
          [_vm._v("\n      Choose who to Cover below\n    ")]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "row justify-content-center my-6" }, [
          _c("div", { staticClass: "col-sm-12" }, [
            _c(
              "div",
              {
                staticClass:
                  "flex flex-wrap -mx-3 overflow-hidden sm:-mx-4 md:-mx-4 lg:-mx-5 xl:-mx-5"
              },
              [
                _c(
                  "div",
                  {
                    staticClass:
                      "choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
                  },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.cover_details,
                          expression: "cover_details"
                        }
                      ],
                      attrs: {
                        type: "radio",
                        id: "me-spouse",
                        value: "me-spouse"
                      },
                      domProps: {
                        checked: _vm._q(_vm.cover_details, "me-spouse")
                      },
                      on: {
                        change: function($event) {
                          _vm.cover_details = "me-spouse"
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c(
                      "label",
                      {
                        staticClass: "choose-type",
                        class: _vm.checkif1selected,
                        attrs: { for: "me-spouse" }
                      },
                      [
                        _c("div", { staticClass: "icon-svg" }, [
                          _c(
                            "svg",
                            {
                              staticClass: "inline-flex",
                              attrs: {
                                width: "56",
                                height: "56",
                                xmlns: "http://www.w3.org/2000/svg",
                                fill: "none",
                                viewBox: "0 0 24 24",
                                stroke: "currentColor"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "stroke-linecap": "round",
                                  "stroke-linejoin": "round",
                                  "stroke-width": "2",
                                  d:
                                    "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                }
                              })
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "domestic-text" }, [
                          _vm._v("Me or My Spouse")
                        ])
                      ]
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
                  },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.cover_details,
                          expression: "cover_details"
                        }
                      ],
                      attrs: { type: "radio", id: "family", value: "family" },
                      domProps: {
                        checked: _vm._q(_vm.cover_details, "family")
                      },
                      on: {
                        change: function($event) {
                          _vm.cover_details = "family"
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c(
                      "label",
                      {
                        staticClass: "choose-type",
                        class: _vm.checkif2selected,
                        attrs: { for: "family" }
                      },
                      [
                        _c("div", { staticClass: "icon-svg" }, [
                          _c(
                            "svg",
                            {
                              staticClass: "inline-flex",
                              attrs: {
                                width: "56",
                                height: "56",
                                xmlns: "http://www.w3.org/2000/svg",
                                fill: "none",
                                viewBox: "0 0 24 24",
                                stroke: "currentColor"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "stroke-linecap": "round",
                                  "stroke-linejoin": "round",
                                  "stroke-width": "2",
                                  d:
                                    "M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                }
                              })
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "domestic-text" }, [
                          _vm._v("Family")
                        ])
                      ]
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
                  },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.cover_details,
                          expression: "cover_details"
                        }
                      ],
                      attrs: {
                        type: "radio",
                        id: "me-spouse-children",
                        value: "me-spouse-children"
                      },
                      domProps: {
                        checked: _vm._q(_vm.cover_details, "me-spouse-children")
                      },
                      on: {
                        change: function($event) {
                          _vm.cover_details = "me-spouse-children"
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c(
                      "label",
                      {
                        staticClass: "choose-type",
                        class: _vm.checkif3selected,
                        attrs: { for: "me-spouse-children" }
                      },
                      [
                        _c("div", { staticClass: "icon-svg" }, [
                          _c(
                            "svg",
                            {
                              staticClass: "inline-flex",
                              attrs: {
                                width: "56",
                                height: "56",
                                xmlns: "http://www.w3.org/2000/svg",
                                fill: "none",
                                viewBox: "0 0 24 24",
                                stroke: "currentColor"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "stroke-linecap": "round",
                                  "stroke-linejoin": "round",
                                  "stroke-width": "2",
                                  d:
                                    "M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                }
                              })
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "domestic-text" }, [
                          _vm._v("Me/Spouse + Children")
                        ])
                      ]
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "choose-boxes my-3 px-3 w-1/2 overflow-hidden sm:my-4 sm:px-4 sm:w-1/2 md:my-4 md:px-4 md:w-1/2 lg:my-5 lg:px-5 lg:w-1/4 xl:my-5 xl:px-5 xl:w-1/4"
                  },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.cover_details,
                          expression: "cover_details"
                        }
                      ],
                      attrs: { type: "radio", id: "couple", value: "couple" },
                      domProps: {
                        checked: _vm._q(_vm.cover_details, "couple")
                      },
                      on: {
                        change: function($event) {
                          _vm.cover_details = "couple"
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c(
                      "label",
                      {
                        staticClass: "choose-type",
                        class: _vm.checkif4selected,
                        attrs: { for: "couple" }
                      },
                      [
                        _c("div", { staticClass: "icon-svg" }, [
                          _c(
                            "svg",
                            {
                              staticClass: "inline-flex",
                              attrs: {
                                width: "56",
                                height: "56",
                                xmlns: "http://www.w3.org/2000/svg",
                                fill: "none",
                                viewBox: "0 0 24 24",
                                stroke: "currentColor"
                              }
                            },
                            [
                              _c("path", {
                                attrs: {
                                  "stroke-linecap": "round",
                                  "stroke-linejoin": "round",
                                  "stroke-width": "2",
                                  d:
                                    "M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                }
                              })
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "domestic-text" }, [
                          _vm._v("Couple")
                        ])
                      ]
                    )
                  ]
                )
              ]
            )
          ]),
          _vm._v(" "),
          (_vm.cover_details === "family") |
          (_vm.cover_details === "me-spouse-children")
            ? _c(
                "div",
                {
                  staticClass: "col-sm-6",
                  staticStyle: { transition: "all .3s ease-out" }
                },
                [
                  _c("div", { staticClass: "card" }, [
                    _c("div", { staticClass: "card-header" }, [
                      _vm._v(
                        "\n            How Many Children do you want to cover?\n          "
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "card-body" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c("b-form-group", {
                            attrs: { size: "xl" },
                            scopedSlots: _vm._u(
                              [
                                {
                                  key: "default",
                                  fn: function(ref) {
                                    var ariaDescribedby = ref.ariaDescribedby
                                    return [
                                      _c(
                                        "b-form-radio",
                                        {
                                          attrs: {
                                            "aria-describedby": ariaDescribedby,
                                            name: "chilren",
                                            value: "1"
                                          },
                                          model: {
                                            value: _vm.no_children,
                                            callback: function($$v) {
                                              _vm.no_children = $$v
                                            },
                                            expression: "no_children"
                                          }
                                        },
                                        [_vm._v("A Child")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-radio",
                                        {
                                          attrs: {
                                            "aria-describedby": ariaDescribedby,
                                            name: "chilren",
                                            value: "2"
                                          },
                                          model: {
                                            value: _vm.no_children,
                                            callback: function($$v) {
                                              _vm.no_children = $$v
                                            },
                                            expression: "no_children"
                                          }
                                        },
                                        [_vm._v("2 Children")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-radio",
                                        {
                                          attrs: {
                                            "aria-describedby": ariaDescribedby,
                                            name: "chilren",
                                            value: "3"
                                          },
                                          model: {
                                            value: _vm.no_children,
                                            callback: function($$v) {
                                              _vm.no_children = $$v
                                            },
                                            expression: "no_children"
                                          }
                                        },
                                        [_vm._v("3 Children")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-radio",
                                        {
                                          attrs: {
                                            "aria-describedby": ariaDescribedby,
                                            name: "chilren",
                                            value: "4"
                                          },
                                          model: {
                                            value: _vm.no_children,
                                            callback: function($$v) {
                                              _vm.no_children = $$v
                                            },
                                            expression: "no_children"
                                          }
                                        },
                                        [_vm._v("4 Children")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-radio",
                                        {
                                          attrs: {
                                            "aria-describedby": ariaDescribedby,
                                            name: "chilren",
                                            value: "5"
                                          },
                                          model: {
                                            value: _vm.no_children,
                                            callback: function($$v) {
                                              _vm.no_children = $$v
                                            },
                                            expression: "no_children"
                                          }
                                        },
                                        [_vm._v("5 Children")]
                                      ),
                                      _vm._v(" "),
                                      _vm.cover_details === "me-spouse-children"
                                        ? _c(
                                            "b-form-radio",
                                            {
                                              attrs: {
                                                "aria-describedby": ariaDescribedby,
                                                name: "chilren",
                                                value: "6"
                                              },
                                              model: {
                                                value: _vm.no_children,
                                                callback: function($$v) {
                                                  _vm.no_children = $$v
                                                },
                                                expression: "no_children"
                                              }
                                            },
                                            [_vm._v("6 Children")]
                                          )
                                        : _vm._e()
                                    ]
                                  }
                                }
                              ],
                              null,
                              false,
                              3136743610
                            )
                          })
                        ],
                        1
                      )
                    ])
                  ])
                ]
              )
            : _vm._e()
        ])
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
                    attrs: { disabled: _vm.checkcoverset },
                    on: { click: _vm.gethealthquotes }
                  },
                  [_vm._v("\n            Compare Quotes\n          ")]
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

/***/ "./platform/themes/insulink/assets/js/components/health/CoverDetails.vue":
/*!*******************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/CoverDetails.vue ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CoverDetails_vue_vue_type_template_id_3a5ae206_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true& */ "./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true&");
/* harmony import */ var _CoverDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CoverDetails.vue?vue&type=script&lang=js& */ "./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CoverDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CoverDetails_vue_vue_type_template_id_3a5ae206_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CoverDetails_vue_vue_type_template_id_3a5ae206_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "3a5ae206",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "platform/themes/insulink/assets/js/components/health/CoverDetails.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CoverDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./CoverDetails.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CoverDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true&":
/*!**************************************************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true& ***!
  \**************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CoverDetails_vue_vue_type_template_id_3a5ae206_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/CoverDetails.vue?vue&type=template&id=3a5ae206&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CoverDetails_vue_vue_type_template_id_3a5ae206_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CoverDetails_vue_vue_type_template_id_3a5ae206_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);