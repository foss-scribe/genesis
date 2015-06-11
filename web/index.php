<?php


require_once __DIR__.'/../vendor/autoload.php';

//declare app
$app = new Silex\Application();

//enable debug mode
$app['debug'] = true;


//load app/providers.php
require_once __DIR__.'/../app/src/providers.php';


//load config		
$loadConfig = json_decode(file_get_contents(__DIR__.'/../app/config/settings.json'), true);

$app['session']->set('config', array(
			'templates_dir' => $loadConfig['templates'],
			'projects_dir' => $loadConfig['projects']
			));

//load routes
require_once __DIR__.'/../app/src/routes.php';


$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app->run();

?>
