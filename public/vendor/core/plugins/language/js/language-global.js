/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************************************!*\
  !*** ./platform/plugins/language/resources/assets/js/language-global.js ***!
  \**************************************************************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var LanguageGlobalManagement = /*#__PURE__*/function () {
  function LanguageGlobalManagement() {
    _classCallCheck(this, LanguageGlobalManagement);
  }
  _createClass(LanguageGlobalManagement, [{
    key: "init",
    value: function init() {
      var language_choice_select = $('#post_lang_choice');
      language_choice_select.data('prev', language_choice_select.val());
      language_choice_select.on('change', function (event) {
        $('.change_to_language_text').text($(event.currentTarget).find('option:selected').text());
        $('#confirm-change-language-modal').modal('show');
      });
      $('#confirm-change-language-modal .btn-warning.float-left').on('click', function (event) {
        event.preventDefault();
        language_choice_select.val(language_choice_select.data('prev')).trigger('change');
        $('#confirm-change-language-modal').modal('hide');
      });
      $('#confirm-change-language-button').on('click', function (event) {
        event.preventDefault();
        var _self = $(event.currentTarget);
        var flag_path = $('#language_flag_path').val();
        _self.addClass('button-loading');
        $.ajax({
          url: $('div[data-change-language-route]').data('change-language-route'),
          data: {
            lang_meta_current_language: language_choice_select.val(),
            reference_id: $('#reference_id').val(),
            reference_type: $('#reference_type').val(),
            lang_meta_created_from: $('#lang_meta_created_from').val()
          },
          type: 'POST',
          success: function success(data) {
            $('.active-language').html('<img src="' + flag_path + language_choice_select.find('option:selected').data('flag') + '.svg" width="16" title="' + language_choice_select.find('option:selected').text() + '" alt="' + language_choice_select.find('option:selected').text() + '" />');
            if (!data.error) {
              $('.current_language_text').text(language_choice_select.find('option:selected').text());
              var html = '';
              $.each(data.data, function (index, el) {
                html += '<img src="' + flag_path + el.lang_flag + '.svg" width="16" title="' + el.lang_name + '" alt="' + el.lang_name + '">';
                if (el.reference_id) {
                  html += '<a href="' + $('#route_edit').val() + '"> ' + el.lang_name + ' <i class="fa fa-edit"></i> </a><br />';
                } else {
                  html += '<a href="' + $('#route_create').val() + '?ref_from=' + $('#content_id').val() + '&ref_lang=' + index + '"> ' + el.lang_name + ' <i class="fa fa-plus"></i> </a><br />';
                }
              });
              $('#list-others-language').html(html);
              $('#confirm-change-language-modal').modal('hide');
              language_choice_select.data('prev', language_choice_select.val()).trigger('change');
            }
            _self.removeClass('button-loading');
          },
          error: function error(data) {
            Botble.showError(data.message);
            _self.removeClass('button-loading');
          }
        });
      });
      $(document).on('click', '.change-data-language-item', function (event) {
        event.preventDefault();
        window.location.href = $(event.currentTarget).find('span[data-href]').data('href');
      });
    }
  }]);
  return LanguageGlobalManagement;
}();
;
$(document).ready(function () {
  new LanguageGlobalManagement().init();
  $.ajaxSetup({
    data: {
      'ref_from': $('meta[name="ref_from"]').attr('content'),
      'ref_lang': $('meta[name="ref_lang"]').attr('content')
    }
  });
});
/******/ })()
;