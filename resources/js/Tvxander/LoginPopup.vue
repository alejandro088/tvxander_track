<template>
    <!--login form popup-->
    <div class="login-wrapper" id="login-content">
        <div class="login-content">
            <a href="#" class="close">x</a>
            <h3>Login</h3>
            <form method="post" :action="route('login')">
                <input type="hidden" name="_token" :value="csrf" />
                <div class="row">
                    <label for="email">
                        Email:
                        <input
                            type="text"
                            name="email"
                            id="email"
                            required="required"
                        />
                    </label>
                </div>

                <div class="row">
                    <label for="password">
                        Password:
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required="required"
                        />
                    </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <div>
                            <input
                                type="checkbox"
                                name="remember"
                                value="Remember me"
                            /><span>Remember me</span>
                        </div>
                        <a href="#">Forget password ?</a>
                    </div>
                </div>
                <div class="row">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="row">
                <p>Or via social</p>
                <div class="social-btn-2">
                    <a class="fb" href="#"
                        ><i class="ion-social-facebook"></i>Facebook</a
                    >
                    <a class="tw" href="#"
                        ><i class="ion-social-twitter"></i>twitter</a
                    >
                </div>
            </div>
        </div>
    </div>
    <!--end of login form popup-->
</template>

<script>
export default {
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    }
};
</script>

<style>
.overlay .login-content {
    width: 430px;
    padding: 50px;
    border: 1px solid #e1e1e1;
    height: auto;
    background-color: #ffffff;
}
@media (max-width: 767px) {
    .overlay .login-content {
        width: 300px;
        padding: 30px;
    }
}
.overlay .login-content h3 {
    font-family: "Dosis", sans-serif;
    font-size: 36px;
    color: #222222;
    font-weight: 700;
    margin-bottom: 45px;
    text-align: center;
}
@media (max-width: 767px) {
    .overlay .login-content h3 {
        margin-bottom: 15px;
    }
}
.overlay .login-content .remember {
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
    font-family: "Nunito", sans-serif;
    font-size: #abb7c4;
    color: #222222;
    font-weight: 600;
    text-transform: none;
}
@media (max-width: 767px) {
    .overlay .login-content .remember {
        margin-bottom: 15px;
    }
}
.overlay .login-content .remember input[type="checkbox"] {
    width: 20px;
    height: 20px;
    border: 1px solid #e1e1e1;
    margin-right: 5px;
    position: relative;
}
.overlay .login-content .remember span {
    margin-top: 3px;
    position: absolute;
}
.overlay .login-content label {
    font-family: "Dosis", sans-serif;
    font-size: 14px;
    color: #222222;
    font-weight: bold;
    width: 100%;
    margin-bottom: 25px;
}
@media (max-width: 767px) {
    .overlay .login-content label {
        margin-bottom: 15px;
    }
}
.overlay .login-content label input {
    font-family: "Dosis", sans-serif;
    font-size: 14px;
    color: #222222;
    font-weight: bold;
    margin-top: 10px;
    height: 42px;
    border: 1px solid #e1e1e1;
}
.overlay .login-content label input::-webkit-input-placeholder {
    font-family: "Dosis", sans-serif;
    font-size: 14px;
    color: #222222;
    font-weight: bold;
    text-transform: capitalize;
}
.overlay .login-content button {
    font-family: "Dosis", sans-serif;
    font-size: 14px;
    color: #ffffff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    background-color: #dd003f;
    height: 42px;
    width: 100%;
    cursor: pointer;
}
.overlay .login-content p {
    color: #222222;
    margin-top: 35px;
    margin-bottom: 20px;
}
@media (max-width: 767px) {
    .overlay .login-content p {
        margin-bottom: 15px;
        margin-top: 15px;
    }
}
.overlay .login-content .social-btn-2 {
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.overlay .login-content .social-btn-2 a {
    width: 50%;
    height: 42px;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: "Dosis", sans-serif;
    font-size: 16px;
    color: #ffffff;
    font-weight: 700;
    text-transform: uppercase;
    cursor: pointer;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.overlay .login-content .social-btn-2 a i {
    margin-right: 10px;
}
.overlay .login-content .social-btn-2 .fb {
    background-color: #3a5a9a;
    margin-right: 15px;
}
.overlay .login-content .social-btn-2 .tw {
    background-color: #00b9ef;
}
</style>
