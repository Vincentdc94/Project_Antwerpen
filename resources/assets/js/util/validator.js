UTIL.Validator = (function () {
    var errorElement = function (error) {
        var errorMessage = document.createElement('div');
        errorMessage.className = "error error-validation hidden";
        errorMessage.innerHTML = error;

        return errorMessage;
    };

    var setEmptyError = function (elementName) {
        var error = errorElement(elementName + " bevat geen tekst of informatie");
        if (element.type === 'textarea') {
            element.parentNode.insertBefore(error, element.nextSibling.nextSibling);
        } else {
            element.parentNode.insertBefore(error, element.nextSibling);
        }
    }
    var notEmpty = function (elementName, element, value) {
        setEmptyError(elementName);

        var errors = document.getElementsByClassName('error-validation');
        if (value === "") {
            for(errorIndex = 0; errorIndex < errors.length; errorIndex++){
                errors[errorindex].classList.remove('hidden');
            }
        }
    };

    var defineValidationType = function (elementName, type, element, value) {
        switch (type) {
            case "empty":
                notEmpty(elementName, element, value);
                break;

            default:
                break;
        }
    };

    var reset = function () {
        var errors = document.getElementsByClassName('error-validation');

        for (var errorIndex = 0; errorIndex < errors.length; errorIndex++) {
            errors[errorIndex].classList.add('hidden');
        }

    };

    return {
        make: function (validatorObject) {
            reset();

            for (const key of Object.keys(validatorObject)) {

                //Do a check on value by validation type
                for (var validationTypeIndex = 0; validationTypeIndex < validatorObject[key].validate.length; validationTypeIndex++) {
                    validationType = validatorObject[key].validate[validationTypeIndex];
                    defineValidationType(key, validationType, validatorObject[key].element, validatorObject[key].value);
                }

            }

            return false;
        }
    };
})();