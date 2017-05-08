UI.SingleMedia = (function(){
    var mediaFileHolder;
    var mediaFile;
    var mediaFileValue;

    var mediaLink;
    var mediaType;

    var setFile = function(){
        file = mediaFile.value.split('\\');
        mediaFileValue.innerHTML = file[file.length - 1];
        mediaLinkInput.value = '';
    };

    var setLink = function(){
        mediaFileHolder.value = '';
        uploadValue.innerHTML = 'Kies Afbeelding voor upload';
    };
    
    var events = function(){
        mediaLink.addEventListener('change', setLink, false);
        mediaFileHolder.addEventListener('change', setFile, false);
    };

    return{
        init: function(){
            if(document.getElementById('single-media') === null){
                return;
            }

            mediaFileHolder = document.getElementById('media-file-holder');
            mediaFile = document.getElementById('media-file');
            mediaFileValue = document.getElementById('media-file-value');

            mediaLink = document.getElementById('media-link');
            mediaType = document.getElementById('media-type');            
        }
    };
})();