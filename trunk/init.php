<?php
/* Directories */
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'] . 'pblog/');
define('DIR_LIB', DIR_ROOT . 'lib/');
define('DIR_MOD', DIR_ROOT . 'modules/');

define('CONFIG_FILE', DIR_ROOT . 'config.ini');

define('CONTROLLER_DIR', DIR_ROOT . 'public/controllers/');
define('MODELS_DIR', DIR_ROOT . 'public/models/');

define('SITE_LAYOUT', DIR_ROOT . Config::singleton()->get('config', 'layout'));


$request = new HttpRequest;
$fp = new FrontController;

function __autoload($class)
{
	if(strtolower($class) !== "mapper")
	{
		$class = str_replace('mapper', '', strtolower($class));
	}
		
	if(file_exists(DIR_LIB . $class . '.class.php'))
	{
		require_once DIR_LIB . $class . '.class.php';
		return true;
	}
	else if(file_exists(DIR_MOD . $class . '.class.php'))
	{
		require_once DIR_MOD . $class . '.class.php';
		return true;
	}
	else if(file_exists(CONTROLLER_DIR . $class . '.php'))
	{
		require_once CONTROLLER_DIR . $class . '.php';
		return true;
	}
	else if(file_exists(MODELS_DIR . $class . '.php'))
	{
		require_once MODELS_DIR . $class . '.php';
		return true;
	}
	else
	{
		echo 'Class ' . $class . ' was not found.<br />';
		echo 'I was looking in the following paths:<br />';
		echo DIR_LIB . $class . '.class.php<br />';
		echo DIR_MOD . $class . '.class.php<br />';
		echo CONTROLLER_DIR . $class . '.php<br />';
		echo MODELS_DIR . $class . '.php<br />';
	}
	return false;
}

