<h1>POSTS</h1>

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Images</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
    </tr>
  </thead>

  <tbody>
    <?php
      $query = "SELECT * FROM posts";
      $get_posts = mysqli_query($connect, $query);

      while($post = mysqli_fetch_assoc($get_posts)){
        echo "
          <tr>
            <td>$post[id]</td>
            <td>$post[post_author]</td>
            <td>$post[post_author]</td>
            <td></td>
            <td>$post[post_status]</td>
            <td>$post[post_image]</td>
            <td>$post[post_tags]</td>
            <td></td>
            <td>$post[post_date]</td>
          </tr>
        ";
      }
    ?>
  </tbody>
</table>