Mobile = (function(){
    var $hero;
    var $heroText;

    var prevHeight;
    var prevMargin;

    var hero = function(){
        if(window.innerWidth < 860){
            $hero.style.height = window.innerHeight + "px";
            $heroText.style.marginTop = window.innerHeight - 550 + "px";
        }else{
            $hero.style.height = prevHeight;
            $heroText.style.marginTop = prevMargin;
        }
    };

    return{
        init: function(){
            $hero = document.getElementById('hero');
            if($hero !== null){
                $heroText = document.getElementById('hero-text');
                prevHeight = $hero.style.height;
                prevMargin = $heroText.style.marginTop;
                window.addEventListener('resize', function(){
                    hero();
                }, false)
            }  
        }
    };
})();