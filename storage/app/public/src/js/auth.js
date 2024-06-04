document.addEventListener("DOMContentLoaded", function () {
    var togglePasswordButton = document.querySelector(".toggle-password");
    if (togglePasswordButton) {
        togglePasswordButton.addEventListener("click", function () {
            var targetIds = this.dataset.target.split(",");
            targetIds.forEach(function (targetId) {
                var passwordField = document.getElementById(targetId);
                if (passwordField && passwordField.type) {
                    passwordField.type =
                        passwordField.type === "password" ? "text" : "password";

                    // Update text content inside the event listener
                    var buttonText =
                        passwordField.type === "password"
                            ? "Show Password"
                            : "Hide Password";
                    togglePasswordButton.textContent = buttonText;
                }
            });
        });
    }

    // Validasi Email
    function validateEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    function setEmailValidationMessage(valid) {
        var emailErrorMessage = document.getElementById(
            "emailValidationMessage"
        );
        if (!valid) {
            emailErrorMessage.textContent = "Email tidak valid";
        } else {
            emailErrorMessage.textContent = "";
        }
    }

    // Validasi Password
    function validatePassword(password) {
        var passwordPattern =
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return passwordPattern.test(password);
    }

    function setPasswordValidationMessage(valid) {
        var passwordErrorMessage = document.getElementById(
            "passwordValidationMessage"
        );
        if (!valid) {
            passwordErrorMessage.textContent =
                "Password harus terdiri dari minimal 8 karakter, memiliki huruf besar, huruf kecil, angka, dan simbol.";
        } else {
            passwordErrorMessage.textContent = "";
        }
    }

    // Event Listener untuk Form Submit
    document
        .getElementById("loginForm")
        .addEventListener("submit", function (event) {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Validasi Email
            var isEmailValid = validateEmail(email);
            setEmailValidationMessage(isEmailValid);
            if (!isEmailValid) {
                event.preventDefault();
            }

            // Validasi Password
            var isPasswordValid = validatePassword(password);
            setPasswordValidationMessage(isPasswordValid);
            if (!isPasswordValid) {
                event.preventDefault();
            }
        });

    // Event Listener untuk Input Email
    document
        .getElementById("email")
        .addEventListener("input", function (event) {
            var email = event.target.value;
            var isEmailValid = validateEmail(email);
            setEmailValidationMessage(isEmailValid);
        });

    // Event Listener untuk Input Password
    document
        .getElementById("password")
        .addEventListener("input", function (event) {
            var password = event.target.value;
            var isPasswordValid = validatePassword(password);
            setPasswordValidationMessage(isPasswordValid);
        });
});
