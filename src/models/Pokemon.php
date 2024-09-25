<?php

class Pokemon extends PokemonRepository {
    private $id;
    private $name;

    public function __construct($id,$name){

        $this -> id = htmlspecialchars($id);
        $this -> setName($name);
        
    }
    public function getId(){
        return $this -> id; 
    }
    public function getName(){
        return $this -> name;
    }
    public function setName($name){
        $this ->name = htmlspecialchars($name);
    }
}

