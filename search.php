<?php 
    require_once './vendor/autoload.php';
    $category = new \App\classes\category();
    $blog = new \App\classes\blog();
    $result = $blog->active_post_show();
    $text = $_GET['search'];
    $result = $blog->serch_results($text);
    require_once 'header.php'; 
    include_once 'banner.php';
?>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="upload/<?php echo $row['feature_image']; ?>"
                        alt="<?php echo $row['post_title'];?>" /></a>
                <div class="card-body">
                    <div class="small text-muted"><?php echo date("d M Y", strtotime($row['create_time']));?> <span><?php echo " ". $row['author_name'];?></span></div>
                  
                    <h2 class="card-title"><?php echo $row['post_title'];?></h2>
                    <p class="card-text"><?php echo substr($row['post_title'], 0 ,150);?></p>
                    <a class="btn btn-primary" href="single.php?id=<?php echo $row['post_id']; ?>">Read more →</a>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        <?php include_once 'sidebar.php'; ?>
    </div>
</div>
<!-- Footer-->
<?php require_once 'footer.php';?>

