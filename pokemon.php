<?php
abstract class Pokemon
{
    public $databaseid;
    public $name;
    public $energytype;
    public $hitpoint;
    public $health;
    public $attack;
    public $weakness;
    public $resistance;

    public function __construct($databaseid, $pokemonName, $EnergyType, $Hitpoints, $Attacks, $Weakness, $Resistance) {
        $this->databaseid = $databaseid;
        $this->name = $this->setName($pokemonName);
        $this->energytype = $EnergyType;
        $this->hitpoint = $Hitpoints;
        $this->health = $this->hitpoint;
        $this->attack = $Attacks;
        $this->weakness = $Weakness;
        $this->resistance = $Resistance;
    }

    private function setName($PokemonName){
        $this->name = $PokemonName;
        return $this->name;

    }

    public function GetName(){
        return $this->name;
        
    }

    static function Pokemonsmikkelsmakkel() {
        return "Welcome to Pokemon(the fucked up version)";
    }



   

    public function getPopulation() {
        
    }

    public function __toString() {
        return json_encode($this);
    }
}



?>