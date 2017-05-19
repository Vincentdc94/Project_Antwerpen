VIEW.School = (function(Validator){
    var schoolButton;
    var schoolEditButton;
    
    var schoolName;
    var schoolDescription;

    var schoolValidated = function(){
        return Validator.make({
            "School Naam": {
                "value": schoolName.value,
                "element": schoolName,
                "id": "school-name",
                "validate": ["empty"]
            },
            "School Beschrijving": {
                "value": CKEDITOR.instances["school-description"].getData(),
                "element": schoolDescription,
                "id": "school-description",
                "validate" : ["empty"]
            }
        });
    };

    var createSchool = function(){
        if(!schoolValidated()){
            return;
        }

        axios.post('/scholen', {"school": {
            "title": schoolName.value,
            "description": CKEDITOR.instances["school-description"].getData(),
            "opleidingen": VIEW.opleidingen
        }});

        location.href = '/admin/scholen/overzicht';
    };

    var editSchool = function(){
        if(!schoolValidated()){
            return;
        }

        var schoolId = document.getElementById('opleidingen-holder').dataset.schoolId;

        console.log(VIEW.opleidingen);

        axios.post('/admin/scholen/' + schoolId, {
            "school": {
                "title": schoolName.value,
                "description": CKEDITOR.instances["school-description"].getData(),
                "opleidingen": VIEW.opleidingen
            }
        });
        
        location.href = '/admin/scholen/overzicht';
    };

    var events = function(){
        if(schoolButton !== null){
            schoolButton.addEventListener('click', createSchool, false);
        }
        
        if(schoolEditButton !== null){
            schoolEditButton.addEventListener('click', editSchool, false);
        }
        
    };


    return{
        init: function(){
            schoolButton = document.getElementById('make-school');
            schoolEditButton = document.getElementById('edit-school');

            if(schoolButton === null && schoolEditButton === null){
                return;
            }

            schoolName = document.getElementById('school-name');
            schoolDescription = document.getElementById("school-description");
            

            console.log(VIEW.opleidingen);

            events();
        }
    };
})(VALIDATOR.Validator);