
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./tim');

/**
 * News
 */

require('./news');

/**
 * Utility code voor algemene operaties
 */

require('./validator/init');
require('./validator/empty');
require('./validator/validator');

/**
 * UI code voor alle zotte ui elementen
 */

require('./ui/ui');
require('./ui/navigation');
require('./ui/modal');
require('./ui/slider');
require('./ui/media');
require('./ui/singlemedia');
require('./ui/user');
require('./ui/search');

/**
 * Form code zoals custom selects en andere ui greatness
 */
require('./form/form');
require('./form/select');
require('./form/textarea');
require('./form/upload');


/**
 * Code voor alle posts, gets en ajax geladen views
 */

require('./view/view');
require('./view/article');
require('./view/opleiding');
require('./view/profile');
require('./view/users');
require('./view/school');
require('./view/mediabrowser');

(function(){
	TIM.experience.start();

	UI.Modal.init('media');
	UI.Modal.init('opleiding');
	UI.Modal.init('mediabrowser');

	FORM.Select.init();
	FORM.Textarea.init();
	FORM.Upload.init();

	UI.Navigation.init();
	UI.User.init();

	UI.Slider.init('slider-sight', 1);
	UI.Media.init();
	UI.SingleMedia.init();
	UI.Search.init();

	VIEW.Profile.init();
	VIEW.Users.init();
	VIEW.Opleiding.init();
	VIEW.School.init();
	VIEW.Article.init();
	VIEW.MediaBrowser.init();
	
	News.init();
})();
