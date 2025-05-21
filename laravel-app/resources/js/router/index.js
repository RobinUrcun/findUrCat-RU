import Vue from "vue";
import Router from 'vue-router'
import Home from "../pages/home/Home.vue"
import LostCatPage from "../pages/lostCat/LostCatPage.vue"



Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
      {
        path: '/',
        name: 'Home',
        component: Home
      },     
      {
        path: '/chatsPerdus',
        name: 'chatsPerdus',
        component: LostCatPage
      },
    ]
  })