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
        $this->name = $pokemonName;
        $this->energytype = $EnergyType;
        $this->hitpoint = $Hitpoints;
        $this->health = $this->hitpoint;
        $this->attack = $Attacks;
        $this->weakness = $Weakness;
        $this->resistance = $Resistance;
    }

    public function setName($PokemonName){
        $this->name = $PokemonName;
       
    }

    public function sethealth($Hitpoints){
        $this->health = $Hitpoints;
        

    }

    public function setenergytype($EnergyType){
        $this->energytype = $EnergyType;
        
    }

    public function setdatabaseid($databaseid){
        $this->databaseid = $databaseid;
        
    }

    public function setattack($Attacks){
        $this->attack = $Attacks;
        
    }

    public function setweakness($Weakness){
        $this->weakness = $Weakness;
        
    }

    public function setresistance($Resistance){
        $this->resistance = $Resistance;
        
    }

    public function getDbid(){
        return $this->databaseid;
    }


    public function getName(){
        return $this->name;
        
    }

    public function getEnergytype(){
        return $this->energytype;
        
    }

    public function getAttack($i){
        return $this->attack[$i];
        
    }

    public function getWeakness(){
        return $this->weakness;
    }

    public function getResistance(){
        return $this->resistance;
        
    }

    public function getHealth(){
        return $this->health;
    }




    static function Pokemonsmikkelsmakkel() {
        return "Welcome to Pokemon(the fucked up version)";
    }

    public function attack($target, $attack){

        $smikkel = '';
       

       
        if ($target->getHealth() <= 0) {
            $target->sethealth(0);
           $smikkel .= $target->getName().' is dood <br>';
        }else{
        
        
                    $finaldamage = '';
                    
                    if ($target->getWeakness()->getEnergytype()->getName() == $this->energytype->getName()) {
                        $finaldamage = $attack->getDamage() * $target->getWeakness()->getMultiplier();
                        
                    }else{
                        $finaldamage = $attack->getDamage();
                        if($this->energytype->getName() == $target->getResistance()->getEnergytype()->getName()){
                            $finaldamage = $attack->getDamage() - $target->getResistance()->getValue();
                        }
                    }
                    $smikkel .= $target->getName(). "'s remainging health: ".$target->getHealth()."<br>";
                    $smikkel .= 'pokemon '.$this->name.' doet '.$attack->getName().' en levert '.$finaldamage.' damage aan '.$target->getName().'<br>' ;
        
        
                    $target->setHealth($target->getHealth() - $finaldamage);
                    if ($target->getHealth() <= 0) {
                        $target->setHealth(0);
                        $smikkel .= $target->getName().' is dood';
                    }else{
                        $smikkel .= $target->getName(). "'s remainging health: ".$target->getHealth()."<br>";
                    }
                    
                    
        
                    
                }
                return $smikkel;
            }
    

    public function __toString() {
        return json_encode($this);
    }
}



?>