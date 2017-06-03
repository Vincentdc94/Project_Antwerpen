UI.Navigation = (function(){
    var navigationCloseButton;
    var navigationOpenButton;
    var navigation;
    var search;

    var closeNavigation = function(){
        navigation.classList.remove('navigation-show');
        navigation.classList.add('navigation-hide');
    };

    var openNavigation = function(){
        navigation.classList.remove('navigation-hide');
        navigation.classList.add('navigation-show');
    };

    var events = function(){
        navigationCloseButton.addEventListener('click', closeNavigation, false);
        navigationOpenButton.addEventListener('click', openNavigation, false);
    };

    return{
        init: function(){
            navigationOpenButton = document.getElementById("menu-navigation");

            if(navigationOpenButton === null){
                return;
            }

            navigationCloseButton = document.getElementById("navigation-close");
            navigation = document.getElementById("navigation");

            events();
        }
    };
})();