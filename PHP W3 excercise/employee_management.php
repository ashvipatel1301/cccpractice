<?php
class Employee{
public $name;
public $salary;
public $designation;

public function calculateYearlyBonous(){

      return $this->salary*0.1 ;   //10% yearly bonous

}


}

$emp=new Employee();
$emp->name="Ashvi";
$emp->salary=50000;
$emp->designation="Software Developer";
echo $emp->calculateYearlyBonous();

?>