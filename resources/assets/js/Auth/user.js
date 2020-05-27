import Token from "./Token.js";
import appStorage from "./appStorage.js";
class User {
    constructor() {
        this.errors = '',
        this.hasError =false
    }
    login(data) {
          axios
            .post("api/auth/login", data)
              .then(res => {
                  console.log(res);
                this.responseAfterLogin(res);
                this.hasError = false;
            
            })
            .catch(errors => {
                this.hasError = true;
                this.errors = errors.response.data.error;
            });
    }
    hasErrors() {
        return this.hasError;
    }
    errorMessage() {
        return this.errors;
    }
    responseAfterLogin(res) {
        const access_token = res.data.access_token;
        const username = res.data.user;
        if (Token.isValid(access_token)) {
            console.log("stored");
            appStorage.store(username, access_token);
            window.location = "/messenger";
        }
    }
    /*
        if there is token stored in local storage
        then check if it is valid
        @valid =>login()
        @notVAlid =>logout()
*/

    hasToken() {
        const storedToken = appStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : this.logout();
        }
        return false;
    }
    isLogin() {
        return this.hasToken();
    }

    name() {
        if (this.isLogin()) {
            return appStorage.getuser();
        }
    }
    id() {
        if (this.isLogin()) {
            const payload = Token.payload(appStorage.getToken());

            return payload.sub;
        }
    }

    logout() {
        appStorage.clear();
        window.location = "/forum";
    }
    own(id) {
        return this.id() == id;
    }
    isAdmin() {
        return this.id() == 1;
    }
}
export default User = new User();
