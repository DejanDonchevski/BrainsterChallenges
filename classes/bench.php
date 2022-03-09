<?php

require_once __DIR__ . "/sofa.php";
require_once __DIR__ . "/../interfaces/printable.php";

class Bench extends Sofa implements Printable
{
    public function print() 
    {
        if($this->getIs_for_sleeping())
        {
            echo get_class($this) . ", is for sleeping." . " " . $this->area() . "cm2";
        } else {
            echo get_class($this) . ", sitting only," . " " . $this->area() . "cm2";
        }
    }

    public function sneakpeek()
    {
        echo get_class($this);
    }
    
    public function fullinfo()
    {
        if($this->getIs_for_sleeping())
        {
            echo get_class($this) . ", is for sleeping." . " " . $this->area() . "cm2, width:" . $this->getWidth() . "cm, length:" . $this->getLength() . "cm, length:" . $this->getHeight() . "cm, length:";
        } else {
            echo get_class($this) . ", sitting only." . " " . $this->area() . "cm2, width:" . $this->getWidth() . "cm, length:" . $this->getLength() . "cm, length:" . $this->getHeight() . "cm, length:";
        }
    }
}

$b1 = new Bench(2, 3, 4);
$b1->setIs_for_seating(true);
$b1->setIs_for_sleeping(false);
$b1->setSeats(4);
$b1->setArmrests(2);
$b1->setLength_opened(5);
$b1->print(); 
echo "<br />";
$b1->sneakpeek();
echo "<br />";
$b1->fullinfo();