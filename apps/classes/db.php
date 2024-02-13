<?php
namespace App\classes;
class db {
    public function db_connect(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "blog";
        $link = mysqli_connect( $host,$user,$pass,$db );
        return $link;
    }
}
?>
