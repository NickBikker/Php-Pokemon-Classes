<?php
class Weakness
{

    private $energytype;
    private $multiplier;


    public function __construct($Energytype, $multipliervalue) {
        $this->energytype = $Energytype;
        $this->multiplier = $multipliervalue;
    }

    public function getEnergytype(){
        return $this->energytype;
    }

    public function getMultiplier(){
        return $this->multiplier;
    }
}



?>