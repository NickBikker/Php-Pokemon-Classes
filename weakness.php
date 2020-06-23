<?php
class Weakness extends Energytype
{

  
    private $multiplier;


    public function __construct($Energytype, $multipliervalue) {
        $this->name = $Energytype;
        $this->multiplier = $multipliervalue;
    }


    public function getMultiplier(){
        return $this->multiplier;
    }
}



?>