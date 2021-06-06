import Vue from "vue";

import axios from "axios";
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

//Numeral
import numeral from 'numeral'

//Moment js
import moment from 'moment'
window.moment = moment;
//Default State
const state = () => ({
    activatePagination: false,
    //Value for showing rare models form
    otherVehicles: false,
    vehicleData: {
        v_business: "",
        cover_type: "",
        v_make: "",
        v_model: "",
        v_manufacture: "",
        v_value: "",
        is_fleet: false,
        veh_value: "",
        veh_basic_premium: 0,
        veh_net_rate: 0,
        veh_training_levy: 0,
        veh_phf: 0,
        veh_stamp_duty: 40,
        veh_road_rescue: 0,
        veh_total: 0,
        veh_applicable_rate: 0,
        veh_premium: 25000,
        veh_min_premium: 25000,
        motorPrivate: {},
        motorThirdparty: {},
        motorcommercialowngoods:{},
        motoronlinepsv:{},
        motorgeneralcartage:{},
        veh_type: {
            make_model: ""
        },
        purchase: {
            productID: "",
            quotation_number: "",
            quotation_id: "",
            product: {
                name: "",
                category: "",
                cover_type: "",
                underwriter: {
                    company: "",
                    logo: "",
                    payments: {
                        paybill: "",
                        method: "",
                        account_number: "",
                        account_name: "",
                        branch_code: "",
                        paypalemail: ""
                    }
                },
                rates: {
                    medical_expense: "",
                    loss_use: "",
                    tppd: "",
                    windscreen: "",
                    road_rescue: "",
                    political_terrorism: "",
                    excess_protector: "",
                    entertainment: "",
                    authorised_repair: "",
                    towing_recovery: "",
                    emergency: "",
                    tppd_3rdparty:"",
                    passenger_legal_liability:"",
                    medical:"",
                    repairs:"",
                    third_party_body:"",
                    towing:""
                }
            },
            basicpremium: "",
            premiumwithorwithoutbenefits: "",
            benefits: {
                pvt: 0,
                loss_use: 0,
                excess_protector: 0,
                road_rescue: 0
            },
            customer: {
                name: "",
                transactioncode: "",
                tnl: false,
                email: "",
                phone: "",
                document_type: "",
                document_number: "",
                copy_id: null,
                kra_pin: "",
                copy_kra_certificate: null,
                policy_start_date: new Date(),
                motorvehicle: {
                    registration: "",
                    chassis: "",
                    engine: "",
                    cc: "",
                    seat_capacity: "",
                    logbook: null
                }
            }
        }
    },

    vMakes: {},
    vModels: {},
    vYears: {}
});

//getters
const getters = {
    activatePagination: state => state.activatePagination,
    vehicle: state => state.vehicleData,
    customer: state => state.vehicleData.purchase.customer,
    motorvehicle: state => state.vehicleData.purchase.customer.motorvehicle,
    getMotorPrivateQuote: state => state.vehicleData.motorPrivate,
    getMotorThirdpartyQuote: state => state.vehicleData.motorThirdparty,
    getMotorCommercialowngoodsQuote: state => state.vehicleData.motorcommercialowngoods,
    getMotorCommercialonlinepsvQuote: state => state.vehicleData.motoronlinepsv,
    getMotorCommercialgeneralcartageQuote: state => state.vehicleData.motorgeneralcartage,
    getBuypurchase: state => state.vehicleData.purchase,
    getbenefit: state => state.vehicleData.purchase.benefits,
    vehicleveh_type: state => state.vehicleData.veh_type,
    getvMakes(state) {
        return state.vMakes;
    },
    getvYears(state) {
        return state.vYears;
    },
    getvModels(state) {
        return state.vModels;
    }
};
//actions
const actions = {
    //Show pagination
    showPagination({ commit }) {
        commit("showPaginationAction", true);
    },
    //Hide pagination
    hidePagination({ commit }) {
        commit("hidePaginationAction", false);
    },
    async allVehicleMakes({ commit }) {
        const response = await axios.get("/ajax/vehiclemakes");
        commit("SetVehicleMakes", response.data.vehiclemakes);
    },
    async MotorcommercialfleetQuote({ commit, getters }, formdata) {
        console.log(formdata);
        return new Promise((resolve, reject) => {
            axios.post("/purchase/commercial/quote/request", formdata).then(
                response => {
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    },
    async MotorPrivateQuote({ commit, getters }, payload) {
        const response = await axios.get(
            `/quotations/motor/generate/${payload.v_business}/${payload.cover_type}/${payload.v_value}/${payload.v_make}/${payload.v_model}/${payload.v_manufacture}`
        );
        commit("SetMotorPrivateQuote", response.data);
        let vehicleData = getters.vehicle;

        vehicleData.v_business = payload.v_business;
        vehicleData.cover_type = payload.cover_type;
        vehicleData.v_make = payload.v_make;
        vehicleData.v_model = payload.v_model;
        vehicleData.v_manufacture = payload.v_manufacture;
        vehicleData.v_value = payload.v_value;
        vehicleData.motorPrivate = response.data;

        //Update Calculations
        commit("setVehicleData", vehicleData);

        let makedata = getters.vehicleveh_type;
        var vstr1 = response.data.vehicletype.makes.name;
        var vstr2 = response.data.vehicletype.code;
        makedata.make_model = vstr1.concat(" ", vstr2);
        commit("setvehicletype", makedata);
    },
    async motorThridpartyQuote({ commit, getters }, payload) {
        const response = await axios.get(
            `/quotations/motor/generate/${payload.v_business}/${payload.cover_type}/${payload.v_value}/${payload.v_make}/${payload.v_model}/${payload.v_manufacture}`
        );
        commit("SetMotorThirdpQuote", response.data);
        let vehicleData = getters.vehicle;

        vehicleData.v_business = payload.v_business;
        vehicleData.cover_type = payload.cover_type;
        vehicleData.v_make = payload.v_make;
        vehicleData.v_model = payload.v_model;
        vehicleData.v_manufacture = payload.v_manufacture;
        vehicleData.v_value = payload.v_value;
        vehicleData.motorThirdparty = response.data;

        //Update Calculations
        commit("setVehicleData", vehicleData);

        let makedata = getters.vehicleveh_type;
        var vstr1 = response.data.vehicletype.makes.name;
        var vstr2 = response.data.vehicletype.code;
        makedata.make_model = vstr1.concat(" ", vstr2);
        commit("setvehicletype", makedata);
    },
    async motorcommercialowngoods({ commit, getters }, payload) {
        const response = await axios.get(
            `/quotations/motor/generate/${payload.v_business}/${payload.cover_type}/${payload.v_value}/${payload.v_make}/${payload.v_model}/${payload.v_manufacture}`
        );
        commit("SetMotorCommercialOwngoodsQuote", response.data);
        let vehicleData = getters.vehicle;

        vehicleData.v_business = payload.v_business;
        vehicleData.cover_type = payload.cover_type;
        vehicleData.v_make = payload.v_make;
        vehicleData.v_model = payload.v_model;
        vehicleData.v_manufacture = payload.v_manufacture;
        vehicleData.v_value = payload.v_value;
        vehicleData.motorcommercialowngoods = response.data;

        //Update Calculations
        commit("setVehicleData", vehicleData);

        let makedata = getters.vehicleveh_type;
        var vstr1 = response.data.vehicletype.makes.name;
        var vstr2 = response.data.vehicletype.code;
        makedata.make_model = vstr1.concat(" ", vstr2);
        commit("setvehicletype", makedata);
    },
    async motorcommercialgencartage({ commit, getters }, payload) {
        const response = await axios.get(
            `/quotations/motor/generate/${payload.v_business}/${payload.cover_type}/${payload.v_value}/${payload.v_make}/${payload.v_model}/${payload.v_manufacture}`
        );
        commit("SetMotorCommercialGenCartageQuote", response.data);
        let vehicleData = getters.vehicle;

        vehicleData.v_business = payload.v_business;
        vehicleData.cover_type = payload.cover_type;
        vehicleData.v_make = payload.v_make;
        vehicleData.v_model = payload.v_model;
        vehicleData.v_manufacture = payload.v_manufacture;
        vehicleData.v_value = payload.v_value;
        vehicleData.motorgeneralcartage = response.data;

        //Update Calculations
        commit("setVehicleData", vehicleData);

        let makedata = getters.vehicleveh_type;
        var vstr1 = response.data.vehicletype.makes.name;
        var vstr2 = response.data.vehicletype.code;
        makedata.make_model = vstr1.concat(" ", vstr2);
        commit("setvehicletype", makedata);
    },
    async motorcommercialonlinepsv({ commit, getters }, payload) {
        const response = await axios.get(
            `/quotations/motor/generate/${payload.v_business}/${payload.cover_type}/${payload.v_value}/${payload.v_make}/${payload.v_model}/${payload.v_manufacture}`
        );
        commit("SetMotorCommercialOnlinePsvQuote", response.data);
        let vehicleData = getters.vehicle;

        vehicleData.v_business = payload.v_business;
        vehicleData.cover_type = payload.cover_type;
        vehicleData.v_make = payload.v_make;
        vehicleData.v_model = payload.v_model;
        vehicleData.v_manufacture = payload.v_manufacture;
        vehicleData.v_value = payload.v_value;
        vehicleData.motoronlinepsv = response.data;

        //Update Calculations
        commit("setVehicleData", vehicleData);

        let makedata = getters.vehicleveh_type;
        var vstr1 = response.data.vehicletype.makes.name;
        var vstr2 = response.data.vehicletype.code;
        makedata.make_model = vstr1.concat(" ", vstr2);
        commit("setvehicletype", makedata);
    },
    CreateCustomer({ commit, getters }, payload) {
        return new Promise((resolve, reject) => {
            axios.post("/purchase/customer/details/saved", payload).then(
                response => {
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    },
    async buyMotorprivateproduct({ commit, getters }, payload) {
        const response = await axios.get(
            `/purchase/motor/private/initiate/${payload.productID}`
        );

        let productData = getters.getBuypurchase;
        productData.productID = payload.productID;
        productData.name = response.data.productPurchase.name;
        productData.category = response.data.productPurchase.category;
        productData.cover_type = response.data.productPurchase.cover_type;
        productData.basicpremium = payload.basicpremium.premium;
        productData.product.underwriter.company =
            response.data.productPurchase.underwriters.company;
        productData.product.underwriter.logo =
            response.data.productPurchase.underwriters.logo;
        productData.product.underwriter.payments.paybill =
            response.data.paybill.paymentmethod.paybill;
        productData.product.underwriter.payments.method =
            response.data.paybill.paymentmethod.method;
        productData.product.underwriter.payments.account_number =
            response.data.paybill.paymentmethod.account_number;
        productData.product.underwriter.payments.account_name =
            response.data.paybill.paymentmethod.account_name;
        productData.product.underwriter.payments.branch_code =
            response.data.paybill.paymentmethod.branch_code;
        productData.product.underwriter.payments.paypalemail =
            response.data.paybill.paymentmethod.paypalemail;
        productData.product.rates.medical_expense =
            response.data.productPurchase.motorprivaterates.medical_expense;
        productData.product.rates.loss_use =
            response.data.productPurchase.motorprivaterates.loss_use;
        productData.product.rates.tppd =
            response.data.productPurchase.motorprivaterates.tppd;
        productData.product.rates.windscreen =
            response.data.productPurchase.motorprivaterates.windscreen;
        productData.product.rates.road_rescue =
            response.data.productPurchase.motorprivaterates.road_rescue;
        productData.product.rates.political_terrorism =
            response.data.productPurchase.motorprivaterates.political_terrorism;
        productData.product.rates.excess_protector =
            response.data.productPurchase.motorprivaterates.excess_protector;
        productData.product.rates.entertainment =
            response.data.productPurchase.motorprivaterates.entertainment;
        productData.product.rates.towing_recovery =
            response.data.productPurchase.motorprivaterates.towing_recovery;
        productData.product.rates.authorised_repair =
            response.data.productPurchase.motorprivaterates.authorised_repair;
        productData.product.rates.emergency =
            response.data.productPurchase.motorprivaterates.authorised_repair;
        productData.product.rates.passenger_legal_liability =
            response.data.productPurchase.motorprivaterates.authorised_repair;
        productData.product.rates.tppd_3rdparty =
            response.data.productPurchase.motorprivaterates.authorised_repair;
        commit("SetBuyPurchase", productData);
    },
    async buyMotorthirdpartyproduct({ commit, getters }, payload) {
        const response = await axios.get(
            `/purchase/motor/3rdparty/initiate/${payload.productID}`
        );

        let productData = getters.getBuypurchase;
        productData.productID = payload.productID;
        productData.name = response.data.productPurchase.name;
        productData.category = response.data.productPurchase.category;
        productData.cover_type = response.data.productPurchase.cover_type;
        productData.basicpremium = payload.basicpremium.premium;
        productData.product.underwriter.company =
            response.data.productPurchase.underwriters.company;
        productData.product.underwriter.logo =
            response.data.productPurchase.underwriters.logo;
        productData.product.underwriter.payments.paybill =
            response.data.paybill.paymentmethod.paybill;
        productData.product.underwriter.payments.method =
            response.data.paybill.paymentmethod.method;
        productData.product.underwriter.payments.account_number =
            response.data.paybill.paymentmethod.account_number;
        productData.product.underwriter.payments.account_name =
            response.data.paybill.paymentmethod.account_name;
        productData.product.underwriter.payments.branch_code =
            response.data.paybill.paymentmethod.branch_code;
        productData.product.underwriter.payments.paypalemail =
            response.data.paybill.paymentmethod.paypalemail;

        productData.product.rates.emergency =
            response.data.productPurchase.thirdparty.emergency;
        productData.product.rates.passenger_legal_liability =
            response.data.productPurchase.thirdparty.passenger_legal_liability;
        productData.product.rates.tppd_3rdparty =
            response.data.productPurchase.thirdparty.tppd_3rdparty;
        commit("SetBuyPurchase", productData);
    },
    async buyMotorcommercialowngoodsproduct({ commit, getters }, payload) {
        const response = await axios.get(
            `/purchase/motor/owngoodscommercial/initiate/${payload.productID}`
        );

        let productData = getters.getBuypurchase;
        productData.productID = payload.productID;
        productData.name = response.data.productPurchase.name;
        productData.category = response.data.productPurchase.category;
        productData.cover_type = response.data.productPurchase.cover_type;
        productData.basicpremium = payload.basicpremium.premium;
        productData.product.underwriter.company =
            response.data.productPurchase.underwriters.company;
        productData.product.underwriter.logo =
            response.data.productPurchase.underwriters.logo;
        productData.product.underwriter.payments.paybill =
            response.data.paybill.paymentmethod.paybill;
        productData.product.underwriter.payments.method =
            response.data.paybill.paymentmethod.method;
        productData.product.underwriter.payments.account_number =
            response.data.paybill.paymentmethod.account_number;
        productData.product.underwriter.payments.account_name =
            response.data.paybill.paymentmethod.account_name;
        productData.product.underwriter.payments.branch_code =
            response.data.paybill.paymentmethod.branch_code;
        productData.product.underwriter.payments.paypalemail =
            response.data.paybill.paymentmethod.paypalemail;

        productData.product.rates.medical =
            response.data.productPurchase.commercialowngoods.medical;
        productData.product.rates.passenger_legal_liability =
            response.data.productPurchase.commercialowngoods.passenger_legal_liability;
        productData.product.rates.entertainment =
            response.data.productPurchase.commercialowngoods.entertainment;
        productData.product.rates.repairs =
            response.data.productPurchase.commercialowngoods.repairs;
        productData.product.rates.third_party_body =
            response.data.productPurchase.commercialowngoods.third_party_body;
        productData.product.rates.towing =
            response.data.productPurchase.commercialowngoods.towing;
        productData.product.rates.tppd =
            response.data.productPurchase.commercialowngoods.tppd;
        productData.product.rates.windscreen =
            response.data.productPurchase.commercialowngoods.windscreen;
        commit("SetBuyPurchase", productData);
    },
    async buyMotorcommercialonlinepsvproduct({ commit, getters }, payload) {
        const response = await axios.get(
            `/purchase/motor/onlinecommercial/initiate/${payload.productID}`
        );

        let productData = getters.getBuypurchase;
        productData.productID = payload.productID;
        productData.name = response.data.productPurchase.name;
        productData.category = response.data.productPurchase.category;
        productData.cover_type = response.data.productPurchase.cover_type;
        productData.basicpremium = payload.basicpremium.premium;
        productData.product.underwriter.company =
            response.data.productPurchase.underwriters.company;
        productData.product.underwriter.logo =
            response.data.productPurchase.underwriters.logo;
        productData.product.underwriter.payments.paybill =
            response.data.paybill.paymentmethod.paybill;
        productData.product.underwriter.payments.method =
            response.data.paybill.paymentmethod.method;
        productData.product.underwriter.payments.account_number =
            response.data.paybill.paymentmethod.account_number;
        productData.product.underwriter.payments.account_name =
            response.data.paybill.paymentmethod.account_name;
        productData.product.underwriter.payments.branch_code =
            response.data.paybill.paymentmethod.branch_code;
        productData.product.underwriter.payments.paypalemail =
            response.data.paybill.paymentmethod.paypalemail;

        productData.product.rates.medical = response.data.productPurchase.commercialonline.medical;
        productData.product.rates.passenger_legal_liability = response.data.productPurchase.commercialonline.passenger_legal_liability;
        productData.product.rates.tppd = response.data.productPurchase.commercialonline.tppd;
        commit("SetBuyPurchase", productData);
    },
    async buyMotorcommercialogeneralcartageproduct({ commit, getters }, payload) {
        return new Promise((resolve, reject) => {
            axios.get(`/purchase/motor/cartagecommercial/initiate/${payload.productID}`)
                .then((response) => {
                    let productData = getters.getBuypurchase;
                    productData.productID = payload.productID;
                    productData.name = response.data.productPurchase.name;
                    productData.category = response.data.productPurchase.category;
                    productData.cover_type = response.data.productPurchase.cover_type;
                    productData.basicpremium = payload.basicpremium.premium;
                    productData.product.underwriter.company = response.data.productPurchase.underwriters.company;
                    productData.product.underwriter.logo = response.data.productPurchase.underwriters.logo;
                    productData.product.underwriter.payments.paybill = response.data.paybill.paymentmethod.paybill;
                    productData.product.underwriter.payments.method = response.data.paybill.paymentmethod.method;
                    productData.product.underwriter.payments.account_number = response.data.paybill.paymentmethod.account_number;
                    productData.product.underwriter.payments.account_name = response.data.paybill.paymentmethod.account_name;
                    productData.product.underwriter.payments.branch_code = response.data.paybill.paymentmethod.branch_code;
                    productData.product.underwriter.payments.paypalemail = response.data.paybill.paymentmethod.paypalemail;

                    productData.product.rates.medical = response.data.productPurchase.generalcartages.medical;
                    productData.product.rates.passenger_legal_liability = response.data.productPurchase.generalcartages.passenger_legal_liability;
                    productData.product.rates.entertainment = response.data.productPurchase.generalcartages.entertainment;
                    productData.product.rates.repairs = response.data.productPurchase.generalcartages.repairs;
                    productData.product.rates.third_party_body = response.data.productPurchase.generalcartages.third_party_body;
                    productData.product.rates.towing = response.data.productPurchase.generalcartages.towing;
                    productData.product.rates.tppd = response.data.productPurchase.generalcartages.tppd;
                    productData.product.rates.windscreen = response.data.productPurchase.generalcartages.windscreen;
                    commit("SetBuyPurchase", productData);
                    resolve(response);
                    },
                    error => {
                        reject(error);
                    }
                );
        });

        
    },
    makePayment({ commit, getters }, payload) {
        return new Promise((resolve, reject) => {
            axios.post("/purchase/payments/pay", payload).then(
                response => {
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    },
    motorPrivateCheckout({ commit, getters }, payload) {
        return new Promise((resolve, reject) => {
            axios.post("/purchase/quotation/new/motor", payload).then(
                response => {
                    let vehicleData = getters.vehicle;
                    vehicleData.purchase.benefits.pvt = payload.pvt;
                    vehicleData.purchase.premiumwithorwithoutbenefits =
                        payload.total;
                    vehicleData.purchase.benefits.loss_use = payload.loss_use;
                    vehicleData.purchase.benefits.excess_protector =
                        payload.excess_protector;
                    vehicleData.purchase.benefits.road_rescue =
                        payload.road_rescue;
                    vehicleData.purchase.quotation_number =
                        response.data.quotation_number;
                    vehicleData.purchase.quotation_id =
                        response.data.quotation_id;
                    commit("setVehicleData", vehicleData);
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    },
    getVehicleModel({ commit }, payload) {
        return new Promise((resolve, reject) => {
            axios.get(`/ajax/vehiclemodels/${payload}`).then(
                response => {
                    commit("SetVehicleModel", response.data);
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    },
    async YearManufacture({ commit }) {
        const response = await axios.get("/ajax/years");
        commit("SetYearManufacture", response.data.years);
    }
};
//mutations 
const mutations = {
    showPaginationAction: (state, value) => (state.activatePagination = value),
    hidePaginationAction: (state, value) => (state.activatePagination = value),
    setVehicleData: (state, value) => (state.vehicleData = value),
    setCustomerData: (state, value) =>
        (state.vehicleData.purchase.customer = value),
    SetBuyPurchase: (state, value) => (state.vehicleData.purchase = value),
    SetVehicleMakes: (state, data) => (state.vMakes = data),
    SetMotorPrivateQuote: (state, data) => (state.vehicleData.motorPrivate = data),
    SetMotorThirdpQuote: (state, data) => (state.vehicleData.motorThirdparty = data),
    SetMotorCommercialOwngoodsQuote: (state, data) =>
        (state.motorcommercialowngoods = data),
    SetMotorCommercialGenCartageQuote: (state, data) =>
        (state.motorgeneralcartage = data),
    SetMotorCommercialOnlinePsvQuote: (state, data) =>
        (state.motoronlinepsv = data),
    setvehicletype: (state, data) => (state.vehicleData.veh_type = data),
    SetVehicleModel(state, payload) {
        state.vMakes = state.vMakes.map(vehicleModel => {
            if (vehicleModel.id === payload.id) {
                return Object.assign({}, vehicleModel, payload.data);
            }
            return vehicleModel;
        });
    },
    SetYearManufacture: (state, data) => (state.vYears = data)
};

export default {
    state,
    getters,
    actions,
    mutations
};