<?php
require_once 'header.php';
require_once '../vendor/autoload.php';
 $tag = new \App\classes\tag();
 ?>
<!--state overview start-->


<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <div class="card-body">
                    <div class="alert alert-primary h2" role="alert">
                        Add & Manage Tags
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <section class="card">
                <header class="card-header">
                    Horizontal Forms
                </header>
                <div class="card-body">
                    <?php if(isset($_POST['add_tag'])){
                            $feedback = $tag->add_tag($_POST);
                        }
                        ?>
                    <form id="form" action="" method="POST">
                            <p>
                                <?php 
                                        if(isset($feedback)){
                                            echo $feedback;
                                        }
                                    ?>
                            </p>
                        <div class="form-group row">
                            <label for="tag_name" class="col-sm-2 col-form-label">Tag Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tag_name" placeholder="Tag Name"
                                    name="tag_name">
                                    <small id="tag_name_error" class="form-text text-muted"></small>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="add_tag" class="btn btn-primary">Add Tag</button>
                            </div>
                        </div>
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
                            <th><i class="fa fa-bullhorn"></i>Tag name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                        $show_tag = $tag->show_tag();
                                               
                        while($row = mysqli_fetch_assoc($show_tag)):  ?>
                        <tr>
                            <td><a href="#"><?php echo $row['tag_name']; ?></a></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['tag_id']; ?>$table=tag" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="delete.php?id=<?php echo $row['tag_id']; ?>$table=tag" class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </div>

    </div>
    <!-- page end-->
</section>

<!--state overview end-->
<?php require_once 'footer.php'; ?>