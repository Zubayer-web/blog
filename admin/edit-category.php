<?php 
require_once 'header.php'; 
require_once '../vendor/autoload.php';
$category = new \App\classes\category();
$id = $_GET['id'];
$result = $category->edit_data_show($id);
$row = mysqli_fetch_assoc($result);

?>
<!--state overview start-->

<section class="wrapper">
    <!-- update form start -->
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <div class="card-body">
                    <div class="alert alert-primary h2" role="alert">
                        Update Category
                    </div>
                </div>
            </section>
        </div>
    </div>
            <?php                 
                if(isset($_POST['update_category'])){
                    $up_notifaction = $category->update_category($_POST);
                }                  
            ?>
    <div class="row">
        <div class="col-lg-5">
            <section class="card">
                <header class="card-header">
                    Category
                    <p><?php 
                        if(isset($up_notifaction)){
                            echo $up_notifaction;
                            echo '<a href="category.php" class="btn btn-primary ml-5">Back Category</a>';
                        }
                    ?></p>
                    
                </header>
                <div class="card-body">

                    <form action="" method="POST">
                        <div class="form-group row">
                            <input type="hidden" name="cat_id" value="<?php echo $row['cat_Id']; ?>">
                            <label for="up_name" class="col-sm-4 col-form-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="up_name" placeholder="Name" name="up_name"
                                    required autocomplete="off" value="<?php echo $row['cat_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="up_desc" class="col-sm-4 col-form-label">Category Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="up_desc" id="up_desc" rows="5"
                                    placeholder="Description"
                                    autocomplete="off"><?php echo $row['cat_desc']; ?></textarea>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="up_status" id="active"
                                            value="1" <?php echo $row['status'] == '1' ? 'checked':'' ?>>
                                        <label class="form-check-label" for="active">Publish</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="up_status" id="deactive"
                                            value="0" <?php echo $row['status'] == '0' ? 'checked':'' ?>>
                                        <label class="form-check-label" for="deactive">Draft</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="update_category" class="btn btn-primary">Update
                                    Category</button>
                            </div>
                        </div>


                    </form>
                </div>
            </section>

        </div>
    </div>
    <!-- update form end -->
    <!-- page end-->
</section>
<!--state overview end-->
<?php require_once 'footer.php'; ?>