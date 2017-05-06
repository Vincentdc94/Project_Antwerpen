VIEW.Profile = (function () {
    var profileUploadButton;
    var userId;
    var uploadErrorHolder;

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
    };

    return {
        init: function () {
            profileUploadButton = document.getElementById('profile-pic-file');

            if(profileUploadButton === null){
                return;
            }

            userId = document.getElementById('user-id');
            uploadErrorHolder = document.getElementById('upload-pic-error');

            events();
        }
    };
})();