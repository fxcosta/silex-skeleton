<?php

namespace App\Beer;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BeerController
{
    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function inject()
    {
        $data = $this->app['beer.service']->fetchAll();
        $code = 200;

        $data = $this->app['serializer']->serialize($data, 'json');

        //return $this->app->json($data, 200);
        return new Response($data, $code, ['Content-Type' => 'application/json']);
    }
}