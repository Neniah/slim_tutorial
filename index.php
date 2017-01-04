<?php
require_once 'vendor/autoload.php';
$app = new \Slim\Slim();
$app->get("/hola/:name", function($name){
  echo "Hola ". $name;
});

function pruebaMiddle(){
  echo "I'm a middleware";

}

function pruebaTwo (){
  echo "I'm a middleware";

}

$app->get("/pruebas(/:uno/:dos)", 'pruebaMiddle', 'pruebaTwo', function($uno=NULL, $dos=NULL){
  echo $uno."<br>";
  echo $dos."<br>";
})->conditions(array(
  "uno" => "[a-zA-Z]*",
  "dos" => "[0-9]*"
));

$app->group("/api", function() use ($app){
  $app->group("/example", function() use ($app){
      $app->get("/hello/:name", function($name){
        echo "Hello " . $name;
      });
      $app->get("/say-something/:something", function($something){
        echo "Hello, " . $something;
      });
  });
});

$app->run();


?>
