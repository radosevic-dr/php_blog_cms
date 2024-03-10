<?php include "./includes/db.php" ?>

<div class="col-md-8">

<?php
    
    $query = 
    isset($_POST["submit"]) 
    ? "SELECT * FROM posts WHERE posts_tags LIKE %$_POST[search]" 
    : "SELECT * from posts";
    
    $posts_query = mysqli_query($connect, $query);

    while($post = mysqli_fetch_assoc($posts_query)){
        $title = $post["post_title"];
        $author = $post["post_author"];
        $date = $post["post_date"];
        $image = $post["post_image"];
        $content = $post["post_content"];
?>

    <h1 class=page-header></h1>

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
    <hr/>

    <img class="img-responsive" src=<?php echo $image ?> alt=<?php echo $title ?> />
    <hr/>
            
     <p><?php echo $content ?></p>

    <a class='btn btn-primary' href=#>Read More
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
    <hr />
<?php
    }
?>

    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>


    

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