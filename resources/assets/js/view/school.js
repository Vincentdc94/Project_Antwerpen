VIEW.School = (function (Validator) {
    var schoolButton;
    var schoolEditButton;

    var schoolName;
    var schoolDescription;

    var actions = {
        createSchool: function () {
            if (!schoolValidated()) {
                return;
            }

            axios.post('/scholen', {
                "school": {
                    "title": schoolName.value,
                    "description": CKEDITOR.instances["school-description"].getData(),
                    "opleidingen": VIEW.opleidingen
                }
            });

            location.href = '/admin/scholen/overzicht';
        },
        editSchool: function () {
            if (!schoolValidated()) {
                return;
            }

            var schoolId = document.getElementById('opleidingen-holder').dataset.schoolId;

            axios.post('/admin/scholen/' + schoolId, {
                "school": {
                    "title": schoolName.value,
                    "description": CKEDITOR.instances["school-description"].getData(),
                    "opleidingen": VIEW.opleidingen
                }
            });

            location.href = '/admin/scholen/overzicht';
        }
    };

    var schoolValidated = function () {
        return Validator.make({
            "School Naam": {
                "value": schoolName.value,
                "element": schoolName,
                "id": "school-name",
                "validate": ["empty"]
            },
            "School Beschrijving": {
                "value": CKEDITOR.instances["school-description"].getData(),
                "element": schoolDescription,
                "id": "school-description",
                "validate": ["empty"]
            }
        });
    };

    var events = function () {
        if (schoolButton !== null) {
            schoolButton.addEventListener('click', actions.createSchool, false);
        }

        if (schoolEditButton !== null) {
            schoolEditButton.addEventListener('click', actions.editSchool, false);
        }

    };

    return {
        init: function () {
            schoolButton = document.getElementById('make-school');
            schoolEditButton = document.getElementById('edit-school');

            if (schoolButton === null && schoolEditButton === null) {
                return;
            }

            schoolName = document.getElementById('school-name');
            schoolDescription = document.getElementById("school-description");

            events();
        }
    };
})(VALIDATOR.Validator);