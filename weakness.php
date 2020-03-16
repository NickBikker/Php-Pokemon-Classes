<?php
class Weakness
{

    public $energytype;
    public $multiplier;


    public function __construct($Energytype, $multipliervalue) {
        $this->energytype = $Energytype;
        $this->multiplier = $multipliervalue;
    }
}

?>