<?php
session_start();

header("Content-type: text/html; charset=UTF-8");

// Initialize the class loader
require_once('Includes/SplClassLoader.php');
$loader = new SplClassLoader(NULL, 'Includes');
$loader->register();

// Load the config
$config = parse_ini_file('local.ini', true);
\StudentRND\CodeDay\Application::$config = $config;

// Set debug mode options
if (isset($config['app']['debug']) && $config['app']['debug']) {
    ini_set('display_errors', 1);
}

// Initialize the database
\TinyDb\Db::set($config['database']['type'] . '://' . $config['database']['username'] . ':' . $config['database']['password'] . '@' .
                $config['database']['host'] . '/' . $config['database']['db']);

if (isset($config['app']['tz'])) {
    date_default_timezone_set($config['app']['tz']);
} else {
    date_default_timezone_set('America/Los_Angeles');
}

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

define ('TEMPLATE_TEMP_DIR', WEB_DIR . '/.tmp/tpl');

set_include_path(INCLUDES_DIR . PATH_SEPARATOR . get_include_path());

// Load the template engine
$loader = new Twig_Loader_Filesystem(TEMPLATE_DIR);

if (isset($config['app']['debug']) && $config['app']['debug']) {
    $twig_conifg = array(
                'debug' => TRUE
            );
} else {
    $twig_conifg = array(
                'cache' => TEMPLATE_TEMP_DIR,
            );
}
\StudentRND\CodeDay\Application::$twig = new Twig_Environment($loader, $twig_conifg);
if (isset($config['app']['debug']) && $config['app']['debug']) {
    \StudentRND\CodeDay\Application::$twig->addExtension(new Twig_Extension_Debug());
}

$current = explode('/', \CuteControllers\Request::current()->uri);
$current = '/' . $current[count($current) - 1];
\StudentRND\CodeDay\Application::$twig->addGlobal('current_page', $current);
\StudentRND\CodeDay\Application::$twig->addGlobal('config', $config);

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
