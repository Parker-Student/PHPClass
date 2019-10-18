<?php
class Car{
    public $color;
    public $make;
    public $model;
    public $year;
    public $status;

    function __construct()
    {
        $this->status = "stopped";
    }

    function forward(){
        echo "The car is moving forward";
        $this->status = "forwards";
    }
    function reverse(){
        echo "The car is moving backwards";
        $this->status = "backwards";
    }
    function stop(){
        echo "The car is stopped";
        $this->status = "stopped";
    }

}

$myCar = new Car();
$myCar->color = "Yellow";
$myCar->make = "Jeep";
$myCar->model = "Wrangler";
$myCar->year = "2010";

echo"My " . $myCar->make . " is a " . $myCar->year . "<br> <br> <br>";
echo $myCar -> forward();
echo "<br><br><br>";
echo $myCar->status;
