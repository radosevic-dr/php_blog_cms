<!-- ADD CATEGORY  -->
<div class="col-xs-6">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <?php
        if (isset($_POST["submit"])) {
            $new_category = $_POST["cat_title"];

            $query = "INSERT INTO category (`cat_title`) VALUES ('$new_category')";



            $qery_exec = mysqli_query($connect, $query);

            if (!$qery_exec) {
                echo "Unable to add category";
            } else {
                header("Location: $_SERVER[PHP_SELF]");
            }
        }
        ?>

        <div class="form-group">
            <label for="cat_title">Add Category</label><br>
            <input class="block form-control" type="text" name="cat_title" id="cat_title">
        </div>

        <div class="form-group"><input class="btn btn-primary" type="submit" value="Add" name="submit"></div>
    </form>
    <!-- EDIT CATEGORY -->
    <?php
    if (isset($_GET["edit"])) {
        $cat_title = $_GET["edit"];
    }

    if (isset($_POST["edit"])) {
        $new_title = $_POST["cat_title"];
        $cat_id = $_GET["id"];

        $query = "UPDATE category SET cat_title = ? WHERE id = ?";

        $stmt = mysqli_prepare($connect, $query);

        mysqli_stmt_bind_param($stmt, "si", $new_title, $cat_id);

        $update_title = mysqli_stmt_execute($stmt);

        if (!$update_title) {
            echo "Greška pri ažuriranju kategorije";
        } else {
            header("Location: $_SERVER[PHP_SELF]");
        }
    }


    ?>

    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="form-group">
            <label for="cat_title">EDIT Category</label><br>
            <input value="<?php if (isset($cat_title)) {
                                echo $cat_title;
                            } ?>" class="block form-control" type="text" name="cat_title" id="cat_title">
        </div>
        <div class="form-group"><input class="btn btn-primary" type="submit" value="Edit" name="edit"></div>
    </form>
</div>

<table class="col-xs-6 table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORY</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * from category";
        $category_query = mysqli_query($connect, $query);

        while ($category = mysqli_fetch_assoc($category_query)) {
            echo "
                                    <tr>
                                        <td>$category[id]</td>
                                        <td>$category[cat_title]</td>
                                        <td>
                                        <a href=$_SERVER[PHP_SELF]?delete=$category[id]>DELETE</a>
                                        </td>
                                        <td>
                                            <a href=$_SERVER[PHP_SELF]?edit=$category[cat_title]&id=$category[id]>EDIT</a>
                                        </td>
                                    </tr>
                                    ";
        }
        ?>
    </tbody>
</table>
<?php
if (isset($_GET["delete"])) {
    $category_id = $_GET["delete"];
    $query = "DELETE FROM category WHERE id={$category_id};";

    $delete_query = mysqli_query($connect, $query);

    header("Location: $_SERVER[PHP_SELF]");
}
?>