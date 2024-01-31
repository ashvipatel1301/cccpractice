<?php

class File{
        public $filename;
        public $size;

        public function displayfile(){
            echo "File Name:$this->filename , File_size:$this->size KB";

        }
        public function getFileExtension(){
            $parts=explode(".",$this->filename);
            return end($parts);
        }
    }
$file=new File();
$file->filename="document.php";
$file->size=1024;
$file->displayfile();
echo "<br>";
echo "File Extension: ". $file->getFileExtension();

?>