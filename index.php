<?php
require_once 'vendor/autoload.php';
$app = new \Slim\Slim();
$app->get("/hola/:name", function($name){
  echo "Hola ". $name;
});

$app->get("/pruebas/:uno/:dos", function($uno, $dos){
  echo $uno."<br>";
  echo $dos."<br>";
});
$app->run();
?>
