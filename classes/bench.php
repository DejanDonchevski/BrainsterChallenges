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
            echo get_class($this) . ", is for sleeping." . " " . $this->area() . "cm2, width:" . $this->getWidth() . "cm, length:" . $this->getLength() . "cm, height:" . $this->getHeight() . "cm";
        } else {
            echo get_class($this) . ", sitting only." . " " . $this->area() . "cm2, width:" . $this->getWidth() . "cm, length:" . $this->getLength() . "cm, height:" . $this->getHeight() . "cm";
        }
    }
}

