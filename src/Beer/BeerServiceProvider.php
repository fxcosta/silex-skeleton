<?php
namespace App\Beer;

use Doctrine\ORM\EntityManager;
use Silex\Application;
use Silex\ServiceProviderInterface;

class BeerServiceProvider implements ServiceProviderInterface
{
    public $em;

    public $service;

    public function __construct()
    {
    }

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['beer.service'] = function() use($app) {
            return new BeerService($app['orm.em']);
        };
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

    public function service()
    {

    }
}