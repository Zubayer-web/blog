<?php require_once 'header.php'; 

require_once "../vendor/autoload.php";

$post = new \App\classes\blog();


?>
<!--state overview start-->
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <div class="card-body">
                    <div class="alert alert-primary h2" role="alert">
                        All Blog Posts
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--main content start-->
    <div class="col-lg-12">
            <section class="card">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i>No</th>
                            <th><i class="fa fa-bullhorn"></i>Img</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> Title</th>
                            <th style="width: 350px"><i class="fa fa-bookmark"></i>Content</th>
                            <th><i class="fa fa-bookmark"></i> Category</th>
                            <th><i class=" fa fa-edit"></i> Tag</th>
                            <th><i class=" fa fa-edit"></i> Author</th>
                            <th><i class=" fa fa-edit"></i> status</th>
                            <th style="width: 150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php 
                            $number = 1;
                            $all_post = $post->showing_all_post();
                            while($row = mysqli_fetch_assoc($all_post)):
                        ?>                     
                        <tr>
                            <td><?php echo $number; ?></td>
                            <td><img width="50px" src="../upload/<?php echo $row['feature_image']; ?>" alt="<?php echo $row['post_title']; ?>"></td>
                            <td><?php echo $row['post_title']; ?></td>
                            <td><?php echo substr($row['post_content'], 0 ,100); ?>...</td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php echo $row['tag_name']; ?></td>
                            <td><?php echo $row['author_name']; ?></td>
                            <td><?php                             
                                    if($row['status'] == 1){
                                            echo "Active";
                                        }else{
                                            echo "Deactive";
                                    } 
                                 ?>
                            </td>                            
                            <td>
                                <?php if($row['status'] == 1):?>
                                        <a href="status.php?inactive=<?php echo $row['post_id']; ?>&blogdeactive=post" class="btn btn-warning btn-sm" title="Deactive"><i class="fa fa-times"></i></a>
                                    <?php else: ?>
                                        <a href="status.php?active=<?php echo $row['post_id']; ?>&blogactive=post" class="btn btn-success btn-sm" title="Active"><i class="fa fa-check"></i></a>
                                    <?php endif; ?>                          
                                
                                <a href="edit-blog.php?id=<?php echo $row['post_id']; ?>&blog=post" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="delete.php?id=<?php echo $row['post_id']; ?>&blog=post" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        <?php $number++;                    
                                endwhile; ?>
                        
                    </tbody>
                </table>
            </section>
        </div>
     



    <!--main content end-->

    <!-- page end-->
</section>
<!--state overview end-->
<?php require_once 'footer.php'; ?>