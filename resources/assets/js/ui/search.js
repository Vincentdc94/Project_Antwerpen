UI.Search = (function () {

    var searchButton;
    var searchHolder;
    var searchInput;
    var searchVisible;
    var searchOpened = false;

    var selectMenu;

    var hideSearch = function (event) {
        // searchHolder.classList.remove('visible');    

        $target = event.target;

        targetid = $target.id.toString();

        isSearch = false;

        console.log($target.id);
        //tamelijk quick en dirty 
        if(
            $target.id === 'search-input' || 
            $target.id === 'search-button' || 
            $target.id === 'search-content' || 
            $target.id === 'search-holder'
        ){
            isSearch = true;
        }

        if (searchOpened && !isSearch) {
            searchHolder.style.display = "none";
            searchVisible = false;
            searchOpened = false;
        }else{
            searchOpened = true;
        }

       
    };

    var showSearch = function () {
        // searchHolder.classList.add('visible');

        searchInput.focus();

        searchHolder.style.display = "block";

        document.addEventListener('click', hideSearch, false);

        searchVisible = true;

    };

    var hideUser = function () {
        selectMenu.classList.remove('visible');
    };

    var events = function () {
        searchButton.addEventListener('click', showSearch, false);
        searchHolder.addEventListener('mouseenter', hideUser, false);
    };

    return {
        init: function () {
            searchButton = document.getElementById('menu-search-button');

            if (searchButton === null || searchButton === undefined) {
                return;
            }

            searchHolder = document.getElementById('search-holder');
            selectMenu = document.getElementById('select-account');
            searchInput = document.getElementById('search-input');

            searchHolder.style.display = "none";
            searchVisible = false;

            events();
        }
    };
})();