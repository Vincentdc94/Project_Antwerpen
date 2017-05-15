
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
require('./form/opleiding');
require('./form/upload');
require('./form/article');

require('./view/view');
require('./view/campus');
require('./view/profile');
require('./view/users');
require('./view/school');

(function(){
	TIM.experience.start();

	FORM.Select.init();
	FORM.Textarea.init();

	FORM.Opleiding.init();
	FORM.Article.init();
	FORM.Upload.init();

	UI.Navigation.init();
	UI.User.init();

	UI.Modal.init('media');
	UI.Modal.init('opleiding');

	UI.Slider.init('slider-sight', 1);
	UI.Media.init();
	UI.SingleMedia.init();
	UI.Search.init();

	VIEW.Campus.init();
	VIEW.Profile.init();
	VIEW.Users.init();
	VIEW.School.init();
	
	News.init();
})();
