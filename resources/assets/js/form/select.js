
FORM.Select = (function(){

    var select;

    var revealOptions = function(event){
        var currentDropdown = event.target;

        var currentDropdownOptions = event.target.nextSibling;

        if(currentDropdownOptions.style.visibility = "hidden"){
            currentDropdownOptions.style.visibility = "visible";
        }else{
            currentDropdownOptions.style.visibility = "hidden";
        }

        
    };

    var chooseOption = function(event){

        var currentOption = event.target;

        currentOption.parentNode.style.visibility = "hidden";


    }

    var makeOption = function(optionsHolder, currentOption){
        var newOption = document.createElement("div");
        newOption.dataset = currentOption.value;
        newOption.innerHTML = currentOption.innerHTML;
        newOption.className = "select-option";
        newOption.addEventListener("click", chooseOption, false);

        optionsHolder.appendChild(newOption);
    }

    var makeSelect = function(currentSelect){
        var newSelect = document.createElement("div");
        newSelect.className = "select";
        newSelect.addEventListener("click", revealOptions, false);

        var chevronDown = document.createElement("i");
        chevronDown.className = "fa fa-chevron-down float-right";
        chevronDown.style.color = "#555";


        var optionsHolder = document.createElement("div");
        optionsHolder.className = "select-options-holder";
        optionsHolder.style.visibility = "hidden";

        var options = currentSelect.getElementsByTagName("option");

        currentSelect.parentNode.insertBefore(newSelect, currentSelect.nextSibling);
        newSelect.parentNode.insertBefore(optionsHolder, newSelect.nextSibling);

        newSelect.innerHTML = options[0].value;
        newSelect.appendChild(chevronDown);

        for(let optionIndex = 0; optionIndex < options.length; optionIndex++){
            makeOption(optionsHolder, options[optionIndex]);
        }

        currentSelect.remove();
    };

    return{
        init: function(){
            var selects = document.getElementsByTagName("select");

            for(let selectIndex = 0; selectIndex < selects.length; selectIndex++){
                makeSelect(selects[selectIndex]);
            }
        }
    };

})();