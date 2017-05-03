UI.Media = (function(Modal){
  /**
  * Form
  */
  var mediaModal = Modal.Modals;
  var mediaLinkInput;
  var mediaFileInput;

  var uploadValue;

  var buttonAdd;
  var buttonReady;

  /**
  * Media items
  */
  var mediaHolder;
  var mediaItem;

  /**
  * Settings
  */

  // var isLink;

  /**
  * Data
  */

  var mediaData = [];

  var addMediaData = function(){
    if(mediaLinkInput.value === ''){
      mediaValue = mediaFileInput.value;
    }else{
      mediaValue = mediaLinkInput.value;
    }

    mediaData.push({
      "id": mediaData.length,
      "value": mediaValue,
      "isLink": isLink
    });

    mediaLinkInput.value = '';
    mediaFileInput.value = '';

    renderMedia();
  };

  var addMedia = function(id, value, isLink){
    var mediaLength = document.getElementsByClassName('media-item').length;
    var media = document.createElement('div');

    media.className = 'media-item';
    media.id = 'media-item-' + id;

    if(mediaLength === 0){
      mediaHolder.innerHTML = '';
    }

    media.innerHTML = '<div class="media-item-value">' + value + '</div>';

    var mediaDelete = document.createElement('div');
    mediaDelete.className = 'media-item-delete float-right';
    mediaDelete.innerHTML = '<i class="fa fa-close"></i>';
    mediaDelete.addEventListener('click', deleteMedia, false);

    media.appendChild(mediaDelete);

    var mediaInput = document.createElement('input');
    mediaInput.type = 'hidden';
    mediaInput.name = 'media[]';
    mediaInput.value = value;

    media.appendChild(mediaInput);
    mediaHolder.appendChild(media);
  }

  var renderMedia = function(){
    mediaHolder.innerHTML = '';

    for(let mediaIndex = 0; mediaIndex < mediaData.length; mediaIndex++){
      let media = mediaData[mediaIndex];
      addMedia(media.id, media.value, media.isLink);
    }
  };

  var setLink = function(){
    isLink = true;
    mediaFileInput.value = '';
    uploadValue.innerHTML = 'Upload Media';
  };

  var setUpload = function(event){
    isLink = false;
    uploadValue.innerHTML = mediaFileInput.value;
    mediaLinkInput.value = '';
  };

  var deleteMedia = function(event) {
    var mediaId;

    if(event.target.classList.contains('fa')){
      mediaId = event.target.parentNode.parentNode.id.split('-')[2];
    }else{
      mediaId = event.target.parentNode.id.split('-')[2];
    }


    for(let mediaIndex = 0; mediaIndex < mediaData.length; mediaIndex++){
      if(mediaData[mediaId].id === mediaId){
        mediaData.splice(mediaId, 1);
      }
    }

    renderMedia();
  };

  var mediaToFields = function() {
    var mediaInputHolder = document.getElementById('media-input-holder');
    for(let mediaIndex; mediaIndex < mediaData.length; mediaIndex++){
      var mediaInput = document.createElement('input');
      var mediaInputItem = mediaData[mediaIndex];

      console.log(mediaInputItem);


      if(mediaInputItem.isLink){
        mediaInput.type = 'hidden';
      }else{
        mediaInput.type = 'file';
        mediaInput.className = 'hidden';
      }

      mediaInputHolder.appendChild(mediaInput);
    }

    mediaModal.mediaModal.classList.remove('modal-show');
  };

  var events = function(){
    buttonAdd.addEventListener('click', addMediaData, false);
    buttonReady.addEventListener('click', mediaToFields, false);

    mediaLinkInput.addEventListener('change', setLink, false);
    mediaFileInput.addEventListener('change', setUpload, false);
  };

  return{
    init: function(){
      mediaFileInput = document.getElementById('media-file');
      mediaLinkInput = document.getElementById('media-link');

      uploadValue = document.getElementById('upload-value');

      buttonAdd = document.getElementById('media-add');
      buttonReady = document.getElementById('media-ready');

      mediaHolder = document.getElementById('media-item-holder');
      mediaItem = document.getElementsByClassName('media-item')[0];

      events();
    }
  };
})(UI.Modal);
