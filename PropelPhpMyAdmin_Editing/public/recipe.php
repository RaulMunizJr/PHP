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

    //********************************************************************

    $app->get('/steps/{id}', function($request,$response,$args){
        $id = $args['id'];
        
        $recipe = RecipeQuery::create()->findPk($id);
        $steps = StepsQuery::create()->filterByRecipeId($id)->find();  

        $this->view->render($response,'steps.html', ['steps' => $steps, 'recipe' => $recipe]);
        return $response;
    });

//****************************************For Editing Recipes***************************************************//


    //////////////////////
    // AJAX handlers
    //////////////////////


    $app->get('/handlers/edit_recipe/{id}/{name}', function($request, $response, $args) {
        $rid = RecipeQuery::create()->findPk($args['id']);
        $rid->setName($args['name']);
        $rid->save();
	});


    //********************************************************************


    $app->get('/handlers/edit_step/{id}/{desc}', function($request, $response, $args) {
        $recipe_id = StepsQuery::create()->findPk($args['id']);
        $recipe_id->setDescription($args['desc']);
        $recipe_id->save();
    });


    //********************************************************************


    $app->get('/handlers/add/{id}/{desc}', function($request, $response, $args) {
        $s = new Steps();
        $s->setRecipeId($args['id']);
        $s->setDescription($args['desc']);
        $s->save();

    });
    
    //////////////////////
    // Start app
    //////////////////////

    $app->run();