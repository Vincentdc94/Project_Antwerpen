FORM.Campus = (function (Modal) {
    var campussen = [];
    var campusModal = Modal.Modals;
    var campusHolder;
    var campusAddButton;
    var campusRemoveButton;
    var modalCampusOpen;
    var modalCampusClose;
    var campusId = null;

    var naam = document.getElementById('campus-naam');
    var beschrijving = document.getElementById('campus-beschrijving');
    var adres = document.getElementById('campus-adres');
    var email = document.getElementById('campus-email');
    var tel = document.getElementById('campus-tel');

    var addCampus = function () {
        var id = campusId;

        if (campusId === null) {
            id = campussen.length;
        }

        var campus = {
            "id": id,
            "naam": naam.value,
            "beschrijving": beschrijving.value,
            "adres": adres.value,
            "email": email.value,
            "tel": tel.value
        };

        naam.value = '';
        beschrijving.value = '';
        adres.value = '';
        email.value = '';
        tel.value = '';

        if (campusId === null) {
            campussen.push(campus);
        } else {
            campussen[id] = campus;
            campusId = null;
        }

        campusModal.campusModal.classList.remove('modal-show');

        render();
    };

    var viewCampus = function (event) {
        campusModal.campusModal.classList.add('modal-show');

        campusId = event.target.id.split('-')[1];
        var campusData = campussen[campusId];

        naam.value = campusData.naam;
        beschrijving.value = campusData.beschrijving;
        adres.value = campusData.adres;
        email.value = campusData.email;
        tel.value = campusData.tel;

        campusRemoveButton.classList.remove('hidden');
        campusAddButton.innerHTML = 'Campus Bewerken';
    };

    var removeCampus = function(){
        campussen.splice(campusId, 1);

        campusModal.campusModal.classList.remove('modal-show');
        render();
    };

    var render = function () {

        while (campusHolder.firstChild) {
            campusHolder.removeChild(campusHolder.firstChild);
        }

        campussen.forEach(function (campus) {
            var campusElement = document.createElement('button');

            campusElement.className = 'button--secondary button--big';
            campusElement.id = 'campus-' + campus.id;
            campusElement.innerHTML = campus.naam;
            campusElement.addEventListener('click', viewCampus, false);

            campusHolder.appendChild(campusElement);
        }, campussen);

    };

    var resetCampus = function () {
        campusId = null;

        naam.value = '';
        beschrijving.value = '';
        adres.value = '';
        email.value = '';
        tel.value = '';

        campusRemoveButton.classList.add('hidden');
        campusAddButton.innerHTML = 'Campus Toevoegen';
    };

    var events = function () {
        campusAddButton.addEventListener('click', addCampus, false);
        campusRemoveButton.addEventListener('click', removeCampus, false);
        modalCampusOpen.addEventListener('click', resetCampus, false);
    };

    return {
      campussen: campussen,
        init: function () {
            campusAddButton = document.getElementById('campus-toevoegen');
            campusRemoveButton = document.getElementById('campus-verwijderen');
            modalCampusClose = document.getElementById('modal-campus-close');
            modalCampusOpen = document.getElementById('modal-campus-open');

            if (campusAddButton === null) {
                return;
            }

            campusHolder = document.getElementById('campussen-holder');

            events();
        }
    };
})(UI.Modal);
