<?php
class Pokemon
{
    public $databaseid;
    public $name;
    public $energytype;
    public $hitpoint;
    public $health;
    public $attack;
    public $weakness;
    public $resistance;

    public function __construct($databaseid, $pokemonName, $energyType, $Hitpoints, $Attacks, $Weakness, $Resistance) {
        $this->databaseid = $databaseid;
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

       

        $finaldamage = '';


        if ($target->weakness->energytype->name == $this->energytype->name) {
            $finaldamage = $attack->damage * $target->weakness->multiplier;
            
        }else{
            $finaldamage = $attack->damage;
            if($this->energytype->name == $target->resistance->energytype->name){
                $finaldamage = $attack->damage - $target->resistance->value;

            }
            
            
        }

        $target->health = $target->health - $finaldamage;

        echo 'pokemon '.$this->name.' doet '.$attack->name.' en levert '.$finaldamage.' damage aan '.$target->name.'<br>' ;

        echo $target->name. "'s remainging health: ".$target->health."<br>";
        
        
    }

    public function getPopulation() {
        
    }






    public function __toString() {
        return json_encode($this);
    }
}

?>