<?php require_once 'header.php'; 
      require_once '../vendor/autoload.php';
      $blog = new \App\classes\blog(); 
      if(isset($_GET['blog'])){
        $id = $_GET['id'];
        $result = $blog->post_showing($id);
      }     
      $row_blog = mysqli_fetch_assoc($result);  
      
      if(isset($_POST['update_blog'])){
        $blog->update_blog($_POST);
      }

?>


<section class="wrapper">
    <!-- page start-->

    <div class="row">
        <div class="col-lg-10">
            <section class="card">
                <header class="card-header">
                    Update Post
                </header>

                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <input type="hidden" name="post_id" value="<?php echo $row_blog['post_id']; ?>">
                            <label for="post_title" class="col-sm-2 col-form-label">Post Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="post_title" name="update_title" value="<?php echo $row_blog['post_title']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contents" class="col-sm-2 col-form-label">Contents</label>
                            <div class="col-sm-10">
                                <!--Summernote start-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <section class="card">
                                            <div class="card-body" style="padding: inherit">
                                                <textarea name="update_contents" id="contents" class="summernote"><?php echo $row_blog['post_content']; ?></textarea>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <!--Summernote end-->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="external_link" class="col-sm-2 col-form-label">External link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="external_link" name="update_link" value="<?php echo $row_blog['external_link']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="feature_image" class="col-sm-2 col-form-label">Feature image</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="update_feature_images" class="custom-file-input"
                                        id="feature_image">
                                    <label class="custom-file-label" for="feature_image">Choose Feature Image</label>
                                    <img width="150px" height="100px" src="../upload/<?php echo $row_blog['feature_image']; ?>" alt="<?php echo $row_blog['post_title']; ?>">
                                </div>
                            </div>
                        </div>
                        <?php  
                            $category = new \App\classes\category();                           
                            $result = $category->show_category();                        
                        ?>

                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control mb-2" id="category" name="update_category">
                                    <?php while( $cat_row = mysqli_fetch_assoc($result) ): ?>
                                    <option <?php if($cat_row['cat_Id'] == $row_blog['category']){echo 'selected';} else{echo '';} ?> value="<?php echo $cat_row['cat_Id'] ?>"><?php echo $cat_row['cat_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <?php
                         $tag = new \App\classes\tag();
                         $result = $tag->show_tag();                        
                        ?>

                        <div class="form-group row">
                            <label for="tag" class="col-sm-2 col-form-label">Tags</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control mb-2" id="tag" name="update_tag">
                                    <?php while($tag_row = mysqli_fetch_assoc($result)): ?>
                                    <option  <?php if($tag_row['tag_id'] == $row_blog['tags']){ echo 'selected';}else{echo '';} ?> value="<?php echo $tag_row['tag_id'];?>"><?php echo $tag_row['tag_name'];?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="update_status" id="active" value="1" 
                                            <?php echo $row_blog['status'] == 1 ? 'checked' : ''?>>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="update_status" id="deactive"
                                            value="0" <?php echo $row_blog['status'] == 0 ? 'checked' : ''?>>
                                        <label class="form-check-label" for="deactive">
                                            Deactive
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="update_blog" class="btn btn-primary">Update Post</button>
                            </div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>

    <!-- page end-->
</section>

<?php require_once 'footer.php'; ?>