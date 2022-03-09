<?php

require_once __DIR__ . "/furniture.php";

class Sofa extends Furniture 
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
}

// $s1 = new Sofa(3, 6, 5);
// $s1->setIs_for_seating(true);
// $s1->setIs_for_sleeping(true);
// $s1->setSeats(3);
// $s1->setArmrests(2);
// $s1->setLength_opened(10);
// echo $s1->area();
// echo "<br />";
// echo $s1->volume();
// echo "<br />";
// echo $s1->area_opened();

// echo "<hr />";

// $s2 = new Sofa(4, 5, 6);
// $s2->setIs_for_seating(true);
// $s2->setIs_for_sleeping(false);
// $s2->setSeats(5);
// $s2->setArmrests(6);
// $s2->setLength_opened(10);
// echo $s2->area();
// echo "<br />";
// echo $s2->volume();
// echo "<br />";
// echo $s2->area_opened();