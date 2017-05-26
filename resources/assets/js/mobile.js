Mobile = (function(){
    var $hero;

    var hero = function(){
        if(window.innerWidth < 860){
            $hero.style.height = window.innerHeight + "px";
            document.getElementById('hero-text').style.marginTop = window.innerHeight - 550 + "px";
        }
    };

    return{
        init: function(){
            $hero = document.getElementById('hero');
            if($hero !== null){
                hero();
            }
            
        }
    };
})();