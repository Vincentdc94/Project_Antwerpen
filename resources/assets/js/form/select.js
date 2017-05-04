
FORM.Select = (function(){
    var select;

    var revealOptions = function(event){
        var currentDropdown = event.target;

        //Als child element is dan pak de select
        if(currentDropdown.parentNode.classList.contains("select")){
            currentDropdown = currentDropdown.parentNode;
        }

        var currentDropdownOptions = currentDropdown.nextSibling;

        if(currentDropdownOptions.classList.contains('visible')){
            currentDropdownOptions.classList.remove('visible');
        }else{
            currentDropdownOptions.classList.add('visible');
        }
    };

    var chooseOption = function(event){
        var currentOption = event.target;
        var currentSelect = event.target.parentNode.previousSibling;

        currentSelect.children[0].innerHTML = currentOption.innerHTML;
        currentSelect.children[1].value = currentOption.dataset.id;

        currentOption.parentNode.classList.remove('visible');
    };

    var makeOption = function(optionsHolder, currentOption){
        var newOption = document.createElement("div");
        newOption.dataset.id = currentOption.value;
        newOption.innerHTML = currentOption.innerHTML;
        newOption.className = "select-option";
        newOption.addEventListener('click', chooseOption, false);

        optionsHolder.appendChild(newOption);
    };

    var selectLeave = function(event){
        event.target.classList.remove('visible');
    };

    var makeSelect = function(currentSelect){
        var newSelect = document.createElement("div");
        newSelect.className = "select";
        newSelect.addEventListener('click', revealOptions, false);

        var newSelectInput = document.createElement('input');
        newSelectInput.type = 'hidden';
        newSelectInput.name = currentSelect.name;
        newSelectInput.id = currentSelect.id;

        var chevronDown = document.createElement("i");
        chevronDown.className = "fa fa-chevron-down float-right";
        chevronDown.style.color = "#555";

        var optionsHolder = document.createElement("div");
        optionsHolder.className = "select-options-holder";
        optionsHolder.addEventListener('mouseleave', selectLeave, false);

        var options = currentSelect.getElementsByTagName("option");

        currentSelect.parentNode.insertBefore(newSelect, currentSelect.nextSibling);
        newSelect.parentNode.insertBefore(optionsHolder, newSelect.nextSibling);

        newSelect.innerHTML = '<span class="select-value">' + options[0].innerHTML + '</span>';
        newSelectInput.value = options[0].value;

        newSelect.appendChild(newSelectInput);
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
