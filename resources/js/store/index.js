import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios"

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user: null
    },
    getters: {

    },
    mutations: {
        setUser: (state, user) => state.user = user
    },
    actions: {

    },
    modules: {

    }
})