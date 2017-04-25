

FORM.Textarea = (function(){

    return{
        init: function(){
            var textareas = document.getElementsByTagName('textarea');

            for(let textareaIndex = 0;  textareaIndex < textareas.length; textareaIndex++){
                CKEDITOR.replace(textareas[textareaIndex].getAttribute('name'));
            }
            
        }
    };
})();