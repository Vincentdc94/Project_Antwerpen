News = (function(){

    var hideButton = function(event){
        var newsItem = event.target;

        var newsButton = newsItem.getElementsByClassName('news-button')[0];
        newsButton.style.visibility = 'hidden';
        newsButton.style.opacity = 0;
    };

    var showButton = function(event){
        var newsItem = event.target;

        var newsButton = newsItem.getElementsByClassName('news-button')[0];
        newsButton.style.visibility = 'visible';
        newsButton.style.opacity = 1;
    };

    return{
        init: function(){
            var newsElements = document.getElementsByClassName("news-image");

            for(let newsIndex = 0; newsIndex < newsElements.length; newsIndex++){
                var newsImage = newsElements[newsIndex].getAttribute("src");
                var newsItem = newsElements[newsIndex].parentElement;

                newsItem.style.backgroundImage = 'url(' + newsImage +')';
                newsItem.style.backgroundSize = "cover";
                newsItem.addEventListener('mouseover', showButton, false);
                newsItem.addEventListener('mouseleave', hideButton, false);
            }
        }
    }
})();

module.exports = News;