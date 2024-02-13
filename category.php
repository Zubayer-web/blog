<?php 
    require_once './vendor/autoload.php';
    $category = new \App\classes\category();
    $blog = new \App\classes\blog();
    if(isset($_GET['id'])){
        $id = $_GET['id']; 
        $result = $blog->category_archive($id);
    }
    require_once 'header.php'; 
    include_once 'banner.php';
?>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="./upload/<?php echo $row['feature_image']; ?>"
                                alt="<?php echo $row['post_title']; ?>" /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo date("M d, Y", strtotime($row['post_title']) ); ?></div>
                            <h2 class="card-title h4"><?php echo $row['post_title']; ?></h2>
                            <p class="card-text"><?php echo substr($row['post_title'], 0, 100); ?></p>
                            <a class="btn btn-primary" href="single.php?id=<?php echo $row['post_id']?>">Read more →</a>
                        </div>
                    </div>
                </div>
                <?php  endwhile; ?>
            </div>
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
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>

</html>