VIEW.MediaBrowser = (function (Modals) {
    var mediabrowserHolder;
    var mediaChosen = new Event('mediachosen');

    var mediaTypeInput = document.getElementById('media-type');
    var mediaLinkInput = document.getElementById('media-link');
    var mediaFileInput = document.getElementById('media-file');
    var mediaUploadButton = document.getElementById('mediabrowser-upload');

    var buttonDelete;

    var actions = {
        getMedia: function () {
            VIEW.media = [];
            
            axios.get("/media/all").then(function (response) {
                for (var dataIndex = 0; dataIndex < response.data.media.length; dataIndex++) {
                    selectedMedia = response.data.media[dataIndex];

                    var mediaItem = {
                        "id": selectedMedia.id,
                        "type": selectedMedia.type,
                        "url": selectedMedia.url
                    };

                    VIEW.media.push(mediaItem);
                }

                render();
            });

        },
        deleteMedia: function () {
            axios.post('/media/delete', {
                "media": VIEW.selectedMedia
            });

            actions.getMedia();
        },
        addMedia: function () {
            let formData = new FormData();

            formData.append("type", mediaTypeInput.value);
            formData.append("url", mediaLinkInput.value);
            formData.append('file', mediaFileInput.files[0]);

            axios.post('/media/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            actions.getMedia();
        }
    };

    var selectMedia = function (event) {
        var mediaItem;

        if (event.target.parentNode.classList.contains('media-item')) {
            mediaItem = event.target.parentNode;
        } else if (event.target.classList.contains('media-item')) {
            mediaItem = event.target;
        } else {
            return;
        }

        if (mediaItem.classList.contains('media-item-selected')) {
            mediaItem.classList.remove('media-item-selected');
        } else {
            mediaItem.classList.add('media-item-selected');
        }

    };

    var createMediaItem = function (id, value) {

        var mediaLength = document.getElementsByClassName('media-item').length;
        var media = document.createElement('div');

        media.className = 'media-item';

        media.id = 'media-item-' + id;
        media.dataset.mediaId = id;

        media.innerHTML += '<div class="media-item-value">' + value + '</div>';
        media.innerHTML += '<input type="hidden" name="media-item[]" />';

        media.addEventListener('click', selectMedia, false);

        // var mediaDelete = document.createElement('div');
        // mediaDelete.className = 'media-item-delete float-right';
        // mediaDelete.innerHTML = '<i class="fa fa-close"></i>';
        // mediaDelete.addEventListener('click', actions.deleteMedia, false);

        // media.appendChild(mediaDelete);

        var mediaInput = document.createElement('input');
        mediaInput.type = 'hidden';
        mediaInput.name = 'media[]';
        mediaInput.value = value;

        return media;
    };

    var chooseMedia = function () {
        VIEW.selectedMedia = [];

        var selectedMediaItems = document.getElementsByClassName('media-item-selected');

        for (let selectedMediaIndex = 0; selectedMediaIndex < selectedMediaItems.length; selectedMediaIndex++) {
            var mediaId = selectedMediaItems[selectedMediaIndex].dataset.mediaId;

            VIEW.selectedMedia.push(VIEW.media[selectedMediaIndex]);

        }

        Modals.mediabrowserModal.classList.remove('modal-show');
        document.dispatchEvent(mediaChosen);

    };

    var render = function () {
        mediabrowserHolder.innerHTML = '';

        for (let mediaIndex = 0; mediaIndex < VIEW.media.length; mediaIndex++) {
            var mediaItem = createMediaItem(
                VIEW.media[mediaIndex].id,
                VIEW.media[mediaIndex].url
            );

            mediabrowserHolder.appendChild(mediaItem);
        }
    };

    var events = function () {
        document.addEventListener('mediaload', actions.getMedia, false);

        buttonChoose.addEventListener('click', chooseMedia, false);
        buttonDelete.addEventListener('click', actions.deleteMedia, false);
        mediaUploadButton.addEventListener('click', actions.addMedia, false);

    };

    return {
        createMediaItem: createMediaItem,
        mediaChosenEvent: mediaChosen,
        init: function () {
            mediabrowserHolder = document.getElementById('mediabrowser-holder');

            if(mediabrowserHolder === null || mediabrowserHolder === undefined){
                return;
            }
            
            buttonChoose = document.getElementById('mediabrowser-choose');
            buttonDelete = document.getElementById('mediabrowser-delete');
            buttonClose = document.getElementById('modal-mediabrowser-close');

            events();
        }
    };

})(UI.Modals);