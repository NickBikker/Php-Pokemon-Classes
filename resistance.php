<?php
class Resistance
{
    private $energytype;
    private $value;
 

    public function __construct($energyType, $Value) {
        $this->energytype = $energyType;
        $this->value = $Value;
        
    }

    public function getEnergytype(){
        return $this->energytype;
    }

    public function getValue(){
        return $this->value;
    }
}

?>