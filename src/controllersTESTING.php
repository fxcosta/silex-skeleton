<?php

$app->register(new Silex\Provider\TwigServiceProvider(), [
   'twig.path' => '../views'
]);

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
   'db.options' => [
       'driver'    => 'pdo_mysql',
       'host'      => 'localhost',
       'dbname'    => 'restbeer',
       'user'      => 'root',
       'password'  => 'root',
       'charset'   => 'utf8',
   ]
]);

$app['bazi'] = function() {
    return new \App\Controllers\Bazi();
};

$app->get('/beer/{name}', function ($name) use ($app) {
    $service = $app['bazi'];
    return $app['twig']->render('index.twig', ['name' => $name]);
});

$app->get('/dbal', function() use($app) {
    $st = $app['db']->query("SELECT id, name FROM testing");
    $cat = $st->fetchAll(PDO::FETCH_KEY_PAIR);
    var_dump($cat);
});