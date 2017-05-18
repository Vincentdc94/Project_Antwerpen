VIEW.School = (function(Opleidingen, Validator){
    var schoolButton;
    
    var schoolName;
    var schoolDescription;

    var opleidingen = [];

    var makeSchool = function(){
        if(!Validator.make({
            "School Naam": {
                "value": schoolName.value,
                "element": schoolName,
                "validate": ["empty"]
            },
            "School Beschrijving": {
                "value": CKEDITOR.instances["school-description"].getData(),
                "element": schoolDescription,
                "validate" : ["empty"]
            }
        })){
            return;
        }

        axios.post('/scholen', {"school": {
            "title": schoolName.value,
            "description": CKEDITOR.instances["school-description"].getData(),
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
            schoolDescription = document.getElementById("school-description");
            
            opleidingen = Opleidingen.opleidingen;

            events();
        }
    };
})(FORM.Opleiding, UTIL.Validator);