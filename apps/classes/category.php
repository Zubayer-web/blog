<?php
namespace App\classes;
use App\classes\db;

class category{
    // backend
    public function inset_catagory($data){
       $cat_name = $data['cat_name'];
       $cat_desc = $data['cat_desc'];
       $cat_status = $data['status'];

       $sql = "INSERT INTO `category`( `cat_name`, `cat_desc`, `status`) VALUES ('$cat_name','$cat_desc','$cat_status')";        
       
      $resut =  mysqli_query((new db())->db_connect(), $sql);
      if($resut === true){
        $cat_sucess = "Category add sucessful";
        return $cat_sucess;
      }else{
        $cat_error = "Category not sucessful";
        return $cat_error;
      }
    }   

    public function show_category(){
        $sql = "SELECT * FROM `category`";
        $resut = mysqli_query((new db())->db_connect(), $sql);
        return $resut;
    }

    public function category_delete($id){
        $sql = "DELETE FROM `category` WHERE `cat_Id` = $id";
        mysqli_query((new db())->db_connect(), $sql);
        header("Location: category.php");
    }

    public function edit_data_show($id){
        $sql = "SELECT * FROM `category` WHERE `cat_Id` = '$id'";
        $resut = mysqli_query((new db())->db_connect(), $sql);
        return $resut;
    }

    public function update_category($data){
        $id = $data['cat_id'];
        $upname = $data['up_name'];
        $updecs = $data['up_name'];
        $upstatus = $data['up_name'];
        $uptime = date("Y-m-d H:i:s");
        $sql = "UPDATE `category` SET `cat_name`='$upname',`cat_desc`='$updecs',`status`='$upstatus',`up_time`='$uptime' WHERE `cat_Id` = $id";
        $resut = mysqli_query((new db())->db_connect(), $sql);
        if($resut === true){         
          $up_sucess = "Category Update Sucessful";
          return $up_sucess;
        }else{
          $up_error = "Category Update fall!";
          return $up_error;
        }      
    }

    public function active_status($id){
      $sql = "UPDATE `category` SET `status` = 1 WHERE `cat_Id` = $id";
      mysqli_query((new db())->db_connect(),$sql);
    }
    
    public function inactive_status($id){
      $sql = "UPDATE `category` SET `status` = 0 WHERE `cat_Id` = $id";
      mysqli_query((new db())->db_connect(), $sql);
    }

    // frontend
    public function show_active_category() {
      $sql = "SELECT * FROM `category` WHERE `status` = 1";
      return mysqli_query((new db())->db_connect(), $sql);
    }
    public function show_category_for_single($cat_id){
      $sql = "SELECT * FROM `category` WHERE `cat_Id` = $cat_id";
      return mysqli_query((new db())->db_connect(), $sql);
    }
}