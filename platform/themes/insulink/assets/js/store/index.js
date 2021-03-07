import Vue from "vue";
import Vuex from "vuex";
import motor from "./modules/motor";
import domestic from "./modules/domestic";
import health from "./modules/health";
import kyc from "./modules/kycvalidator";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        motor,
        domestic,
        health,
        kyc
    }
});