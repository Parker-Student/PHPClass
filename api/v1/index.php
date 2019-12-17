<?php
require "Slim/Slim.php";
\Slim\Slim::registerAutoloader();

/*Put = update
 *Post = insert
 *Get = Select
 *Delete = Delete
*/

$app = new \Slim\Slim();

$app->get('/getRaces', 'getRaces');
$app->get('/getRunners/:getRunners', 'getRunners');
$app->post('/addRunners/:addRunners', 'addRunners');
$app->post('/deleteRunner', 'deleteRunner');
$app-> run();

function getRaces(){
    echo "Hello World";}




?>