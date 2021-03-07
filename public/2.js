(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=script&lang=js& ***!
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

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["healthSwiper", "activateNext", "activateGetQuotes"],
  computed: _objectSpread(_objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(["gethealthquotations", "health"])), {}, {
    quotesfound: function quotesfound() {
      return this.gethealthquotations.products.length;
    },
    HealthQuotes: function HealthQuotes() {
      return this.gethealthquotations.products;
    }
  }),
  methods: {
    buyproduct: function buyproduct(payload) {
      var _this = this;

      Swal.fire({
        title: "Please Wait..",
        text: "We are processing your product, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: function onOpen() {
          Swal.showLoading();
        }
      });
      var megapayload = {
        age: this.health.h_quotations.age_bracket,
        pre_existing: this.health.basic.pre_existing,
        children: this.health.h_quotations.children.no_children,
        ip: this.health.basic.ip,
        dob: this.health.basic.dob,
        data: payload,
        cover_details: this.gethealthquotations.cover_details,
        pre_existing_details: this.health.basic.pre_existing_details
      };
      this.$store.dispatch("buyHealthproduct", megapayload).then(function (response) {
        _this.$notify({
          message: "add Personal Details to complete",
          type: "success",
          duration: 5 * 1000
        });

        _this.healthSwiper.slideTo(3);

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true& ***!
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
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-sm-12" }, [
            _vm.gethealthquotations.cover_details === "me-spouse-children"
              ? _c("div", [
                  _c(
                    "h2",
                    {
                      staticClass:
                        "text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
                    },
                    [
                      _vm._v(
                        "\n            Me or Spouse and Children\n          "
                      )
                    ]
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.gethealthquotations.cover_details === "family"
              ? _c("div", [
                  _c(
                    "h2",
                    {
                      staticClass:
                        "text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
                    },
                    [_vm._v("\n            My Family\n          ")]
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.gethealthquotations.cover_details === "couple"
              ? _c("div", [
                  _c(
                    "h2",
                    {
                      staticClass:
                        "text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
                    },
                    [_vm._v("\n            Me and my Spouse\n          ")]
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.gethealthquotations.cover_details === "me-spouse"
              ? _c("div", [
                  _c(
                    "h2",
                    {
                      staticClass:
                        "text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
                    },
                    [
                      _vm._v(
                        "\n            Just for Me or my Spouse\n          "
                      )
                    ]
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _c(
              "h1",
              {
                staticClass:
                  "text-3xl leading-9 font-black text-orange-900 text-center mb-4"
              },
              [
                _vm._v("\n          Here are the best "),
                _c("strong", [_vm._v(_vm._s(_vm.quotesfound))]),
                _vm._v(" quotes we found\n          for you\n        ")
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "bg-gray-700 p-4 mb-4 text-white" }, [
              _c("div", { staticClass: "grid grid-cols-2 gap-4" }, [
                _c("div", { staticClass: "col-span-1" }, [
                  _c(
                    "h4",
                    {
                      staticClass:
                        "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                    },
                    [
                      _vm._v(
                        "\n                Inpatient Covered kes: " +
                          _vm._s(
                            _vm._f("formatCurrency")(_vm.health.basic.ip)
                          ) +
                          "\n              "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm.health.h_quotations.children.no_children > 1
                    ? _c(
                        "h5",
                        {
                          staticClass:
                            "text-md font-medium text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Children being Covered: " +
                              _vm._s(
                                _vm.health.h_quotations.children.no_children
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _c(
                        "h5",
                        {
                          staticClass:
                            "text-md font-medium text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Children being Covered: none\n              "
                          )
                        ]
                      )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-span-1" }, [
                  _vm.health.basic.age === 1
                    ? _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Age Bracket: 18-30 | Your Date of Birth: " +
                              _vm._s(
                                _vm._f("formartDate")(_vm.health.basic.dob)
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.health.basic.age === 2
                    ? _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Age Bracket: 31-40 | Date of Birth: " +
                              _vm._s(
                                _vm._f("formartDate")(_vm.health.basic.dob)
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.health.basic.age === 3
                    ? _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Age Bracket: 41-50 | Date of Birth: " +
                              _vm._s(
                                _vm._f("formartDate")(_vm.health.basic.dob)
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.health.basic.age === 4
                    ? _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Age Bracket: 51-60 | Date of Birth: " +
                              _vm._s(
                                _vm._f("formartDate")(_vm.health.basic.dob)
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.health.basic.age === 5
                    ? _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Age Bracket: 61-70 | Date of Birth: " +
                              _vm._s(
                                _vm._f("formartDate")(_vm.health.basic.dob)
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.health.basic.age === 6
                    ? _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased mb-4 text-white"
                        },
                        [
                          _vm._v(
                            "\n                Age Bracket: 70 and above | Your Date of Birth:\n                " +
                              _vm._s(
                                _vm._f("formartDate")(_vm.health.basic.dob)
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    : _vm._e()
                ])
              ])
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-sm-12" }, [
            _c(
              "ul",
              { staticClass: "quoteresults" },
              _vm._l(_vm.HealthQuotes, function(payload) {
                return _c("li", { staticClass: "bg-white shadow-md my-2" }, [
                  _c(
                    "h3",
                    {
                      staticClass:
                        "text-xl font-normal text-white bg-orange uppercase antialiased py-2 pl-4 border-b-2 border-gray-200 px-4 mb-3"
                    },
                    [
                      _vm._v(
                        "\n              " +
                          _vm._s(payload.product_name) +
                          " - Underwritten by\n              " +
                          _vm._s(payload.underwriter) +
                          "\n            "
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c("div", { staticClass: "flex" }, [
                    _c("div", { staticClass: "w-1/5 px-2 p-6" }, [
                      _c("img", {
                        staticClass: "h-20 p-3 ml-8 rounded-lg shadow-xs",
                        attrs: {
                          src: "/images/underwriter/" + payload.image,
                          alt: payload.underwriter
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "w-3/5 px-2" }),
                    _vm._v(" "),
                    _c("div", { staticClass: "w-1/5 px-2" }, [
                      _c(
                        "h4",
                        {
                          staticClass:
                            "text-lg font-bold text-gray-700 antialiased"
                        },
                        [_vm._v("\n                  Price\n                ")]
                      ),
                      _vm._v(
                        "\n                Kes: " +
                          _vm._s(
                            _vm._f("formatCurrency")(
                              payload.basicpremium.premium
                            )
                          ) +
                          "\n                "
                      ),
                      _c(
                        "div",
                        { staticClass: "my-2" },
                        [
                          _c(
                            "b-button",
                            {
                              staticClass:
                                "btn-local-primary btns transition-colors duration-200",
                              attrs: { variant: "primary" },
                              on: {
                                click: function($event) {
                                  return _vm.buyproduct(payload)
                                }
                              }
                            },
                            [
                              _c(
                                "svg",
                                {
                                  staticClass: "w-4 h-4 mr-2 text-white",
                                  attrs: {
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
                                        "M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                    }
                                  })
                                ]
                              ),
                              _vm._v(" "),
                              _c("span", [_vm._v("Buy Cover")])
                            ]
                          )
                        ],
                        1
                      )
                    ])
                  ])
                ])
              }),
              0
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

/***/ "./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue":
/*!*******************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _QuoteDetails_vue_vue_type_template_id_1410fa21_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true& */ "./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true&");
/* harmony import */ var _QuoteDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./QuoteDetails.vue?vue&type=script&lang=js& */ "./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _QuoteDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _QuoteDetails_vue_vue_type_template_id_1410fa21_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _QuoteDetails_vue_vue_type_template_id_1410fa21_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1410fa21",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "platform/themes/insulink/assets/js/components/health/QuoteDetails.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_QuoteDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./QuoteDetails.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_QuoteDetails_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true&":
/*!**************************************************************************************************************************!*\
  !*** ./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true& ***!
  \**************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_QuoteDetails_vue_vue_type_template_id_1410fa21_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./platform/themes/insulink/assets/js/components/health/QuoteDetails.vue?vue&type=template&id=1410fa21&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_QuoteDetails_vue_vue_type_template_id_1410fa21_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_QuoteDetails_vue_vue_type_template_id_1410fa21_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);