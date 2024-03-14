<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include "../includes/db.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "./includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1 class="page-header">
                    Welcome Admin
                </h1>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
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
                            
                            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" >
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
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>