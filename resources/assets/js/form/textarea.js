

FORM.Textarea = (function(){

    return{
        init: function(){
            var textareas = document.getElementsByClassName('richtext');

            if(textareas === null){
                return;
            }
            
            for(let textareaIndex = 0;  textareaIndex < textareas.length; textareaIndex++){
                CKEDITOR.replace(textareas[textareaIndex].getAttribute('name'));
            }
            
        }
    };
})();