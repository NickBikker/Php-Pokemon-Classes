<?php
class Energytype
{
    private $name;


    public function __construct($typename) {
        $this->name = $typename;
    }



    public function getName(){
        return $this->name;
    }

}

?>