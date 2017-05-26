VIEW.Profile = (function (Validator) {
    var profileUploadButton;
    var userId;
    var uploadErrorHolder;

    var profileFirstname;
    var profileLastname;
    var profileEmail;

    var validate = function(event){
        event.preventDefault();

        isValid =  Validator.make({
            "voornaam": {
                "value": profileFirstname.value,
                "element": profileFirstname,
                "id": "profile-firstname",
                "validate": ["empty"]
            },
            "achternaam": {
                "value": profileLastname.value,
                "element": profileLastname,
                "id": "profile-lastname",
                "validate": ["empty"]
            },
            "email": {
                "value": profileEmail.value,
                "element": profileEmail,
                "id": "profile-email",
                "validate": ["empty"]
            }
        });

        if(isValid){
            profileForm.submit();
        }
    };

    var uploadPic = function () {
        let formData = new FormData();

        formData.append('image', profileUploadButton.files[0]);

        axios.post('profiel/' + userId.value + '/foto/maken', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(function(response){
            document.getElementById('avatar-pic').src = response.data.image;
        }).catch(function(error){
            uploadErrorHolder.innerHTML = 'Afbeelding is te groot';
        });
    };

    var events = function () {
        profileUploadButton.addEventListener('change', uploadPic, false);
        profileForm.addEventListener('submit', validate, false);
    };

    return {
        init: function () {
            profileUploadButton = document.getElementById('profile-pic-file');

            if(profileUploadButton === null){
                return;
            }

            userId = document.getElementById('user-id');
            uploadErrorHolder = document.getElementById('upload-pic-error');

            profileForm = document.getElementById('profile-form');
            profileFirstname = document.getElementById('profile-firstname');
            profileLastname = document.getElementById('profile-lastname');
            profileEmail = document.getElementById('profile-email');

            events();
        }
    };
})(VALIDATOR.Validator);