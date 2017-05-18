UTIL.Validator = (function(){
    var errorElement = function(error){
        var errorMessage = document.createElement('div');
        errorMessage.className = "error validation-error";
        errorMessage.innerHTML = error;

        return errorMessage;
    };

    var notEmpty = function(elementName, element, value){
        if(value === "" || value === null || value === undefined){
            var error = errorElement(elementName + " bevat geen tekst of informatie");
            element.parentNode.insertBefore(error, element.nextSibling);
        }
    };

    var defineValidationType = function(elementName, type, element, value){
        switch (type) {
            case "empty":
                notEmpty(elementName, element, value);
                break;
        
            default:
                break;
        }
    };

    var reset = function(){
        var errors = document.getElementsByClassName('validation-error');

        for(var errorIndex = 0; errorIndex < errors.length; errorIndex++){
            error = errors[errorIndex];
            error.parentNode.removeChild(error);
        }
        
    };

    return{
        make: function(validatorObject){
            reset();
            for(const key of Object.keys(validatorObject)){
                
                //Do a check on value by validation type
                for(var validationTypeIndex = 0; validationTypeIndex < validatorObject[key].validate; validationTypeIndex++){
                    validationType = validatorObject[key].validate[validationTypeIndex];
                    defineValidationType(key, validationType, validatorObject[key].element, validatorObject[key].value);
                }

            }

            return false;
        }
    };
})();
