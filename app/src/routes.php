<?php

$app->get('/', function() use ($app)
{

return $app['twig']->render('home.twig', array(
			'page_title' => 'Genesis',
			'title' => 'Genesis',
		));

});

?>
