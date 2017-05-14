FORM.Opleiding = (function (Modal) {
    var opleidingen = [];
    var opleidingModal = Modal.Modals;
    var opleidingHolder;
    var opleidingAddButton;
    var opleidingRemoveButton;
    var modalopleidingOpen;
    var modalopleidingClose;
    var opleidingId = null;

    var naam = document.getElementById('opleiding-naam');
    var beschrijving = document.getElementById('opleiding-beschrijving');
    var link = document.getElementById('opleiding-link');

    var addopleiding = function () {
        var id = opleidingId;

        if (opleidingId === null) {
            id = opleidingen.length;
        }

        var opleiding = {
            "id": id,
            "naam": naam.value,
            "beschrijving": beschrijving.value,
            "link": link.value 
        };

        naam.value = '';
        beschrijving.value = '';

        if (opleidingId === null) {
            opleidingen.push(opleiding);
        } else {
            opleidingen[id] = opleiding;
            opleidingId = null;
        }

        opleidingModal.opleidingModal.classList.remove('modal-show');

        render();
    };

    var loadopleidingen = function(){


        render();
    };

    var viewopleiding = function (event) {
        opleidingModal.opleidingModal.classList.add('modal-show');

        opleidingId = event.target.id.split('-')[1];
        var opleidingData = opleidingen[opleidingId];

        naam.value = opleidingData.naam;
        beschrijving.value = opleidingData.beschrijving;

        opleidingRemoveButton.classList.remove('hidden');
        opleidingAddButton.innerHTML = 'opleiding Bewerken';
    };

    var removeopleiding = function(){
        opleidingen.splice(opleidingId, 1);

        opleidingModal.opleidingModal.classList.remove('modal-show');
        render();
    };

    var render = function () {

        while (opleidingHolder.firstChild) {
            opleidingHolder.removeChild(opleidingHolder.firstChild);
        }

        opleidingen.forEach(function (opleiding) {
            var opleidingElement = document.createElement('button');

            opleidingElement.className = 'button--secondary button--big';
            opleidingElement.id = 'opleiding-' + opleiding.id;
            opleidingElement.innerHTML = opleiding.naam;
            opleidingElement.addEventListener('click', viewopleiding, false);

            opleidingHolder.appendChild(opleidingElement);
        }, opleidingen);

    };

    var resetopleiding = function () {
        opleidingId = null;

        naam.value = '';
        beschrijving.value = '';

        opleidingRemoveButton.classList.add('hidden');
        opleidingAddButton.innerHTML = 'opleiding Toevoegen';
    };

    var events = function () {
        opleidingAddButton.addEventListener('click', addopleiding, false);
        opleidingRemoveButton.addEventListener('click', removeopleiding, false);
        modalopleidingOpen.addEventListener('click', resetopleiding, false);
    };

    return {
      opleidingen: opleidingen,
        init: function () {
            opleidingAddButton = document.getElementById('opleiding-toevoegen');
            opleidingRemoveButton = document.getElementById('opleiding-verwijderen');
            modalopleidingClose = document.getElementById('modal-opleiding-close');
            modalopleidingOpen = document.getElementById('modal-opleiding-open');

            if (opleidingAddButton === null) {
                return;
            }

            opleidingHolder = document.getElementById('opleidingen-holder');

            loadopleidingen();
            events();
        }
    };
})(UI.Modal);
