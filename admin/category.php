<?php 
require_once 'header.php'; 

require_once "../vendor/autoload.php";
// include_once "category.php"; 
$category = new \App\classes\category();
?>
<!--state overview start-->

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <div class="card-body">
                    <div class="alert alert-primary h2" role="alert">
                        Add & Manage Categoris
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <section class="card">
                <header class="card-header">
                    Category
                </header>
                <div class="card-body">
                    <?php
                        if(isset($_POST['add_category'])){
                            $cat_notifcations = $category->inset_catagory($_POST);
                        }                    
                    ?>
                    <form id="form" action="" method="POST">
                        <div class="form-group row">
                            <label for="cat_name" class="col-sm-4 col-form-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="cat_name" placeholder="Name" name="cat_name"
                                    autocomplete="off">
                                    <small id="cat_name_error" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cat_desc" class="col-sm-4 col-form-label">Category Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="cat_desc" id="cat_desc" rows="5"
                                    placeholder="Description" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Status</legend>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="active" value="1" checked="on">
                                        <label class="form-check-label" for="active">Publish</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="deactive" value="0">
                                        <label class="form-check-label" for="deactive">Draft</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                            </div>
                        </div>
                        <?php  if(isset($cat_notifcations)){
                            echo '<h4>' . $cat_notifcations . '</h4>';
                        } ?>

                    </form>
                </div>
            </section>

        </div>
        <div class="col-lg-7">
            <section class="card">
                <header class="card-header">
                    Advanced Table
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> Company</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                            <th><i class="fa fa-bookmark"></i> Profit</th>
                            <th><i class=" fa fa-edit"></i> Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                         $show_cat = $category->show_category();
    
                            while($row = mysqli_fetch_assoc($show_cat)): ?>
                        <tr>
                            <td><a href="#"><?php echo $row['cat_name'];  ?></a></td>
                            <td class="hidden-phone"><?php echo $row['cat_desc'];  ?></td>
                                <td><?php  
                                        if( $row['status'] == 1 ){
                                            echo "Active";
                                        }else{
                                            echo "Inactive";
                                        }
                                    ?>
                             </td>

                            <td>
                                <?php if( $row['status'] == 1 ): ?>                                
                                    <a href="status.php?inactive=<?php echo $row['cat_Id'];?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                <?php else: ?>
                                    <a href="status.php?active=<?php echo $row['cat_Id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-times"></i></a>
                                <?php endif; ?>
                                
                                                               
                                <a href="edit-category.php?id=<?php echo $row["cat_Id"]?>$table=category" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="delete.php?id=<?php echo $row["cat_Id"] ?>&table=category" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        <?php endwhile;?>

                    </tbody>
                </table>
            </section>
        </div>

    </div>
    <!-- page end-->
</section>
<!--state overview end-->
<?php require_once 'footer.php'; ?>