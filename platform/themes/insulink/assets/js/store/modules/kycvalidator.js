//state
const state = {
    kycData: {
        first_name: "",
        middle_name: "",
        surname: "",
        kra_pin: "",
        id_number: ""
    },
    errorMsg: {
        firstName: '',
        middleName: '',
        surName: '',
        email: '',
        kra: '',
        phone: '',
        id: ''
    },
    renewalError: "",
}

//getters
const getters = {
    getKyc: (state) => state.kycData,
    getFirstNameError: (state) => state.errorMsg.firstName,
    getMiddleNameError: (state) => state.errorMsg.middleName,
    getSurNameError: (state) => state.errorMsg.surName,
    getEmailError: (state) => state.errorMsg.email,
    getKraError: (state) => state.errorMsg.kra,
    getPhoneError: (state) => state.errorMsg.phone,
    getIdError: (state) => state.errorMsg.id,
    getRenewalError: (state) => state.renewalError
}

//actions
const actions = {
    renewalVerifyEmail({ commit }, e) {

        const value = e.target.value;
        const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i

        if (regex.test(value)) {
            commit('setRenewalEmailError', false)
            $("#validationCustom02").removeClass("bg-danger text-white")
        } else {
            commit('setRenewalEmailError', true)
            $("#validationCustom02").addClass("bg-danger text-white")
        }
    },
    validateFirstName({ commit }) {
        let value = document.getElementById('first_name').value;

        const regex = /^[a-zA-Z'` ]+$/i

        if (regex.test(value)) {
            commit('setFirstNameError', '');
            $("#first_name").removeClass("bg-danger text-white");
        } else {
            commit('setFirstNameError', 'Please insert a valid First name');
            $("#first_name").addClass("bg-danger text-white");
        }
    },
    validateMiddleName({ commit }) {
        let value = document.getElementById('middle_name').value;

        const regex = /^[a-zA-Z'` ]+$/i

        if (regex.test(value)) {
            commit('setMiddleNameError', '');
            $("#middle_name").removeClass("bg-danger text-white");
        } else {
            commit('setMiddleNameError', 'Please insert a valid Middle Name');
            $("#middle_name").addClass("bg-danger text-white");
        }
    },
    validateSurName({ commit }) {
        let value = document.getElementById('surname').value;

        const regex = /^[a-zA-Z'` ]+$/i

        if (regex.test(value)) {
            commit('setsurNameError', '');
            $("#surname").removeClass("bg-danger text-white");
        } else {
            commit('setsurNameError', 'Please insert a valid SurName');
            $("#surname").addClass("bg-danger text-white");
        }
    },
    validateEmail({ commit }) {
        let value = document.getElementById('email').value;

        const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i

        if (regex.test(value)) {
            commit('setEmailError', '');
            $("#email").removeClass("bg-danger text-white");
        } else {
            commit('setEmailError', 'Please insert a valid Email Address');
            $("#email").addClass("bg-danger text-white");
        }
    },
    validateKra({ commit }) {
        let value = document.getElementById('kra_pin').value;

        const regex = /^A\d{9}[A-Z]$/i

        if (regex.test(value)) {
            commit('setKraError', '');
            $("#kra_pin").removeClass("bg-danger text-white");
        } else {
            commit('setKraError', 'Please insert a valid KRA Pin Number');
            $("#kra_pin").addClass("bg-danger text-white");
        }
    },
    validatePhone({ commit }) {
        let value = document.getElementById('phone').value;

        const regex = /^(07)[0-9]{8}$/i

        if (regex.test(value)) {
            commit('setPhoneError', '');
            $("#phone").removeClass("bg-danger text-white");
        } else {
            commit('setPhoneError', 'Please insert a valid Kenyan Phone Number');
            $("#phone").addClass("bg-danger text-white");
        }
    }
    // validateNationalId({ commit }){
    //     let value = document.getElementById('id_number').value;

    //     const regex = /^\d{0,9}$/i

    //     if (regex.test(value)){
    //         commit('setIdError', '');
    //         $("#id_number").removeClass("bg-danger text-white");
    //     } else{
    //         commit('setIdError', 'Please insert a valid National ID Number');
    //         $("#id_number").addClass("bg-danger text-white");
    //     } 
    // }

}

//mutations 
const mutations = {
    setFirstNameError: (state, message) => (state.errorMsg.firstName = message),
    setMiddleNameError: (state, message) => (state.errorMsg.middleName = message),
    setsurNameError: (state, message) => (state.errorMsg.surName = message),
    setEmailError: (state, message) => (state.errorMsg.email = message),
    setKraError: (state, message) => (state.errorMsg.kra = message),
    setPhoneError: (state, message) => (state.errorMsg.phone = message),
    setIdError: (state, message) => (state.errorMsg.id = message),
    setRenewalEmailError: (state, message) => (state.renewalError = message)
}

export default {
    state,
    getters,
    actions,
    mutations
}