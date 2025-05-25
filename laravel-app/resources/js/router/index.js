import Vue from "vue";
import Router from "vue-router";
import Home from "../pages/home/Home.vue";
import LostCatPage from "../pages/lostCat/LostCatPage.vue";
import CreateAccompte from "../pages/auth/createAccompte/CreateAccompte";
import LoginPage from "../pages/auth/login/LoginPage";
import CreateCat from "../pages/createCat/CreateCat.vue";
import DepartementSearch from "../pages/departementSearch/DepartementSearch.vue";

Vue.use(Router);

export default new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home,
        },
        {
            path: "/chatsPerdus",
            name: "chatsPerdus",
            component: LostCatPage,
        },
        {
            path: "/creer_un_compte",
            name: "creer_un_compte",
            component: CreateAccompte,
        },
        {
            path: "/connection",
            name: "connection",
            component: LoginPage,
        },
        {
            path: "/ajouter_un_chat",
            name: "ajouter_un_chat",
            component: CreateCat,
        },
        {
            path: "/departements",
            name: "departements",
            component: DepartementSearch,
        },
    ],
});
