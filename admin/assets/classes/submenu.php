<?php 
class sub_menu_show{
    public function blog_post($page){
        if( $page === 'all_blog.php' || $page === 'add_blog_post.php' || $page === 'category.php' || $page === 'tags.php'){
            return 'class="sub display_block"';
          }else{
            return 'class="sub"';
          };
    }
}