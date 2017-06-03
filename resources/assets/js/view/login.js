VIEW.Login = (function (Validator) {
    var login;

    var loginEmail = document.getElementById('email');
    var loginPassword = document.getElementById('password');

    var validateLogin = function (event) {
        event.preventDefault();

        isValid = Validator.make({
            "email": {
                "value": loginEmail.value,
                "element": loginEmail,
                "id": "email",
                "validate": ["email"]
            },
            "password": {
                "value": loginPassword.value,
                "element": loginPassword,
                "id": "password",
                "validate": ["empty"]
            }
        });

        if (isValid) {
            login.submit();
        }
    }

    return {
        init: function () {
            login = document.getElementById('login');

            if (login === null) {
                return;
            }

            login.addEventListener('submit', validateLogin, false);
        }
    }
})(VALIDATOR.Validator);