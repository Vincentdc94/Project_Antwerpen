VIEW.Registration = (function(Validator){
    var register;

    var registerName = document.getElementById('name')
    var registerLastName = document.getElementById('lastName')
    var registerEmail = document.getElementById('email');
    var registerPassword = document.getElementById('password');
    var registerPasswordConfirmation = document.getElementById('password_confirmation');

    var validateRegister = function (event) {
        event.preventDefault();

        isValid = Validator.make({
            "email": {
                "value": registerEmail.value,
                "element": registerEmail,
                "id": "email",
                "validate": ["email"]
            },
            "Voornaam": {
                "value": registerName.value,
                "element": registerName,
                "id": "name",
                "validate": ["empty"]
            },
            "Achternaam": {
                "value": registerLastName.value,
                "element": registerLastName,
                "id": "lastName",
                "validate": ["empty"]
            },
           
            "Wachtwoord": {
                "value": registerPassword.value,
                "element": registerPassword,
                "id": "password",
                "validate": ["empty"]
            },
            "Wachtwoord Bevestiging": {
                "value": registerPasswordConfirmation.value,
                "element": registerPasswordConfirmation,
                "id": "password_confirmation",
                "validate": ["empty"]
            }
        });

        if (isValid) {
            register.submit();
        }
    }

    return {
        init: function () {
            register = document.getElementById('register');

            if (register === null) {
                return;
            }

            register.addEventListener('submit', validateRegister, false);
        }
    }
})(VALIDATOR.Validator);