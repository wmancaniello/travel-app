import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";
import "@fortawesome/fontawesome-free/css/all.min.css";

// LOGIN
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});
// /LOGIN

// CHECK PASSWORD LOGIN
document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#toggle-password");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function (e) {
        // Toggle the type attribute
        const type =
            password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // Toggle the eye icon
        this.classList.toggle("fa-eye-slash");
    });

    const togglePasswordConfirm = document.querySelector(
        "#toggle-password-confirm"
    );
    const passwordConfirm = document.querySelector("#password-confirm");

    togglePasswordConfirm.addEventListener("click", function (e) {
        // Toggle the type attribute
        const type =
            passwordConfirm.getAttribute("type") === "password"
                ? "text"
                : "password";
        passwordConfirm.setAttribute("type", type);

        // Toggle the eye icon
        this.classList.toggle("fa-eye-slash");
    });
});
// / CHECK PASSWORD LOGIN
