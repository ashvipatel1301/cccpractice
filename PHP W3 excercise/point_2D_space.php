<?php

class point{
    public $x1;
    public $y1;


    public function calculateDistance(point $new){
            return sqrt(pow($this->x1-$new->x2,2)+pow($this->y1-$new->y2,2));
    }

}
$point1=new point();
$point1->x1=1;
$point1->y1=2;

$point2=new point();
$point2->x2=4;
$point2->y2=6;

echo $point1->calculateDistance($point2);





?>
