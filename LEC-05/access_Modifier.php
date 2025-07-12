<?php

class Myclass{
    public $name;
    private $pin;

    public function showInfo()
    {
        echo "Pin Code is : ".$this->pin. "<br>Name is: " .$this-> name;
    }

    public function setPin($mypin)
    {
        $this->pin = $mypin;
    }
}


$emp1 = new Myclass();
$emp1->name = "Mr. Rahim";
$emp1->setPin(10001);
$emp1->showInfo();





?>