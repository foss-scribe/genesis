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

//get templates, we only want json files
$templates = glob($loadConfig['templates'] . '/*.json');

//get worlds, we want directories
$worlds = scandir($loadConfig['projects']);
//remove first two keys
unset($worlds[0]);
unset($worlds[1]);


$app['session']->set('templates', $templates);
$app['session']->set('worlds', $worlds);

unset($templates);
unset($world);

//load routes
require_once __DIR__.'/../app/src/routes.php';


$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app->run();

?>
