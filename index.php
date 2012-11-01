<?php
session_start();

header("Content-type: text/html; charset=UTF-8");

// Initialize the class loader
require_once('Includes/SplClassLoader.php');
$loader = new SplClassLoader(NULL, 'Includes');
$loader->register();

// Load the config
$config = parse_ini_file('local.ini', true);

// Set debug mode options
if (isset($config['app']['debug']) && $config['app']['debug']) {
    ini_set('display_errors', 1);
}

// Initialize the database
\TinyDb\Db::set($config['database']['type'] . '://' . $config['database']['username'] . ':' . $config['database']['password'] . '@' .
                $config['database']['host'] . '/' . $config['database']['db']);

// Set some defines
define('WEB_DIR', dirname(__FILE__));
define('WEB_URI', \CuteControllers\Router::link('/', TRUE));

define('APP_URI', \CuteControllers\Router::get_app_uri());

define('ASSETS_DIR', WEB_DIR . '/assets');
define('ASSETS_URI', WEB_URI . '/assets');

define('UPLOADS_DIR', WEB_DIR . '/uploads');
define('UPLOADS_URI', WEB_URI . '/uploads');

define('INCLUDES_DIR', WEB_DIR . '/Includes');
define('INCLUDES_URI', WEB_URI . '/Includes');

define('TEMPLATE_DIR', ASSETS_DIR . '/tpl');
define('TEMPLATE_URL', ASSETS_URI . '/tpl');

set_include_path(INCLUDES_DIR . PATH_SEPARATOR . get_include_path());

// Start routing
try {
    \CuteControllers\Router::start(INCLUDES_DIR . '/StudentRND/CodeDay/Controllers');
} catch (\CuteControllers\HttpError $err) {
    if ($err->getCode() == 401) {
        \CuteControllers\Router::redirect('/login');
    } else {
        Header("Status: " . $err->getCode() . " " . $err->getMessage());
        if ($err->getCode() == 404) {
            $error = "File not found!";
        } else {
            $error = "Error: " . $err->getMessage();
        }
        include(TEMPLATE_DIR . '/error.php');
    }
} catch (\Exception $ex) {
    $error = "Error:<br />" . nl2br($ex);
    include(TEMPLATE_DIR . '/error.php');
}
