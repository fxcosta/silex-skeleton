<?php

$app->register(new App\Beer\BeerServiceProvider());
$app->mount('/beer', new App\Beer\BeerControllerProvider());