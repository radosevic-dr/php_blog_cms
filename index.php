<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php include "./includes/db.php" ?>
<?php include "./includes/header.php"; ?>

<?php include "./includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            $query =
                !isset($_POST["submit"])
                ? "SELECT * FROM posts"
                : "SELECT * FROM posts WHERE post_tags LIKE '%" . mysqli_real_escape_string($connect, $_POST['search']) . "%'";
            

            $posts_query = mysqli_query($connect, $query);

            if($posts_query){

                while ($post = mysqli_fetch_assoc($posts_query)) {
                    $title = $post["post_title"];
                    $author = $post["post_author"];
                    $date = $post["post_date"];
                    $image = $post["post_image"];
                    $content = $post["post_content"];
            

            ?>

                <h1 class=page-header>
                    <small></small>
                </h1>

                <h2>
                    <a href="#"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $author ?></a>
                </p>

                <p>
                    <span class="glyphicon glyphicon-time"></span>
                    Posted on <?php echo $date ?>
                </p>
                <hr />

                <img class="img-responsive" src=<?php echo $image ?> alt=<?php echo $title ?> />
                <hr />

                <p><?php echo $content ?></p>

                <a class='btn btn-primary' href=#>Read More
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <hr />
            <?php
                }
            } else {
                echo "Unable to search " . mysqli_error($connect);
            }
            ?>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "./includes/blog_sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "./includes/footer.php" ?>

</div>
<!-- /.container -->

<!-- jQuery -->
<?php include "./includes/end_of_page.php" ?>