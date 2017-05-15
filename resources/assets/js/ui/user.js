UI.User = (function () {
  /**
   *
   */

  var accountButton;
  var accountDropdownHolder;
  var dropdown;

  var accountVisible;

  var showDropdown = function () {

    if (accountVisible) {
      accountDropdownHolder.classList.remove('visible');
      accountVisible = false;
    } else {
      accountDropdownHolder.classList.add('visible');
      accountVisible = true;
    }
    
  };

  var events = function () {
    accountButton.addEventListener('click', showDropdown, false);
    accountDropdownHolder.addEventListener('mouseleave', showDropdown, false);
  };

  return {
    init: function () {
      accountButton = document.getElementById('menu-account-button');

      if (accountButton === null) {
        return;
      }

      accountDropdownHolder = document.getElementById('select-account');
      accountVisible = false;

      events();
    }
  };
})();