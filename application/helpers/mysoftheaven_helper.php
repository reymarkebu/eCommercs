<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

if (!function_exists('active_menu_class')) {
	function active_menu_class($controller) {
		// Getting CI class instance.
		$CI = get_instance();
		// Getting router class to active.
		$class = $CI->router->fetch_class();
		return ($class == $controller) ? 'active' : '';
	}
}

if (!function_exists('active_menu_open')) {
	function active_menu_open($controller) {
		// Getting CI class instance.
		$CI = get_instance();
		// Getting router class to active.
		$class = $CI->router->fetch_class();
		return ($class == $controller) ? 'menu-open' : '';
	}
}

if (!function_exists('active_menu_method')) {
	function active_menu_method($method) {
		// Getting CI class instance.
		$CI = get_instance();
		// Getting router class to active.
		$class = $CI->router->fetch_method();
		return ($class == $method) ? 'active' : '';
	}
}
