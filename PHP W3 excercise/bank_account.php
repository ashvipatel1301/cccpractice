<?php

// Create a `BankAccount` class with properties for account number, account holder name, and balance. Include methods to deposit, withdraw, and display the account information. Implement proper validation for withdrawal (balance should not go below zero).

class BankAccount{
    public $accountNumber;
    public $holderName;
    public $balance;

    public function __construct($accountnumber,$accountholder,$initialBalance){
        // $this->var = $var;
        $this->accountNumber=$accountnumber;
        $this->holderName=$accountholder;
        $this->balance=$initialBalance;

    }

    public function deposit($amount){
        $this->balance += $amount;

    }
    public function withdraw($amount){

        if($amount<=$this->balance){

            $this->balance-=$amount;
        }else{
            echo "Insufficient fund for withdraw";

        }
    }
    public function displayinfo(){

        echo "Account_Number:$this->accountNumber , Account_holderName:$this->holderName , Balance_Amount:$this->balance Rs ";
     }

}

$account=new BankAccount(1234,"Ashvi",40000);

$account->displayinfo();
echo "<br>";

//deposit and withdraw
$account->deposit(10000);
$account->withdraw(5000);

$account->displayinfo();





?>