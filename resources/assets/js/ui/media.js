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

  var mediaInputHolder;
  var mediaHolder;
  var mediaItem;

  /**
  * Settings
  */

  var isLink;

  /**
  * Data
  */

  /**
  * Validation
  */

  var mediaAddMessage;

  var mediaData = [];

  var addMediaData = function(){
    if(!isValid()){
      validateMessages();
      return;
    }

    if(mediaLinkInput.value === ''){
      mediaFile = mediaFileInput.value.split('\\')
      mediaValue = mediaFile[mediaFile.length - 1];

      uploadFile(mediaFileInput.value);
    }else{
      mediaValue = mediaLinkInput.value;
    }

    mediaData.push({
      "id": mediaData.length.toFixed(),
      "value": mediaValue,
      "isLink": isLink
    });

    mediaLinkInput.value = '';
    mediaFileInput.value = '';

    renderMedia();
  };

  var isValid = function(){
    if(mediaLinkInput.value !== '' || mediaFileInput.value !== ''){
      return true;
    }

    return false;
  };

  var validateMessages = function(){};

  var addMedia = function(id, value, isLink){

    var mediaLength = document.getElementsByClassName('media-item').length;
    var media = document.createElement('div');

    uploadValue.innerHTML = 'Kies Afbeelding voor upload';

    media.className = 'media-item';


    media.id = 'media-item-' + id;

    if(mediaLength === 0){
      mediaHolder.innerHTML = '';
    }

    if(isLink){
      media.dataset.type = 'link';
      media.innerHTML = '<label>Link</label>';
    }else{
      media.dataset.type = 'file';
      media.innerHTML = '<label>Uploaded</label>';
    }

    media.innerHTML += '<div class="media-item-value">' + value + '</div>';

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

    mediaToFields();
  };

  var uploadFile = function(){
    let formData = new FormData()
    console.log(mediaFileInput.files[0]);
    formData.append('image', mediaFileInput.files[0]);

    axios.post('/media/upload', formData,{
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  };

  var setLink = function(){
    isLink = true;
    mediaFileInput.value = '';
    uploadValue.innerHTML = 'Kies Afbeelding voor upload';
  };

  var setUpload = function(event){
    isLink = false;
    file = mediaFileInput.value.split('\\');
    uploadValue.innerHTML = file[file.length - 1];
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
      if(mediaData[mediaIndex].id === mediaId){
        mediaData.splice(mediaId, 1);
      }
    }

    for(let mediaIndex = 0; mediaIndex < mediaData.length; mediaIndex++){
      mediaData[mediaIndex].id = mediaIndex.toFixed();
    }

    renderMedia();
  };

  var mediaToFields = function() {
    mediaInputHolder.innerHTML = '';
    var mediaInputValue = document.getElementById('media-input-value');

    for(let mediaIndex = 0; mediaIndex < mediaData.length; mediaIndex++){
      var mediaInput = document.createElement('input');
      var mediaInputItem = mediaData[mediaIndex];

      if(mediaInputItem.isLink){
        mediaInput.type = 'hidden';
        mediaInput.value = mediaData[mediaIndex].value;
      }else{
        mediaInput.type = 'file';
        mediaInput.className = 'hidden';
      }

      mediaInputHolder.appendChild(mediaInput);
    }
  };

  var events = function(){
    buttonAdd.addEventListener('click', addMediaData, false);
    // buttonReady.addEventListener('click', mediaToFields, false);

    mediaLinkInput.addEventListener('change', setLink, false);
    mediaFileInput.addEventListener('change', setUpload, false);
  };

  return{
    mediaData: mediaData,
    init: function(){

      mediaHolder = document.getElementById('media-item-holder');

      if(mediaHolder === null){
        return;
      }

      mediaInputHolder = document.getElementById('media-input-holder');
      mediaItem = document.getElementsByClassName('media-item')[0];

      mediaFileInput = document.getElementById('media-file');
      mediaLinkInput = document.getElementById('media-link');

      uploadValue = document.getElementById('upload-value');

      buttonAdd = document.getElementById('media-add');
      // buttonReady = document.getElementById('media-ready');



      events();
    }
  };
})(UI.Modal);
