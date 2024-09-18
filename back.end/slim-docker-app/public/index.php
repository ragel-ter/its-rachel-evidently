<?php

use App\App;
use App\CV\Controller as CVController;

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config.php';
$controllers = [
    'cv' => new CVController($config)
];
$app = new App($config, $controllers);
$app->run();
