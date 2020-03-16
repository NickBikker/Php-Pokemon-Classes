<?php
class Resistance
{
    public $energytype;
    public $value;
 

    public function __construct($energyType, $Value) {
        $this->energytype = $energyType;
        $this->value = $Value;
        
    }
}

?>