

VALIDATOR.Validator = (function (Empty, Mail) {
    var defineValidationType = function (elementName, type, element, value, id) {
        switch (type) {
            case "empty":
                Empty.notEmpty(elementName, element, value, id);
                break;
            case "email":
                Mail.validMail(elementName, element, value, id);
            default:
                break;
        }
    };

    var reset = function (id) {
    
        var element = document.getElementById('error-' + id);

        if(element !== null){
            element.parentNode.removeChild(element);
        }

    };

    return {
        make: function (validatorObject) {
            

            for (const elementName of Object.keys(validatorObject)) {

                //Do a check on value by validation type
                for (var validationTypeIndex = 0; validationTypeIndex < validatorObject[elementName].validate.length; validationTypeIndex++) {
                    validationType = validatorObject[elementName].validate[validationTypeIndex];
                    
                    console.log(validationType);

                    reset(validatorObject[elementName].id);

                    defineValidationType(
                        elementName, 
                        validationType, 
                        validatorObject[elementName].element, 
                        validatorObject[elementName].value, 
                        validatorObject[elementName].id
                    );
                }

            }

            if(document.getElementsByClassName('error').length === 0){
                return true;
            }else{
                return false;
            }
            
        }
    };
})(VALIDATOR.Empty, VALIDATOR.Mail);