<?php
namespace App\Beer;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class BeerControllerProvider implements ControllerProviderInterface
{
    const INDEX_CONTENT_TYPE = "application/json; profile=/schema/index.json";

    protected $app;

    protected $controller;

    public function __construct()
    {
//        $this->controller = new BeerController();
    }

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $this->app = $app;
        $controllers = $app['controllers_factory'];

        $controllers->get('/cerveja', [$this, "index"]);
        $controllers->get('/inject', [$this->app['beer.controller'], "inject"]);
        $controllers->get('/test', function() {
            return $this->app['beer.service']->hello();
        });

        return $controllers;
    }

    public function index()
    {
        $index = array(
            "title" => "shoppingcart",
            "description" => "Welcome to the shoppingcart service",
        );

        return $this->app->json($index, 200, array("Content-Type" => self::INDEX_CONTENT_TYPE));
    }
}