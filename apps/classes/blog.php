<?php 
 namespace App\classes;
 use App\classes\db;
use mysqli;

 class blog{

    public function add_blog($data){
        $post_title = $data['post_title'];
        $post_content = $data['contents'];
        $external_link = $data['external_link'];
        $category = $data['category'];
        $tag = $data['tag'];
        $status = $data['status'];       
        $author_name = $_SESSION['fname'];

        // File upload system
        $feature_image = $_FILES['feature_images']['name'];
        $name_explode = explode('.', $feature_image);
        $end = end($name_explode);
        $file_name = date('ymdhis.').$end;
        $tam_name = $_FILES['feature_images']['tmp_name'];

        $sql = "INSERT INTO `posts`( `post_title`, `post_content`, `external_link`, `feature_image`, `category`, `tags`, `status`, `author_name`) 
                VALUES ( '$post_title', '$post_content', '$external_link', '$file_name', '$category', '$tag', '$status', '$author_name' )";
        $result = mysqli_query((new db())->db_connect(), $sql);
        if($result){
            move_uploaded_file($tam_name, '../upload/'.$file_name);
            $blog_success = "Blog Save Successfully";
            return $blog_success;
        }else{
            $blog_error = "Have a problem";
            return $blog_error;
        }
    }

    public function blog_show_category(){
        $sql = "SELECT * FROM `category`";
        return mysqli_query( (new db())->db_connect(), $sql );
    }

    public function blog_show_tag(){
        $sql = "SELECT * FROM `tags`";
        return mysqli_query( (new db())->db_connect(), $sql );
    }

    public function showing_all_post(){
        $sql = "SELECT `posts`.*, `category`.`cat_name`, `tags`.`tag_name`
                FROM `posts` 
                INNER JOIN `category` ON `posts`.`category`= `category`.`cat_Id` 
                INNER JOIN `tags` ON `posts`.`tags` = `tags`.`tag_id` 
                ORDER BY `post_id`DESC";
        return mysqli_query( (new db())->db_connect(), $sql);
    }

    public function detete_post($id){
        $sql = "DELETE FROM `posts` WHERE `post_id` = $id";
        mysqli_query( (new db())->db_connect(), $sql);
    }
    
    public function status_inactive($id){
        $sql = "UPDATE `posts` SET `status`= 0 WHERE `post_id` = $id";
        mysqli_query( (new db())->db_connect(), $sql);
    }

    public function status_active($id){
        $sql = "UPDATE `posts` SET `status`= 1 WHERE `post_id` = $id";
        mysqli_query( (new db())->db_connect(), $sql);
    }

    public function post_showing( $id ){
        $sql = "SELECT * FROM `posts` WHERE `post_id` = $id";
        return mysqli_query((new db())->db_connect(), $sql);
    }
    public function update_blog($data){
        $up_title = $data['update_title'];
        $up_content = $data['update_contents'];
        $up_link = $data['update_link'];
        $up_category = $data['update_category'];
        $up_tag = $data['update_tag'];
        $up_status = $data['update_status'];
        $post_id = $data['post_id'];
        

        if( $_FILES['update_feature_images']['name'] == NULL ){
            $sql = "UPDATE `posts` SET `post_title`='$up_title',`post_content`='$up_content',`external_link`='$up_link',`category`='$up_category',`tags`='$up_tag',`status`='$up_status' WHERE `post_id` = $post_id";
            mysqli_query((new db())->db_connect(), $sql);
        }else{
            $feature_image = $_FILES['update_feature_images']['name'];
            $name_explode = explode('.', $feature_image);
            $end = end($name_explode);
            $file_name = date('ymdhis.').$end;
            $tam_name = $_FILES['update_feature_images']['tmp_name'];
            move_uploaded_file($tam_name, '../upload/'.$file_name);
            $sql = "UPDATE `posts` SET `post_title`='$up_title',`post_content`='$up_content',`external_link`='$up_link',`feature_image`='$file_name',`category`='$up_category',`tags`='$up_tag',`status`='$up_status' WHERE `post_id` = $post_id";
            mysqli_query((new db())->db_connect(), $sql);
        }
        
    }
    // frontend 
    public function active_post_show(){
        $sql = "SELECT * FROM `posts` WHERE `status` = 1 ORDER BY `post_id` DESC";
        return mysqli_query((new db())->db_connect(), $sql);
    }

    public function single_page_post($id){
        $sql = "SELECT * FROM `posts` WHERE `post_id` = $id";
        return mysqli_query((new db())->db_connect(), $sql);
    }

    public function category_archive($id){
        $sql ="SELECT * FROM `posts` WHERE `status` = 1 AND `post_id` = $id";
        return mysqli_query((new db())->db_connect(), $sql);
    }
    
    public function serch_results($text){
        $sql ="SELECT * FROM `posts` WHERE `post_content` LIKE '%$text%' OR `post_title` LIKE '%$text%'AND `status` = 1 ORDER BY `post_id` DESC";
        return mysqli_query((new db())->db_connect(), $sql);
    }


 }

?>