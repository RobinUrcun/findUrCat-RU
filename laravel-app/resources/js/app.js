import Vue from 'vue'
import App from './components/App.vue'
import router from './router/index'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

Vue.use(Toast)

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
