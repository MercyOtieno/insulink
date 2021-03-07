import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { x: 0, y: 0 };
        }
    },
    routes: [
        {
            path: "/quotations/private-motor",
            name: "MotorPrivateQuotes",
            component: () =>
                import("../components/MotorPrivateQuotationComponent.vue")
        }
    ]
});