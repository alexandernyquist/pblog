<?php
/* Simple settings */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'pblog');

/* Directories */
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'] . 'pblog/');
define('DIR_LIB', DIR_ROOT . 'lib/');
define('DIR_MOD', DIR_ROOT . 'modules/');

define('SITE_LAYOUT', DIR_ROOT . 'public/views/layout.php');

define('CONTROLLER_DIR', DIR_ROOT . 'public/controllers/');
define('MODELS_DIR', DIR_ROOT . 'public/models/');

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');

/* The database types we support */
define('DB_TYPE_MYSQL', 'mysql');
define('DB_TYPE_SQLLITE', 'sqllite');

/* Define the db type we want to use */
define('DB_TYPE', DB_TYPE_MYSQL);
define('DB_SQLLITE_FILE', null);

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

