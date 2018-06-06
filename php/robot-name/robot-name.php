<?php 

class Robot
{

    public static $robotNames = [];

    public function __construct()
    {
        $this->name = $this->reset();
    }

    public function reset()
    {
        $ltr = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        shuffle($ltr);
        $name = $ltr[0] . $ltr[1] . rand(100, 999);
        if (in_array($name, Robot::$robotNames)) {
            return $this->reset();
        } else {
            Robot::$robotNames[] = $name;
        }
        return $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}