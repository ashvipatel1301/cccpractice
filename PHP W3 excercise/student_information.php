<?php

// class student{
//     public function displayinfo($name,$age,$grade,$sem){
//         echo "Name:$name , Age:$age , Grade:$grade , Sem:$sem";
//     }

// }

// $obj = new student();
// $obj->displayinfo("Ashvi",21,'distinction',8);
class student{
     public $name;
    //  public $age;
    //  public $grade;

   public function displayinfo(){
        echo "Name:$this->name , Age:$this->age , Grade:$this->grade";
    }
}
$stu=new student();
$stu->name="Ashvi";
$stu->age=21;
$stu->grade='A';
$stu->displayinfo();

?>