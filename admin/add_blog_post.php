<?php 
    require_once 'header.php'; 
    require_once '../vendor/autoload.php';
    $blog = new \App\classes\blog();
?>

<!--state overview start-->

<!--main content start-->

<section class="wrapper">
    <!-- page start-->

    <div class="row">
        <div class="col-lg-10">
            <?php
                    if(isset($_POST['add_blog'])){
                        $notifaction = $blog->add_blog($_POST);
                    }
                ?>
            <section class="card">
                <header class="card-header">
                    Add Post
                    <p><?php 
                        if(isset($notifaction)){
                            echo $notifaction;
                            echo '<a href="all_blog.php" class="btn btn-primary ml-5">All Blog</a>';
                        }
                    ?></p>
                </header>

                <div class="card-body">
                    <form id="form" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="post_title" class="col-sm-2 col-form-label">Post Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="post_title" name="post_title">
                                <small id="post_title_error" class="form-text text-muted"></small>
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
                                                <textarea name="contents" id="contents" class="summernote"></textarea>
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
                                <input type="text" class="form-control" id="external_link" name="external_link">
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="feature_image" class="col-sm-2 col-form-label">Feature image</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" name="feature_images" class="custom-file-input"
                                        id="feature_image">
                                    <label class="custom-file-label" for="feature_image">Choose Feature Image</label>
                                    <small id="feature_image_error" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control mb-2" id="category" name="category">
                                    <option selected>Select Category</option>
                                    <?php                                     
                                        $categorirs = $blog->blog_show_category();                                      
                                        while($row = mysqli_fetch_assoc($categorirs)){
                                            echo '<option value="'. $row['cat_Id'] .'">'. $row['cat_name'] .'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tag" class="col-sm-2 col-form-label">Tags</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control mb-2" id="tag" name="tag">
                                    <option value="">Select tag</option>
                                    <?php                                     
                                        $tags = $blog->blog_show_tag();                                      
                                        while($row = mysqli_fetch_assoc($tags)){
                                            echo '<option value="'. $row['tag_id'] .'">'. $row['tag_name'] .'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1"
                                            checked>
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="deactive"
                                            value="0">
                                        <label class="form-check-label" for="deactive">
                                            Deactive
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="add_blog" class="btn btn-primary">Save Post</button>
                            </div>
                        </div>

                    </form>
                </div>
            </section>

        </div>
    </div>

    <!-- page end-->
</section>
<!--main content end-->
<!--footer end-->
<!--state overview end-->
<?php require_once 'footer.php'; ?>