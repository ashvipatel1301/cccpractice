<?php

class Book{

    public $book_name;
    public $author;

    public function displayinfo(){
        echo "Book Name:$this->book_name  , Author Name:$this->author" ; 

    }
}
class Library{

    private $books = [];

    public function addbook($book){
        $this->$books[] = $book;

    }
   public function displayAllBooks(){

    foreach($this->books as $book){
        $book->displayinfo();
        echo "<br>";
    }

   }


}
$book1=new Book();
$book1->book_name="The India Story";
$book1->author="Bimal Jalal";
$book1->displayinfo();

$book2=new Book();
$book2->book_name="A Place Called Home";
$book2->author="Preeti Shenoy";
$book2->displayinfo();


$lib=new Library();
$lib->addbook($book1);
$lib->addbook($book2);

$lib->displayAllBooks();

?>