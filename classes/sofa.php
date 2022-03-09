<?php

require_once __DIR__ . "/furniture.php";
require_once __DIR__ . "/../interfaces/printable.php";

class Sofa extends Furniture implements Printable
{
    private $seats;
    private $armrests;
    private $length_opened;

    public function getSeats()
    {
        return $this->seats;
    }
 
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    public function getArmrests()
    {
        return $this->armrests;
    }

    public function setArmrests($armrests)
    {
        $this->armrests = $armrests;

        return $this;
    }

    public function getLength_opened()
    {
        return $this->length_opened;
    }

    public function setLength_opened($length_opened)
    {
        $this->length_opened = $length_opened;

        return $this;
    }

    public function area_opened()
    {
        if($this->getIs_for_sleeping())
        {
            return $this->getWidth() * $this->length_opened;
        }

        return "This sofa is for sitting only, it has {$this->armrests} armrests and {$this->seats} seats.";
    }

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