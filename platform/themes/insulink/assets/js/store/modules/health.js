import Vue from "vue";
import axios from "axios";
const state = () => ({
    productData: {
        underwriters: {
            list: {}
        },
        basic: {
            age: "",
            dob: "",
            ip: "",
            pre_existing: "",
            pre_existing_details:"",
            
        },
        h_quotations: {
            preexisting: "",
            cover_type: "",
            cover_details: "",
            age_bracket: "",
            children: {
                no_children: 0
            },
            products: {}
        },
        h_product: {
            productID: "",
            basicpremium: "",
            name: "",
            brochure: "",
            description: "",
            has_benefits: "",
            levies:"",
            premium:"",
            stamp_duty:"",
            maternity:"",
            dental:"",
            optical:"",
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
        dependants: {
            number: 0,
            any: false,
            spouse: false,
            children: false,
            firstChild: false,
            secondChild: false,
            thirdChild: false,
            fourthChild: false,
            fifthChild: false
        },
        h_customer: {
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
            dependants: [
                {
                    name: "",
                    relationship: "Spouse",
                    dob: new Date("1/1/1995"),
                    active: false
                },
                {
                    name: "",
                    relationship: "Child",
                    dob: new Date("1/1/2004"),
                    active: false
                },
                {
                    name: "",
                    relationship: "Child",
                    dob: new Date("1/1/2004"),
                    active: false
                },
                {
                    name: "",
                    relationship: "Child",
                    dob: new Date("1/1/2004"),
                    active: false
                },
                {
                    name: "",
                    relationship: "Child",
                    dob: new Date("1/1/2004"),
                    active: false
                },
                {
                    name: "",
                    relationship: "Child",
                    dob: new Date("1/1/2004"),
                    active: false
                }
            ]
        },
        h_purchased: {
            premiumwithorwithoutbenefits: "",
            quotation_number: "",
            quotation_id: ""
        }
    }
});
const getters = {
    health: state => state.productData,
    typeofHealthProduct: state => state.productData.basic,
    gethealthquotations: state => state.productData.h_quotations,
    healthProduct: state => state.productData.h_product,
    gethealthcustomer: state => state.productData.h_customer,
    gethealthpurchased: state => state.productData.h_purchased,
    dependants: state => state.productData.dependants,
    fifthChildOption: state => state.productData.fifthChildOption,
    getunderwriters: state => state.productData.underwriters
};
const actions = {
    gethealthcustomertype({ commit, getters }, payload) {
        let productData = getters.typeofHealthProduct;
        productData.age = payload.age;
        productData.dob = payload.dob;
        productData.ip = payload.ip;
        productData.pre_existing = payload.pre_existing;
        productData.pre_existing_details = payload.pre_existing_details;
       
        commit("setTypeofProduct", productData);
    },
    HealthQuote({ commit, getters }, payload) {
        return new Promise((resolve, reject) => {
            axios
                .get(
                    `/quotations/health/individual_family/generate/${payload.ip}/${payload.no_children}/${payload.preexisting}/${payload.dob}/${payload.age}/${payload.cover_type}/${payload.cover_details}/`
                )
                .then(
                    response => {
                        let productData = getters.gethealthquotations;
                        productData.cover_type = response.data.cover_type;
                        productData.products = response.data.products;
                        productData.preexisting = payload.preexisting;
                        productData.age_bracket = response.data.age_bracket;
                        productData.cover_details = payload.cover_details;
                       
                        productData.children.no_children = payload.no_children;
                        commit("SetHealthQuote", productData);
                        resolve(response);
                    },
                    error => {
                        reject(error);
                    }
                );
        });
        
        
    },
    getHealthUnderwriters({commit, getters}) {
        return new Promise((resolve, reject) => {
            axios.get("/ajax/underwriters").then(
                response => {
                    let productData = getters.getunderwriters;
                    productData.list = response.data;
                    commit("SetUnderwriters", productData);
                    resolve(response);
                },
                    error => {
                        reject(error);
                    }
            );
        })
    },
    makeHealthPayment(payload) {
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
    async buyHealthproduct({ commit, getters }, megapayload) {
        const response = await axios.get(
            `/purchase/health/initiate/${megapayload.data.productID}`
        );
        let productData = getters.healthProduct;
        productData.productID = megapayload.data.productID;
        productData.basicpremium = megapayload.data.basicpremium.premium;
        productData.levies = megapayload.data.basicpremium.levies;
        productData.premium = megapayload.data.basicpremium.premium;
        productData.stamp_duty = megapayload.data.basicpremium.stamp_duty;
        productData.category = response.data.productPurchase.category;
        productData.name = response.data.productPurchase.name;
        productData.brochure = response.data.productPurchase.product_brochure;
        productData.description = response.data.productPurchase.product_description;
        productData.has_benefits = response.data.productPurchase.has_benefits;
        productData.maternity = response.data.productPurchase.healthrates.maternity;
        productData.dental = response.data.productPurchase.healthrates.dental;
        productData.optical = response.data.productPurchase.healthrates.optical;
        productData.cover_type = response.data.productPurchase.cover_type;
        productData.underwriter.company = response.data.productPurchase.underwriters.company;
        productData.underwriter.logo = response.data.productPurchase.underwriters.logo;
        productData.underwriter.payments.paybill = response.data.paybill.paymentmethod.paybill;
        productData.underwriter.payments.method = response.data.paybill.paymentmethod.method;
        productData.underwriter.payments.account_number = response.data.paybill.paymentmethod.account_number;
        productData.underwriter.payments.account_name = response.data.paybill.paymentmethod.account_name;
        productData.underwriter.payments.branch_code = response.data.paybill.paymentmethod.branch_code;
        productData.underwriter.payments.paypalemail = response.data.paybill.paymentmethod.paypalemail;
        commit("SetBuyHealthPurchase", productData);
    },
    async buyHealthproductfinal({ commit, getters }, megapayload) {
        
        return new Promise((resolve, reject) => {
            axios.post("/purchase/quotation/new/health", megapayload).then(
                response => {
                    let QuotationData = getters.gethealthpurchased;
                    QuotationData.premiumwithorwithoutbenefits = megapayload.total;
                    QuotationData.quotation_number = response.data.quotation_number;
                    QuotationData.quotation_id = response.data.quotation_id;
                    commit("SetHealthpurchase", QuotationData);
                    resolve(response);
                },
                error => {
                    reject(error);
                }
            );
        });
    },
    async CreatehealthCustomer({ commit, getters }, payload) {
        const response = await axios.post(
            "/purchase/customer/details/saved/health",
            payload
        );
        console.log(response);
        //commit("sethealthCustomerData", response.data);
    }
};
//mutations
const mutations = {
    setTypeofProduct: (state, value) => (state.productData.basic = value),
    SetHealthQuote: (state, value) => (state.productData.h_quotations = value),
    SetBuyHealthPurchase: (state, data) => (state.productData.h_product = data),
    SetHealthpurchase: (state, data) => (state.productData.h_purchased = data),
    sethealthCustomerData: (state, value) => (state.productData.h_customer = value),
    SetUnderwriters: (state, value) => (state.productData.underwriters.list = value)
};
export default {
    state,
    getters,
    actions,
    mutations
};