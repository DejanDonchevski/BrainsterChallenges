<?php

class Furniture 
{
    private $width;
    private $length;
    private $height;
    private $is_for_seating;
    private $is_for_sleeping;

    public function __construct($width, $length, $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function getIs_for_seating()
    {
        return $this->is_for_seating;
    }

    public function setIs_for_seating($is_for_seating)
    {
        $this->is_for_seating = $is_for_seating;

        return $this;
    }

    public function getIs_for_sleeping()
    {
        return $this->is_for_sleeping;
    }

    public function setIs_for_sleeping($is_for_sleeping)
    {
        $this->is_for_sleeping = $is_for_sleeping;

        return $this;
    }

    public function area()
    {
        return "{$this->length}" * "{$this->length}";
    }

    public function volume() 
    {
        return "{$this->area()}" * "{$this->height}";
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }
 
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }
}

$f1 = new Furniture(10, 5, 10);
$f1->setIs_for_seating(true);
$f1->setIs_for_sleeping(false);
// echo $f1->area();
// echo "<br />";
// echo $f1->volume();
// echo "<br />";
// echo "<hr />";