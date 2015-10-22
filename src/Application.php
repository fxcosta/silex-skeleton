<?php
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => '../views'
]);

//$app->register(new Silex\Provider\DoctrineServiceProvider(), [
//    'db.options' => [
//        'driver'    => 'pdo_mysql',
//        'host'      => 'localhost',
//        'dbname'    => 'restbeer',
//        'user'      => 'root',
//        'password'  => 'root',
//        'charset'   => 'utf8',
//    ]
//]);

$app->register(new DoctrineServiceProvider, array(
    "db.options" => array(
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'restbeer',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8',
    ),
));

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => "/path/to/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "annotation",
                "namespace" => "App\\Beer\\",
                'use_simple_annotation_reader' => false,
                "path" => __DIR__."/src/Beer/",
            ),
        ),
    ),
));

$app->get('/doctrine', function() use($app) {
   return $app['orm.em'];
});

$app->register(new Silex\Provider\SerializerServiceProvider());

$app->register(new App\Beer\BeerServiceProvider());
$app->mount('/beer', new App\Beer\BeerControllerProvider());