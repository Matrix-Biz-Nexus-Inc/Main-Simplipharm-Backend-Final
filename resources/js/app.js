require("./bootstrap");

window.Vue = require("vue").default;
import Vue from "vue";
import VueRouter from "vue-router";
import { routes } from "./routes";
import Vuetify from './plugins/vuetify'
//import vuetify from "./plugins/vuetify";

Vue.use(VueRouter);

Vue.component(
    "employees-index",
    require("./components/employees/Index.vue").default
);

Vue.component(
    "pharmacists-index",
    require("./components/pharmacists/Index.vue").default
);

Vue.component(
    "pharmacies-index",
    require("./components/pharmacies/Index.vue").default
);

Vue.component(
    "sign-in",
    require("./components/SignIn.vue").default
);

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    router: router,
    vuetify: Vuetify,
    el: "#app"
});
