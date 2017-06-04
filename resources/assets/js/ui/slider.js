UI.Slider = (function(){
    var elements = [];
    var slider;
    var itemNumber;
    var sliderIndex = 0;
    var contentHolder;
    var previousButton;
    var nextButton;

    var slideNext = function(){
        if(sliderIndex >= elements.length - 1){
            sliderIndex = 0;
        }else{
            sliderIndex++;
        }

        renderSlider();
    };

    var slidePrevious = function(){
        if(sliderIndex <= 0){
            sliderIndex = elements.length - 1;
        }else{
            sliderIndex--;
        }

        renderSlider();
    };

    var getContentHolder = function(){
        var sliderElements = slider.childNodes;

        for(let sliderChild = 0; sliderChild < sliderElements.length; sliderChild++){
            if(sliderElements[sliderChild].className === "slider-content"){
                return sliderElements[sliderChild];
            }
        }
        return null;
    };

    var loadElements = function(){
        contentHolder = getContentHolder();
        var contentItems = contentHolder.getElementsByClassName('slider-item');

        for(let contentItem = 0; contentItem < contentItems.length; contentItem++){
            elements.push(contentItems[contentItem]);
        }

        while (contentHolder.firstChild) {
            contentHolder.removeChild(contentHolder.firstChild);
        }
        
    };

    var renderSlider = function(){
        while (contentHolder.firstChild) {
            contentHolder.removeChild(contentHolder.firstChild);
        }

        if(itemNumber === 1){
             contentHolder.appendChild(elements[sliderIndex]);
        }else{
            for(let sliderItem = 0; sliderItem <= itemNumber; sliderItem++){
                contentHolder.appendChild(elements[sliderIndex + sliderItem]);
            }
        }
        
    };

    var events = function(){
        //Check elementen of ze er zijn want soms kan je niet sliden met 1 item
        if(previousButton !== null){
            previousButton.addEventListener('click', slidePrevious, false);
        }
        
        if(nextButton !== null){
            nextButton.addEventListener('click', slideNext, false);
        }
        
    };

    return {
        init: function(sliderName, maxNumberInSlider){
            slider = document.getElementById(sliderName);

            if(slider === null){
                return;
            }
            
            previousButton = document.getElementById('slide-previous');
            nextButton = document.getElementById('slide-next');

            itemNumber = maxNumberInSlider;

            loadElements();
            renderSlider();
            events();

            

            
        }
    };
})();