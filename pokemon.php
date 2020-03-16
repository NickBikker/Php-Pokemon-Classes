<?php
class Pokemon
{
    public $name;
    public $energytype;
    public $hitpoint;
    public $health;
    public $attack;
    public $weakness;
    public $resistance;

    public function __construct($pokemonName, $energyType, $Hitpoints, $Attacks, $Weakness, $Resistance) {
        $this->name = $pokemonName;
        $this->energytype = $energyType;
        $this->hitpoint = $Hitpoints;
        $this->health = $this->hitpoint;
        $this->attack = $Attacks;
        $this->weakness = $Weakness;
        $this->resistance = $Resistance;
    }

    public function attack($target, $attack){
        echo $target->name. "'s remainging health: ".$target->health."<br>";

        echo 'pokemon '.$this->name.' doet '.$attack->name.' en levert '.$attack->damage.' damage aan '.$target->name.'<br>' ;

        $target->health = $target->health - $attack->damage;


        echo $target->name. "'s remainging health: ".$target->health."<br>";
    }






    public function __toString() {
        return json_encode($this);
    }
}

?>