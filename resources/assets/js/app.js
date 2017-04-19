
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./tim');

/**
 * Form code zoals custom selects en andere ui greatness
 */
require('./form/form')
require('./form/select');

(function(){

	TIM.experience.start();
	FORM.Select.init();
	
})();