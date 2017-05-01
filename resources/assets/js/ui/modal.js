UI.Modal = (function(){
    var campus;
    var closeCampus;

    var showModal = function(event){
        var triggerElement = event.target;
    
        if(event.target.nodeName === 'I'){
            triggerElement = event.target.parentNode;
        }

        var elementId = triggerElement.id.split('-', 2);

        $el = document.getElementById(elementId[0] + '-' + elementId[1]);
        $el.classList.add('modal-show');
    };

    var hideModal = function(event){
        $el.classList.remove('modal-show');
    };

    var events = function(){
        campus.addEventListener('click', showModal, false);
        closeCampus.addEventListener('click', hideModal, false);
    };

    return{
        Modals: {},
        init: function(modalName){
            if(document.getElementsByClassName('modal').length === 0){
                return;
            }

            var modal = modalName + "Modal";
            this.Modals[modal] = document.getElementById('modal-' + modalName)
          
            
            campus = document.getElementById('modal-' + modalName +'-open');
            closeCampus = document.getElementById('modal-' + modalName +'-close');

            events();
        }
    };
})();