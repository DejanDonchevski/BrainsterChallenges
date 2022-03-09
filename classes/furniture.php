<?php

class Furniture 
{
    private $width;
    private $length;
    private $height;
    private $is_for_sitting;
    private $is_for_sleeping;

    public function __construct($width, $length, $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function getIs_for_sitting()
    {
        return $this->is_for_sitting;
    }

    public function setIs_for_sitting($is_for_sitting)
    {
        $this->is_for_sitting = $is_for_sitting;

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
