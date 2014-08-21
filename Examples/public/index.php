<?php
/**
 * this is the public facing sample site single entry
 */
use Example\App\Todo;
use Slim\Slim;
require_once __DIR__ . '/../header.php';
$app = new Slim();
$app->get('/', function() {
    require_once __DIR__ . '/../templates/index.php';
});
$app->get('/todo', function() {
    echo 'Todo list here...';
});
// run it
$app->run();