VALIDATOR.Empty = (function () {
    var errorElement = function (error, id) {
        var errorMessage = document.createElement('div');
        errorMessage.className = "error error-empty-validation";
        errorMessage.innerHTML = error;
        errorMessage.id = "error-" + id;

        return errorMessage;
    };

    var showEmptyError = function (elementName, element, id) {
        var error = errorElement("Je moet het " + elementName + " veld nog invullen", id);

        if (element.type === 'textarea') {
            element.parentNode.insertBefore(error, element.nextSibling.nextSibling);
        } else {
            element.parentNode.insertBefore(error, element.nextSibling);
        }
    };

    return {
        notEmpty: function (elementName, element, value, id) {
            var errors = document.getElementsByClassName('error-empty-validation');

            if (value === "") {
                showEmptyError(elementName, element, id);
            }
        }
    };
})();