VIEW.Users = (function(){

    var submitRole = function(event){
        var submitId;

        if(event.target.classList.contains('fa')){
            submitId = event.target.parentNode.id;
        }else{
            submitId = event.target.id;
        }
        
        var roleId = submitId.replace('submit-', '');
        var role = document.getElementById(roleId);

        
        userLast = roleId.split('-').length - 1;
        userId = roleId.split('-')[userLast];

        axios.post('/admin/gebruikers/' + userId, {
            "_method": "PATCH",
            "role": role.value
        });

        location.reload();
    };

    return{
        init: function(){
            var roles = document.getElementsByClassName('user-new-role');
            var submits = document.getElementsByClassName('user-new-role-submit');

            for(let submitIndex = 0; submitIndex < submits.length; submitIndex++){
                submits[submitIndex].addEventListener('click', submitRole, false);
            }
        }
    };
})();