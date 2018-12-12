<?php
require '../vendor/autoload.php';
require '../generated-conf/config.php';

//////////////////////
// Slim Setup
//////////////////////

$settings = ['displayErrorDetails' => true];

$app = new \Slim\App(['settings' => $settings]);

$container = $app->getContainer();
$container['view'] = function($container) {
	$view = new \Slim\Views\Twig('../templates');
	
	$basePath = rtrim(str_ireplace('index.php', '', 
	$container->get('request')->getUri()->getBasePath()), '/');

	$view->addExtension(
	new Slim\Views\TwigExtension($container->get('router'), $basePath));
	
	return $view;
};

//////////////////////
// Routes
//////////////////////

// home page route
$app->get('/', function ($request, $response, $args) {
	$this->view->render($response, 'home.html');
	return $response;
})->setName('home');

//////////////////////
// AJAX Handlers
//////////////////////

$app->post('/login',function($request, $response, $args){
	$username = $request->getParam('user');
	$password = $request->getParam('pass');
	
	$user = UserQuery::create()->findOneByUsername($username);
	if($user != null)
	{
		if($user->login($password))
		{
			return $response->withJson(['Authenticated' => 1, 'User' => $user->toArray()]);
		}else {
			return $response->withJson(['Authenticated' => 0]);
		}	
	}
	else{
		//Create new user if !found
		print("Create a new user");
		$user = new User();
		$user->setUserName($username);
		$user->setPassword($password);
		$user->save();
	}

});





//////////////////////
// App run
//////////////////////

$app->run();
