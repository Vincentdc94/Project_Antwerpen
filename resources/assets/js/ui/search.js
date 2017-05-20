UI.Search = (function(){

    var searchButton;
    var searchHolder;
    var searchVisible;

    var selectMenu;

    var showSearch = function(){
        if(searchVisible){
            // searchHolder.classList.remove('visible');
            searchHolder.style.display = "none";
            searchVisible = false;
        }else{
            // searchHolder.classList.add('visible');
            searchHolder.style.display = "block";
            searchVisible = true;
        }
    };

    var hideUser = function(){
        selectMenu.classList.remove('visible');
    };

    var events = function(){
        searchButton.addEventListener('click', showSearch, false);
        searchHolder.addEventListener('mouseleave', showSearch, false);
        searchHolder.addEventListener('mouseenter', hideUser, false);
    };

    return{
        init: function(){
            searchButton = document.getElementById('menu-search-button');

            if(searchButton === null || searchButton === undefined){
                return;
            }

            searchHolder = document.getElementById('search-holder');
            selectMenu = document.getElementById('select-account');

            searchHolder.style.display = "none";
            searchVisible = false;

            events();
        }
    };
})();