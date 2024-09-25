<?php 

require_once("../src/models/db.php");
require_once("../src/models/repository/PokemonRepository.php");
require_once("../src/models/Pokemon.php");
require_once("../src/controllers/Controller.php");
require_once("../src/controllers/MainController.php");
require_once("../core/Router.php");

try{
    $app = new Router();
    $app ->start();
}catch (PDOException $e){
    die($e->getMessage());
}

?>