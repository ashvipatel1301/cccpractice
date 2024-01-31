<?php

//Create an `Product` class with properties for product ID, name, and price. Create a `ShoppingCart` class to add products, calculate the total price, and display the items in the cart.
class Product{
        public $product_ID;
        public $name;
        public $price;

        public function __construct($Productid,$prodname,$price) {
                // $this->var = $var;
                $this->product_ID=$Productid;
                $this->name=$prodname;
                $this->price=$price;
        }
        public function getprice(){
                return $this->price;
        }
}
class Shoppingcart{
        private $items =[];
        public function additem($product){
                $this->items[]=$product;

        }
        public function calculatetotalprice(){
                $total=0;
                foreach($this->items as $item){
                        $total += $item->getprice();
                }
                return $total;

        }
        public function displayitemcart(){
                echo "Shopping cart items:\n";
                foreach($this->items as $item){
                        echo "{$item->getPrice()} - {$item->getPrice()} USD\n";

                }

        }

}

$product1=new Product(1,"laptop",50000);
$product2=new Product(2,"Iphone",100000);

$cart=new Shoppingcart();
$cart->additem($product1);
$cart->additem($product2);

$cart->displayitemcart();


    




?>