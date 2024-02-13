<?php 
require_once "../vendor/autoload.php";

$category = new \App\classes\category();
// Category Delete
if(isset($_GET["table"])){
    $id = $_GET["id"];
    $category->category_delete($id);
}

$blog = new \App\classes\blog();
// Category post
if(isset($_GET["blog"])){
    $id = $_GET["id"];
    $blog->detete_post($id);
    header("location: /all_blog.php");
}

?>