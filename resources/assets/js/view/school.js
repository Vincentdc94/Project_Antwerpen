VIEW.School = (function(Opleidingen){
    var schoolButton;
    
    var schoolName;

    var opleidingen = [];

    var makeSchool = function(){
        axios.post('/scholen', {"school": {
            "title": schoolName.value,
            "text": CKEDITOR.instances["school-description"].getData(),
            "opleidingen": opleidingen
        }});
    };

    var events = function(){
        schoolButton.addEventListener('click', makeSchool, false);
    };


    return{
        init: function(){
            schoolButton = document.getElementById('make-school');

            if(schoolButton === null){
                return;
            }

            schoolName = document.getElementById('school-name');
            
            opleidingen = Opleidingen.opleidingen;

            events();
        }
    };
})(FORM.Opleiding);