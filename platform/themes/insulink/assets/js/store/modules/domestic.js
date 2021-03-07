import Vue from "vue";
import axios from "axios";

//Default State
const state = () => ({
    homeData: {
        types: {
            typeProduct: "",
        },
        quotations: {
            cover_type: "",
            content_value: "",
            furniture: "",
            occupiers_liabity: "",
            owners_liabity:"",
            phones_laptops: "",
            personal_accident_add: "",
            personal_accident: "",
            what_to_insure:"",
            building_value:"",
            wiba:"",
            wiba_servants_indoor:"",
            wiba_servants_outdoor:"",
            products: {}
        },
        product: {
            productID: "",
            basicpremium: "",
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
            }
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
            policy_start_date: "",
        },
        purchased: {
            premiumwithorwithoutbenefits: "",
            quotation_number: "",
            quotation_id: ""
        },
        propertyLocation: {
            name: ""
        }
    }
});
//getters
const getters = {
    domesticinsurance: state => state.homeData,
    typeofProduct: state => state.homeData.types,
    homeProduct: state => state.homeData.product,
    getcustomer: state => state.homeData.customer,
    getpurchased: state => state.homeData.purchased,
    getquotations: state => state.homeData.quotations,
    location: state => state.homeData.propertyLocation,
    purchaseDomestic: state => state.homeData.purchase
};
//actions
const actions = {
    getcustomertype({ commit, getters }, homeinsurance) {
        let homeData = getters.typeofProduct;
        homeData.typeProduct = homeinsurance;
        commit("setTypeofProduct", homeData);
    },
    async CreatedomesticCustomer({ commit, getters }, payload) {
        const response = await axios.post(
            "/purchase/customer/details/saved/domestic",
            payload
        );
        console.log(response);
        commit("setCustomerData", response.data);
    },
    getpropertylocation({ commit, getters }, location) {
        let homeData = getters.location;
        homeData.name = location;
        commit("setLocation", homeData);
    },
    async DomesticQuote({ commit, getters }, payload) {
        const response = await axios.get(`/quotations/domestic/generate/${payload.content_value}/${payload.cover_type}/${payload.product_type}/${payload.furniture}/${payload.phones_laptops}/${payload.personal_accident}/${payload.occupiers_liabity}/${payload.owners_liabity}/${payload.building_value}/${payload.what_to_insure}/${payload.wiba_servants_indoor}/${payload.wiba_servants_outdoor}`);
        console.log(response);
        console.log(payload);
        let homeData = getters.getquotations;
        homeData.cover_type = response.data.cover_type;
        homeData.products = response.data.products;
        homeData.content_value = payload.content_value;
        homeData.furniture = payload.furniture;
        homeData.occupiers_liabity = payload.occupiers_liabity;
        homeData.owners_liabity = payload.owners_liabity;
        homeData.phones_laptops = payload.phones_laptops;
        homeData.personal_accident = payload.personal_accident;
        homeData.personal_accident_add = payload.personal_accident_add;
        homeData.products = response.data.products;
        homeData.what_to_insure = payload.what_to_insure;
        homeData.wiba= payload.wiba;
        homeData.wiba_servants_indoor= payload.wiba_servants_indoor;
        homeData.wiba_servants_outdoor = payload.wiba_servants_outdoor;
        homeData.building_value = payload.building_value;
        commit("SetDomesticQuote", homeData);
        
    },
    makeDomesticPayment(payload) {
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
    async buyDomesticproduct({ commit, getters }, megapayload) {
        const response = await axios.get(
            `/purchase/domestic/initiate/${megapayload.data.productID}`
        );
        console.log(megapayload);
        let homeData = getters.homeProduct;
        homeData.productID = megapayload.data.productID;
        homeData.basicpremium = megapayload.data.basicpremium.premium;
        homeData.category = response.data.productPurchase.category;
        homeData.name = response.data.productPurchase.name;
        homeData.cover_type = response.data.productPurchase.cover_type;
        homeData.underwriter.company =
            response.data.productPurchase.underwriters.company;
        homeData.underwriter.logo =
            response.data.productPurchase.underwriters.logo;
        homeData.underwriter.payments.paybill =
            response.data.paybill.paymentmethod.paybill;
        homeData.underwriter.payments.method =
            response.data.paybill.paymentmethod.method;
        homeData.underwriter.payments.account_number =
            response.data.paybill.paymentmethod.account_number;
        homeData.underwriter.payments.account_name =
            response.data.paybill.paymentmethod.account_name;
        homeData.underwriter.payments.branch_code =
            response.data.paybill.paymentmethod.branch_code;
        homeData.underwriter.payments.paypalemail =
            response.data.paybill.paymentmethod.paypalemail;
        commit("SetBuyPurchase", homeData);
        return new Promise((resolve, reject) => {
            axios.post("/purchase/quotation/new/domestic", megapayload).then(
                response => {
                    let QuotationData = getters.getpurchased;
                    QuotationData.premiumwithorwithoutbenefits =
                        megapayload.data.total;
                    QuotationData.quotation_number =
                        response.data.quotation_number;
                    QuotationData.quotation_id = response.data.quotation_id;
                    commit("SetDomesticpurchase", QuotationData);
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    }
};
//mutations
const mutations = {
    setTypeofProduct: (state, value) => (state.homeData.types = value),
    setDomestic: (state, value) => (state.homeData = value),
    SetDomesticQuote: (state, data) => (state.homeData.quotations = data),
    SetDomesticpurchase: (state, data) => (state.homeData.purchased = data),
    setLocation: (state, data) => (state.homeData.propertyLocation = data),
    SetBuyPurchase: (state, data) => (state.homeData.product = data)
};

export default {
    state,
    getters,
    actions,
    mutations
};
