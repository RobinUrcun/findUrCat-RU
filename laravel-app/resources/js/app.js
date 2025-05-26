import Vue from "vue";
import App from "./components/App.vue";
import router from "./router/index";
import Toast from "vue-toastification";
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import "vue-toastification/dist/index.css";

import store from "./src/store";
Vue.use(Vuetify);
const vuetify = new Vuetify();


Vue.use(Toast);

new Vue({
    store,
    vuetify,
    router,
    render: (h) => h(App),
}).$mount("#app");
