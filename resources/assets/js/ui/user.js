UI.User = (function(){
  /**
  *
  */

  var accountButton;
  var accountDropdownHolder;
  var dropdown;

  var showDropdown = function(){
    var dropdown = accountButton.parentNode.nextSibling;

    dropdown.nextSibling.classList.add('visible');
  }

  var hideDropdown = function(){
    accountDropdownHolder.classList.remove('visible');
  };

  var events = function(){
    accountButton.addEventListener('click', showDropdown, false);
    accountDropdownHolder.addEventListener('mouseleave', hideDropdown, false);
  };

  return{
    init: function(){
      accountButton = document.getElementById('menu-account-button');

      if(accountButton === null){
        return;
      }

      accountDropdownHolder = document.getElementsByClassName('select-account')[0];

      events();
    }
  }
})();
