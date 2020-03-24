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

    public function __construct($databaseid, $pokemonName, $EnergyType, $Hitpoints, $Attacks, $Weakness, $Resistance) {
        $this->databaseid = $databaseid;
        $this->name = $pokemonName;
        $this->energytype = $EnergyType;
        $this->hitpoint = $Hitpoints;
        $this->health = $this->hitpoint;
        $this->attack = $Attacks;
        $this->weakness = $Weakness;
        $this->resistance = $Resistance;
    }

    public function attack($target, $attack){
       

       
if ($target->health <= 0) {
    $target->health = 0;
   echo $target->name.' is dood <br>';
}else{


            $finaldamage = '';
            
            if ($target->weakness->energytype->name == $this->energytype->name) {
                $finaldamage = $attack->damage * $target->weakness->multiplier;
                
            }else{
                $finaldamage = $attack->damage;
                if($this->energytype->name == $target->resistance->energytype->name){
                    $finaldamage = $attack->damage - $target->resistance->value;
                }
            }
            echo $target->name. "'s remainging health: ".$target->health."<br>";
            echo 'pokemon '.$this->name.' doet '.$attack->name.' en levert '.$finaldamage.' damage aan '.$target->name.'<br>' ;


            $target->health = $target->health - $finaldamage;
            if ($target->health <= 0) {
                $target->health = 0;
                echo $target->name.' is dood';
            }else{
                echo $target->name. "'s remainging health: ".$target->health."<br>";
            }
            
            

            
        }
    }

    public function getPopulation() {
        
    }






    public function __toString() {
        return json_encode($this);
    }
}

?>