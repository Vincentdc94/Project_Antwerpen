UI.Modal = (function(){
    var modal;
    var closeModal;

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
        var triggerElement = event.target;

        if(event.target.nodeName === 'I'){
            triggerElement = event.target.parentNode;
        }

        var elementId = triggerElement.id.split('-', 2);

        $el = document.getElementById(elementId[0] + '-' + elementId[1]);
        $el.classList.remove('modal-show');
    };

    var events = function(){
        modal.addEventListener('click', showModal, false);
        closeModal.addEventListener('click', hideModal, false);
    };

    return{
        Modals: {},
        init: function(modalName){
            currentModal = document.getElementById('modal-' + modalName)

            if(currentModal === null){
                return;
            }

            var thisModal = modalName + "Modal";
            this.Modals[thisModal] = currentModal;


            modal = document.getElementById('modal-' + modalName +'-open');

            closeModal = document.getElementById('modal-' + modalName +'-close');

            events();
        }
    };
})();
