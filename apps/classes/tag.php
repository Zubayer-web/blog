<?php 
namespace App\classes;
use App\classes\db;
use mysqli;

class tag{

    public function add_tag($data){
        $tag_name = $data['tag_name'];  
        $query = "SELECT * FROM `tags` WHERE `tag_name` = '$tag_name'";
        $result = mysqli_query((new db())->db_connect(), $query);
        $tag_exgist = mysqli_num_rows($result);
        if( $tag_exgist >= 1 ){
            $error = "Tag already have";
            return $error;
            header("location: ../admin/tags.php");
        }else{
            $sql = "INSERT INTO `tags`( `tag_name`) VALUES ('$tag_name')";
            mysqli_query((new db())->db_connect(), $sql);
        }
    }
    public function show_tag(){
        $sql = "SELECT * FROM `tags`";
        return mysqli_query((new db())->db_connect(), $sql);
    }



}