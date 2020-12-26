require('./bootstrap')
window.Vue = require('vue')

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import routes from './routes'

const router = new VueRouter({
    routes
})

Vue.component("spinner", require("vue-simple-spinner"))

import store from './store'

import App from './App.vue'

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app")

