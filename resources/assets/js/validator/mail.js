VALIDATOR.Mail = (function(){
     var errorElement = function (error, id) {
        var errorMessage = document.createElement('div');
        errorMessage.className = "error error-mail-validation";
        errorMessage.innerHTML = error;
        errorMessage.id = "error-" + id;

        return errorMessage;
    };

    var showMailError = function (elementName, element, id) {
        var error = errorElement("Je moet een correct e-mail adres geven", id);

        if (element.type === 'textarea') {
            element.parentNode.insertBefore(error, element.nextSibling.nextSibling);
        } else {
            element.parentNode.insertBefore(error, element.nextSibling);
        }
    };

    var isValidMail = function(email){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    return {
        validMail: function (elementName, element, value, id) {
            var errors = document.getElementsByClassName('error-mail-validation');

            if (!isValidMail(value)) {
                showMailError(elementName, element, id);
            }
        }
    };
})();