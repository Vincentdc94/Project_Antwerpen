UI.Navigation = (function(){
    var navigationCloseButton;
    var navigationOpenButton;
    var navigation;
    var search;

    var closeNavigation = function(){
        navigation.classList.remove('navigation-show');
    };

    var openNavigation = function(){
        navigation.classList.add('navigation-show');
    };

    var events = function(){
        navigationCloseButton.addEventListener('click', closeNavigation, false);
        navigationOpenButton.addEventListener('click', openNavigation, false);
    };

    return{
        init: function(){
            navigationCloseButton = document.getElementById("navigation-close");
            navigationOpenButton = document.getElementById("menu-button");
            navigation = document.getElementById("navigation");

            events();
        }
    }
})();