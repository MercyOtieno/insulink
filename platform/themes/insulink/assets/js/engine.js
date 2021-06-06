/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require("vue");
import store from "./store";
import MotorPrivate from "./components/Motorprivate";
import Domestic from "./components/DomesticInsurance";
import HealthIndividual from "./components/Health-Individual";
import HealthCorporate from "./components/Health-Corporate";
import Travel from "./components/Travel";
import Paccident from "./components/PersonalGroupAccident";
import Claims from "./components/Claims";
import Genform from "./components/GenForm";
import Faq from "./components/FAQ";
import Aboutus from "./components/About";
import Slider from "./components/Slider";
import Element from "element-ui";
import locale from "element-ui/lib/locale/lang/en";
import "element-ui/lib/theme-chalk/index.css";
import VeeValidate from "vee-validate";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueTelInput from "vue-tel-input";
import Vuikit from "vuikit";
import VuikitIcons from "@vuikit/icons";
import VueGmaps from "vue-gmaps";
import { VueReCaptcha } from 'vue-recaptcha-v3'
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserSecret } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

//swiper
import MotorSwiper from 'swiper';
import DomesticSwiper from "swiper";
import HealthSwiper from 'swiper';
import 'swiper/css/swiper.min.css';
import 'swiper/js/swiper.min.js';

window.MotorSwiper = MotorSwiper;
window.DomesticSwiper = DomesticSwiper;
window.HealthSwiper = HealthSwiper;
Vue.use(BootstrapVue, IconsPlugin);
Vue.use(VeeValidate);
Vue.use(VueTelInput); 
Vue.use(Element, { locale });
Vue.use(Vuikit);
Vue.use(VuikitIcons);
Vue.use(VueGmaps, {
    key: "AIzaSyBMNUukcDhKBsgNkPHLqsuaCIVLduXRsUo",
    version: "3"
});
Vue.use(VueReCaptcha, {
    siteKey: '6Le-5qUZAAAAAKY6A0qSuIb7j-2lkslKwCbm47O5',
    loaderOptions: {
      useRecaptchaNet: true
    }
  })
library.add(faUserSecret);

Vue.component("font-awesome-icon", FontAwesomeIcon);
window.axios = require("axios");
import { Form, HasError, AlertError } from "vform";

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
//Numeral
import numeral from 'numeral'

//Sweet alert
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.Toast = Toast;

//Moment js
import moment from 'moment'
//v calendar
import VCalendar from 'v-calendar';
// Use v-calendar & v-date-picker components
Vue.use(VCalendar, {
    popoverAlign: "top",
});

Vue.prototype.moment = moment;

//filters
Vue.filter('upText', function(text) {
    text = String(text).toLowerCase();
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('formatNumber', function(n) {
    return String(n).replace(/(.)(?=(\d{3})+$)/g, '$1,');
});

Vue.filter('formatCurrency', function(n) {
    var number = numeral(n);
    var string = number.format('0,0.00');
    return string;
});

Vue.filter('formartDate', function (date) {
    return moment(date).format("DD/MM/YYYY");
}) 

Vue.filter('getPercentage', function(n) {
    n *= 100;
    return parseFloat(n.toFixed(2));
});

//Capitalise filter
Vue.filter('capitalise', function(phrase) {
    return phrase
        .toLowerCase()
        .split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
});
//Directives
Vue.directive('new-date',
    function(el, binding, vnode) {
        el.value = moment(el.value, 'DD/MM/YYYY').format('YYYY/MM/DD');
    }
);

//Directives
Vue.directive('formatValue', {
    bind: function(el, binding, vnode) {
        var number = numeral(el.value);
        el.value = number.format('0,0.00');
        el.style.color = 'red'
    }
})

//Lodash
import _ from 'lodash';
window._ = _;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * This let us access the `__` method for localization in VueJS templates
 * ({{ __('key') }})
 */
Vue.prototype.__ = (key) => {
    return window.trans[key] !== 'undefined' ? window.trans[key] : key;
};
const app = new Vue({
    el: "#engine",
    store,
    components: {
        Faq,
        Aboutus,
        Slider,
        MotorPrivate,
        Domestic,
        HealthIndividual,
        HealthCorporate,
        Travel,
        Paccident,
        Claims,
        Genform
    }
});
