<?php

$app->get('/', function() use ($app)
{

$config = $app['session']->get('config');

return $app['twig']->render('home.twig', array(
			'page_title' => 'Genesis',
			'title' => 'Genesis',
			'config' => $config
		));

});

?>
