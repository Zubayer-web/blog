<?php 
require_once '../vendor/autoload.php';

// category
$category = new \App\classes\category();
if(isset($_GET['active'])){
    $id = $_GET['active'];
    $category->active_status($id);
    header("Location: category.php");    
}
if(isset($_GET["inactive"])){
    $id = $_GET['inactive'];
    $category->inactive_status($id);
    header("Location: category.php");   
}   
// blog
$blog = new \App\classes\blog();
if(isset($_GET['blogdeactive'])){
 $id = $_GET['inactive'];
 $blog->status_inactive($id);
 header("Location: all_blog.php");
}
if(isset($_GET['blogactive'])){
    $id = $_GET['active'];
    $blog->status_active($id);
    header("Location: all_blog.php");
}