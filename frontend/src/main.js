import Vue from "vue";
import App from "./App.vue";
// import "tailwindcss/dist/tailwind.min.css";
// import 'tailwindcss/dist/base.min.css';
// import 'tailwindcss/dist/components.min.css';
// import 'tailwindcss/dist/utilities.min.css';
import "@/assets/css/main.css";
import "flatpickr/dist/flatpickr.css";
import "font-awesome/css/font-awesome.min.css";
import VueScrollReveal from "vue-scroll-reveal";
import Datepicker from "vuejs-datepicker";
import VueScrollactive from "vue-scrollactive";
import VCalendar from "v-calendar";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserAlt } from "@fortawesome/free-solid-svg-icons";
import { faHospitalAlt } from "@fortawesome/free-solid-svg-icons";
import flatPickr from "vue-flatpickr-component";
// import {  } from "@fortawesome/free-regular-svg-icons";
import { faAddressCard } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
library.add(faHospitalAlt);
library.add(faAddressCard);
library.add(faUserAlt);
Vue.use(VCalendar);
Vue.component("font-awesome-icon", FontAwesomeIcon);
Vue.component("date-picker", Datepicker);
Vue.component("flat-pickr", flatPickr);
Vue.use(VueScrollactive);
Vue.use(VueScrollReveal, {
    class: "v-scroll-reveal", // A CSS class applied to elements with the v-scroll-reveal directive; useful for animation overrides.
    duration: 800,
    scale: 1,
    distance: "10px"
});
// import '@/assets/js/main.js'
// import 'alpinejs'
// import 'bootstrap/dist/js/bootstrap.min.js'
// import 'bootstrap/dist/css/bootstrap.min.css';
import router from "./route";
import axios from "axios";

Vue.config.productionTip = false;
axios.defaults.baseURL = "http://api.nusvac.com/api/";
// axios.defaults.baseURL = "http://192.168.1.4/api/";

new Vue({
    router,
    render: h => h(App)
}).$mount("#app");
