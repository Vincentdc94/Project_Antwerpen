VALIDATOR.Empty = (function () {
    var errorElement = function (error, id) {
        var errorMessage = document.createElement('div');
        errorMessage.className = "error error-validation";
        errorMessage.innerHTML = error;
        errorMessage.id = "error-" + id;

        return errorMessage;
    };

    var showEmptyError = function (elementName, element, id) {
        var error = errorElement(elementName + " bevat geen tekst of informatie", id);

        if (element.type === 'textarea') {
            element.parentNode.insertBefore(error, element.nextSibling.nextSibling);
        } else {
            element.parentNode.insertBefore(error, element.nextSibling);
        }
    };

    return {


        notEmpty: function (elementName, element, value, id) {
            var errors = document.getElementsByClassName('error-validation');

            if (value === "") {
                showEmptyError(elementName, element, id);
            }
        }
    };
})();