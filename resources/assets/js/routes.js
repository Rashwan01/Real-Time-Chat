import vueRouter from "vue-router";
let routes = [
    {
        path: "/",
        component: require("./views/auth/login").default
    },
    {
        path: "/login",
        component: require("./views/auth/login").default,
        name: "login"
    },
    {
        path: "/register",
        component: require("./views/auth/signup").default,
        name: "register"
    },
    {
        path: "/messenger",
        component: require("./views/messenger").default
    }
];

export default new vueRouter({
    mode: "history",
    routes,
    linkActiveClass: "is-active"
});