News = (function(){

    return{
        init: function(){
            var newsElements = document.getElementsByClassName("news-image");

            for(let newsIndex = 0; newsIndex < newsElements.length; newsIndex++){
                var newsImage = newsElements[newsIndex].getAttribute("src");
                var newsItem = newsElements[newsIndex].parentElement;

                newsItem.style.backgroundImage = 'url(' + newsImage +')';
                newsItem.style.backgroundSize = "cover";
            }
        }
    }
})();

module.exports = News;