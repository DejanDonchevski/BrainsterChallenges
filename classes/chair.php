<?php

require_once __DIR__ . "/furniture.php";
require_once __DIR__ . "/../interfaces/printable.php";

class Chair extends Furniture implements Printable
{
    public function print() 
    {
        if($this->getIs_for_seating())
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
    }
}

$c1 = new Chair(1, 2, 3);
$c1->setIs_for_seating(true);
$c1->setIs_for_sleeping(false);
$c1->print();
echo "<br />";
$c1->sneakpeek();