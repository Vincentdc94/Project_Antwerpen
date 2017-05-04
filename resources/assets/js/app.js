
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

/**
 * Form code zoals custom selects en andere ui greatness
 */
require('./form/form');
require('./form/select');
require('./form/textarea');
require('./form/campus');
require('./form/upload');

require('./view/view');
require('./view/campus');

(function(){
	TIM.experience.start();

	FORM.Select.init();
	FORM.Textarea.init();
	FORM.Campus.init();
	FORM.Upload.init();

	UI.Navigation.init();

	UI.Modal.init('media');
	UI.Modal.init('campus');


	UI.Slider.init('slider-sight', 1);
	UI.Media.init();

	VIEW.Campus.init();


	News.init();
})();
