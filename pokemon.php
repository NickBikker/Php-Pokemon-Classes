<?php
class Pokemon
{
    private $databaseid;
    private $name;
    private $energytype;
    private $hitpoint;
    private $health;
    private $attack;
    private $weakness;
    private $resistance;

    public function __construct($databaseid, $pokemonName, $EnergyType, $Hitpoints, $Attacks, $Weakness, $Resistance) {
        $this->databaseid = $databaseid;
        $this->name = $this->setName($pokemonName);
        $this->energytype = $this->setenergytype($EnergyType);
        $this->hitpoint = $Hitpoints;
        $this->health = $this->hitpoint;
        $this->attack = $Attacks;
        $this->weakness = $this->setweakness($Weakness);
        $this->resistance = $this->setresistance($Resistance);
    }

    public function setName($PokemonName){
        $this->name = $PokemonName;
        return $this->name;
    }

    public function sethealth(){
        $this->health = $this->hitpoint;
        return $this->health;

    }

    public function setenergytype($EnergyType){
        $this->energytype = $EnergyType;
        return $this->energytype;
    }

    public function setdatabaseid($databaseid){
        $this->databaseid = $databaseid;
        return $this->databaseid;
    }

    public function setattack($Attacks){
        $this->attack = $Attacks;
        return $this->attack;
    }

    public function setweakness($Weakness){
        $this->weakness = $Weakness;
        return $this->weakness;
    }

    public function setresistance($Resistance){
        $this->resistance = $Resistance;
        return $this->resistance;
    }

    public function Getdbid(){
        return $this->databaseid;
    }


    public function GetName(){
        return $this->name;
        
    }

    public function Getenergytype(){
        return $this->energytype;
        
    }

    public function Getattack($i){
        return $this->attack[$i];
        
    }

    public function Getweakness(){
        return $this->weakness;
    }

    public function Getresistnace(){
        return $this->resistance;
        
    }

    static function Pokemonsmikkelsmakkel() {
        return "Welcome to Pokemon(the fucked up version)";
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
    

    public function __toString() {
        return json_encode($this);
    }
}



?>