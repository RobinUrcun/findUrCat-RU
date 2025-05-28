import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: localStorage.getItem("authToken")
            ? localStorage.getItem("authToken")
            : null,
        user: localStorage.getItem("user")
            ? JSON.parse(localStorage.getItem("user"))
            : null,
        catList: [],
        catFilterList : []
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token;
        },
        SET_USER(state, user) {
            state.user = user;
        },
        SET_LOGOUT(state) {
            state.user = null;
            state.token = null;
        },
        SET_CHAT(state, data) {
            state.catList = data;
        },
        SET_CAT_FILTER_LIST(state, data){
            state.catFilterList = data
        }
    },

    actions: {
        async logout(context) {
            console.log("logout");

            try {
                const response = await fetch("/api/logout", {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        Authorization: `Bearer ${context.state.token}`,
                    },
                });
                if (response.ok) {
                    context.commit("SET_LOGOUT");
                    localStorage.removeItem("authToken");
                    localStorage.removeItem("user");

                    return { status: 200 };
                } else {
                    return { status: 400 };
                }
            } catch (error) {
                return { status: 400 };
            }
        },
        async login(context, { email, password }) {
            try {
                const response = await fetch("/api/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password,
                    }),
                    credentials: "include",
                });

                if (response.ok) {
                    const data = await response.json();

                    context.commit("SET_TOKEN", data.access_token);

                    context.commit("SET_USER", data.user);

                    localStorage.setItem("authToken", data.access_token);
                    localStorage.setItem("user", JSON.stringify(data.user));

                    return { status: 200 };
                } else {
                    return { status: 300 };
                }
            } catch (error) {
                return { status: 400 };
            }
        },
        async fetchCatList(context) {
            console.log(!context.state.catList?.length);

            if (!context.state.catList?.length) {
                try {
                    const response = await fetch("/api/getAllCats", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                    });

                    if (response.ok) {
                        const result = await response.json();

                        context.commit("SET_CHAT", result);
                        return { status: 200 };
                    } else {
                        return { status: 400 };
                    }
                } catch (error) {
                    return { status: 400 };
                }
            }
        },
        async fetchCatWithFilter(context, {name, isLost, departement, color}){
           try {
            const urlParams = new URLSearchParams();

            if(name){
                urlParams.append('name', name)
            };
            if(isLost !== null){
                urlParams.append('is_lost', isLost)
            }
            if(departement){
                console.log('addDepartement');
                
                urlParams.append('departement', departement)
            }; 
            if(color){
                urlParams.append('color', color)
            }

            const response = await fetch(`/api/getCatsWithFilter/?${urlParams.toString()}`)

            if(response.ok){
                const data = await response.json()
                console.log(data);
                this.commit('SET_CAT_FILTER_LIST', data)

                return {status: 200}
                
            }else{
                return {status: 400}
            }
           } catch (error) {
            
            return {status: 400}

           }
        }
    },
    getters: {
        getIsUserLog(state) {
            return !state.token ? true : false;
        },
        getUserName(state) {
            return state.user?.name;
        },
        getCatList(state) {
            return state.catList;
        },
        getCatFilterList(state){
            return state.catFilterList
        }
    },
});
