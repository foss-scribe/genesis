<?php

$app->get('/', function() use ($app)
{

$config = $app['session']->get('config');

//set templates
$templates = $app['session']->get('templates');

$worldTemplates = json_decode(file_get_contents($templates[1]), true);

$worlds = $app['session']->get('worlds');

if (empty($worlds))
{
	
	//echo "<pre>";
	//print_r($worldTemplates);
	//echo "</pre>";

	return $app['twig']->render('form_create_world.twig', array(
			'page_title' => 'Genesis',
			'title' => 'Genesis',
			'config' => $config,
			'fieldset' => $worldTemplates['default']
		));
} elseif (!$config['current_world'])
{
	//no world selected
} else
{
	//we should in theory be good to go with worlds in the pot and
	//one selected

	return $app['twig']->render('home.twig', array(
			'page_title' => 'Genesis',
			'title' => 'Genesis',
			'config' => $config
		));
}





});

?>
