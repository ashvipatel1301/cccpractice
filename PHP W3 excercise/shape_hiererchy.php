<?php
class Shape{

}
class circle extends Shape{
    public $radius;

    public function circleParemeter(){
        return 2*pi()*$this->radius;
    }
    public function circleArea(){
        return pi() *pow($this->radius,2);
    }


}
class rectangle extends Shape{
    public $width;
    public $length;

    public function rectangleParemeter(){
        return 2*($this->width + $this->length);
    }

    public function rectangleArea(){
        return $this->width*$this->length;
    }




}
// $circle=new circle();
// $circle->radius=7;

// echo $circle->circleParemeter();
// echo "<br>";
// echo $circle->circleArea();

$rect=new rectangle();
$rect->width=10;
$rect->length=10;
echo $rect->rectangleParemeter();
echo "<br>";
echo $rect->rectangleArea();

?>