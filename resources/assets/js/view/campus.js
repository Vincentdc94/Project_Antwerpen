VIEW.Campus = (function(){
  var campusHolder;

  var selectCampus = function(event){
    let id = event.target.id.split('-')[1];

    let campus = document.getElementById('campus-holder-' + id);

    campusTitle = campus.children[1].value;
    campusDescription = campus.children[2].value;

    campusContactAdres = campus.children[3].value;
    campusContactEmail = campus.children[4].value;
    campusContactTel = campus.children[5].value;

    document.getElementById('campus-title').innerHTML = campusTitle;
    document.getElementById('campus-description').innerHTML = campusDescription;

    document.getElementById('campus-contact-adres').innerHTML = campusContactAdres;
    document.getElementById('campus-contact-email').innerHTML = campusContactEmail;
    document.getElementById('campus-contact-tel').innerHTML = campusContactTel;
  };

  return{
    init: function(){
      campusHolder = document.getElementById('campus-holder');

      if(campusHolder === null || campusHolder === undefined){
        return;
      }
      
      var campusElements = campusHolder.children;

      for(let campusIndex = 0; campusIndex < campusElements.length; campusIndex++){
        var campusButton = campusElements[campusIndex].children[0];
        campusButton.addEventListener('click', selectCampus, false);
      }
    }
  }
})();
