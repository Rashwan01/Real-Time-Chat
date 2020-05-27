import Vue from "vue";
import appStorage from "./Auth/appStorage";
import vueRouter from "vue-router";
import User from "./Auth/user";
window.User = User;
Vue.use(vueRouter);

window.Vue = Vue;
window.axios = require('axios');
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
import Echo from "laravel-echo";

window.io = require("socket.io-client");

window.Echo = new Echo({
    broadcaster: "socket.io",
    host: window.location.hostname + ":6001",
    auth : {
    headers : {
            Authorization: "Bearer " + appStorage.getToken()
    }
}
});

console.log(User.id());
