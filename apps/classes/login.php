<?php 
namespace App\classes;

use App\classes\db;


class login {
    public function user_check_login($data){    
        $username = $data['username'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM `user` WHERE `u_name`= '$username' AND `password` = '$password'";
        $result = mysqli_query((new db())->db_connect(), $sql);

        if( $result ){
            if( mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['fname'] = $row['f_name'];
                $_SESSION['lname'] = $row['l_name'];
                $_SESSION['uname'] = $row['u_name'];
                $_SESSION['email'] = $row['email'];
                header("Location: index.php");
            }else{
                $error_massage = "Username or Password Invalid!";
                return $error_massage;
            }
        }else{
            die();
        }
     }
}