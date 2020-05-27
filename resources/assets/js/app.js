import "./bootstrap"
import User from "./Auth/user";
window.User = User;
window.EventBus = new Vue();
Window.User = User;
import router from "./routes";
new Vue({
"el":"#root",
    router,
    

})
window.Echo.join("onlineUser")
    .here(users => {
        
        EventBus.$emit("onlineUser",users);
    })
    .joining(user => {
     EventBus.$emit("userJoin", user);
    })
    .leaving(user => {
       EventBus.$emit("userLeave", user);
    });
 
