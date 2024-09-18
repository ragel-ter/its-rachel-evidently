<?php
use App\App;

require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config.php';

$app = new App($config);
$app->run();
