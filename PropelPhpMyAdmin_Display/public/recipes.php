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
	$view = new \Slim\Views\Twig('../templates', [
        'cache' => false
    ]);
	// Instantiate and add Slim specific extension (from the docs)
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

	return $view;
};

//////////////////////
// Routes
//////////////////////

$app->get('/',function($request,$response,$args){
        $query = RecipeQuery::create()->orderByName('asc');
        $this->view->render($response,'recipes.html',['query' => $query]);
        return $response;
    });


//***********************************************************************


    $app->get('/steps/{id}', function($request,$response,$args){
        $id = $args['id'];
        
        $recipe = RecipeQuery::create()->findPk($id);
        $steps = StepsQuery::create()->filterByRecipeId($id)->find();  

        $this->view->render($response,'steps.html', ['steps' => $steps, 'recipe' => $recipe]);
        return $response;
    });

//////////////////////
// Start app
//////////////////////

$app->run();