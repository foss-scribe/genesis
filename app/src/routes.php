<?php

$app->get('/', function() use ($app)
{

$config = $app['session']->get('config');

$templates = $app['session']->get('templates');

$worlds = $app['session']->get('worlds');

if (empty($worlds))
{
	return $app['twig']->render('form_create_world.twig', array(
			'page_title' => 'Genesis',
			'title' => 'Genesis',
			'config' => $config
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
