VIEW.Opleiding = (function (Modals, Validator) {
    var opleidingModal;
    var opleidingHolder;
    var opleidingAddButton;
    var opleidingRemoveButton;
    var modalopleidingOpen;
    var modalopleidingClose;
    var opleidingId = null;

    var naam = document.getElementById('opleiding-naam');
    var beschrijving = document.getElementById('opleiding-beschrijving');
    var link = document.getElementById('opleiding-link');

    var opleidingValidated = function () {
        return Validator.make({
            "Opleiding Naam": {
                "value": naam.value,
                "element": naam,
                "id": "opleiding-naam",
                "validate": ["empty"]
            },
            "Opleiding Beschrijving": {
                "value": beschrijving.value,
                "element": beschrijving,
                "id": "opleiding-beschrijving",
                "validate": ["empty"]
            },
            "Opleiding Link": {
                "value": link.value,
                "element": link,
                "id": "opleiding-link",
                "validate": ["empty"]
            }
        });
    };

    var actions = {
        loadOpleidingen: function () {
            var schoolId = opleidingHolder.dataset.schoolId;

            axios.get("/admin/opleidingen/school/" + schoolId).then(function (response) {

                for (var dataIndex = 0; dataIndex < response.data.length; dataIndex++) {
                    selectedOpleiding = response.data[dataIndex];

                    var opleiding = {
                        "id": dataIndex,
                        "naam": selectedOpleiding.name,
                        "beschrijving": selectedOpleiding.description,
                        "link": selectedOpleiding.link.toString()
                    };

                    VIEW.opleidingen.push(opleiding);
                    opleidingId = dataIndex;
                }

                render();

            });

        }
    };

    var addOpleiding = function () {
        if (!opleidingValidated()) {
            return;
        }

        var id = opleidingId;

        if (opleidingId === null) {
            id = VIEW.opleidingen.length;
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
            VIEW.opleidingen.push(opleiding);
        } else {
            VIEW.opleidingen[id] = opleiding;
            opleidingId = null;
        }

        opleidingModal.opleidingModal.classList.remove('modal-show');

        render();
    };

    var viewOpleiding = function (event) {
        opleidingModal.opleidingModal.classList.add('modal-show');

        opleidingId = event.target.id.split('-')[1];
        var opleidingData = VIEW.opleidingen[opleidingId];

        naam.value = opleidingData.naam;
        beschrijving.value = opleidingData.beschrijving;
        link.value = opleidingData.link;

        opleidingRemoveButton.classList.remove('hidden');
        opleidingAddButton.innerHTML = 'opleiding Bewerken';
    };

    var removeOpleiding = function () {
        VIEW.opleidingen.splice(opleidingId, 1);

        opleidingModal.opleidingModal.classList.remove('modal-show');
        UI.Modal.showModal();
        render();
    };

    var render = function () {

        while (opleidingHolder.firstChild) {
            opleidingHolder.removeChild(opleidingHolder.firstChild);
        }

        VIEW.opleidingen.forEach(function (opleiding) {
            var opleidingElement = document.createElement('button');

            opleidingElement.className = 'button--secondary button--big';
            opleidingElement.id = 'opleiding-' + opleiding.id;
            opleidingElement.innerHTML = opleiding.naam;
            opleidingElement.addEventListener('click', viewOpleiding, false);

            opleidingHolder.appendChild(opleidingElement);
        }, VIEW.opleidingen);

    };

    var resetOpleiding = function () {
        opleidingId = null;

        naam.value = '';
        beschrijving.value = '';
        link.value = '';

        opleidingRemoveButton.classList.add('hidden');
        opleidingAddButton.innerHTML = 'opleiding Toevoegen';
    };

    var events = function () {
        opleidingAddButton.addEventListener('click', addOpleiding, false);
        opleidingRemoveButton.addEventListener('click', removeOpleiding, false);
        modalopleidingOpen.addEventListener('click', resetOpleiding, false);
    };

    return {
        init: function () {
            opleidingModal = Modals;

            opleidingAddButton = document.getElementById('opleiding-toevoegen');
            opleidingRemoveButton = document.getElementById('opleiding-verwijderen');
            modalopleidingClose = document.getElementById('modal-opleiding-close');
            modalopleidingOpen = document.getElementById('modal-opleiding-open');

            if (opleidingAddButton === null) {
                return;
            }

            opleidingHolder = document.getElementById('opleidingen-holder');

            actions.loadOpleidingen();
            events();
        }
    };
})(UI.Modals, VALIDATOR.Validator);