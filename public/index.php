<?php

// Autoload dependencies with composer
require '../vendor/autoload.php';

// importing dependencies.php
require '../src/dependencies.php';

// Create a slim app
$app = new \Slim\App;

// Routes
require '../src/routes.php';

$app->run();

?>