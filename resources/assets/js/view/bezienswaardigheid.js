VIEW.Bezienswaardigheid = (function (Validator) {

    var buttonSight = document.getElementById('make-sight');
    var buttonEditSight = document.getElementById('edit-sight');

    var id = document.getElementById('sight-id');
    var name = document.getElementById('sight-name');
    var description = document.getElementById('sight-description');
    var address = document.getElementById('sight-address');
    var email = document.getElementById('sight-email');
    var tel = document.getElementById('sight-tel');

    var sightValidated = function () {
        return Validator.make({
            "Bezienswaardigheid naam": {
                "value": name.value,
                "element": name,
                "id": "sight-name",
                "validate": ["empty"]
            },
            "Bezienswaardigheid beschrijving": {
                "value": CKEDITOR.instances["sight-description"].getData(),
                "element": description,
                "id": "sight-description",
                "validate": ["empty"]
            },
            "Bezienswaardigheid adres": {
                "value": address.value,
                "element": address,
                "id": "sight-address",
                "validate": ["empty"]
            },
            "Bezienswaardigheid E-mail": {
                "value": email.value,
                "element": email,
                "id": "sight-email",
                "validate": ["email"]
            },
            "Bezienswaardigheid Telefoonnummer": {
                "value": tel.value,
                "element": tel,
                "id": "sight-tel",
                "validate": ["empty"]
            },
        });
    };

    var actions = {
        submitSight: function () {
            if (!sightValidated()) {
                return;
            }

            axios.post('/admin/bezienswaardigheden', {
                'sight-name': name.value,
                'sight-description': CKEDITOR.instances["sight-description"].getData(),
                'sight-address': address.value,
                'sight-email': email.value,
                'sight-tel': tel.value,
                'sight-media': VIEW.selectedMedia
            });

            location.href = '/admin/bezienswaardigheden/overzicht';
        },
        editSight: function () {
            if (!sightValidated()) {
                return;
            }

            axios.post('/admin/bezienswaardigheden/' + id.value, {
                '_method': 'PATCH',
                'sight-name': name.value,
                'sight-description': CKEDITOR.instances["sight-description"].getData(),
                'sight-address': address.value,
                'sight-email': email.value,
                'sight-tel': tel.value,
                'sight-media': VIEW.selectedMedia
            });
            
            location.href = '/admin/bezienswaardigheden/overzicht';
        },
        getSightMedia: function () {
            axios.get('/bezienswaardigheden/' + id.value + '/media').then(function (response) {
                for (var dataIndex = 0; dataIndex < response.data.sightMedia.length; dataIndex++) {
                    selectedMedia = response.data.sightMedia[dataIndex];

                    var mediaItem = {
                        "id": selectedMedia.id,
                        "type": selectedMedia.type,
                        "url": selectedMedia.url
                    };

                    VIEW.selectedMedia.push(mediaItem);
                }

                document.dispatchEvent(VIEW.MediaBrowser.mediaChosenEvent);
            });
        }
    };

    return {
        init: function () {
            VIEW.selectedMedia = [];

            if (buttonSight !== null) {
                buttonSight.addEventListener('click', actions.submitSight, false);
            }

            if (buttonEditSight !== null) {
                console.log('edit');
                buttonEditSight.addEventListener('click', actions.editSight, false);
                
                actions.getSightMedia();
            }

        }
    };
})(VALIDATOR.Validator);