VIEW.School = (function(){
    var schoolButton;


    var makeSchool = function(){
        axios.post('/')
    };

    var events = function(){
        schoolButton.addEventListener('click', makeSchool, false);
    };

    return{
        init: function(){
            schoolButton = document.getElementById('make-school');
        
            events();
        }
    };
})();