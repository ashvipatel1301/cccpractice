<?php
class post{
    public $title;
    public $content;

    public function displayinfo(){
        echo "Title: $this->title , Content: $this->content";

    }

}
class blog{
    public $posts = [];

    public function addPost($post){
                $this->$posts[]=$post;
    }
    public function listAllPost(){
        foreach($this->$posts as $post){
            $post->displayinfo();
            echo "<br>";
        }
    }
}
$post1=new post();
$post1->title="Travel to manali";
$post1->content="This is blog related to travelling";
$post1->displayinfo();
echo "<br>";
$post2=new post();
$post2->title="Travel to shimla";
$post2->content="This is blog related to travelling on hills";
$post2->displayinfo();


$blog=new Blog();
$blog->addPost($post1);
$blog->addPost($post2);

$blog->listAllPost();

?>