<div class="col-xs-12">
    <form action="" method="post">

        <?php
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $update_cat = mysqli_query($connection, "SELECT * FROM categories WHERE id = '$id'");
            if (!$update_cat) {
                die("Update category: " . mysqli_error($connection));
            }
            while ($cat_row = mysqli_fetch_assoc($update_cat)) {
                $cat_title = $cat_row['title'];
                $cat_id = $cat_row['id'];
            }
            ?>
            <label for="category-title" class="text-warning">Edit Category <?php echo $cat_title;?></label>

            <div class="form-group">
                <input class="form-control" type="text" name="category_title_update"
                       value="<?php if (isset($cat_title)) {
                           echo $cat_title;
                       } ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit_update"
                       value="Update Category">
            </div>
            <?php
        }
        ?>
        <?php
        if (isset($_POST['submit_update'])) {
            $update_id = $_GET['edit'];
            $update_title = $_POST['category_title_update'];
            $update_cat_query = mysqli_query($connection, "UPDATE categories SET title = '$update_title' WHERE id = '$update_id'");
            if (!$update_cat_query) {
                die('UPDATE failed! ' . mysqli_error($connection));
            }
            //redirect to categories after update
            header("Refresh:0; url=/admin/categories.php");
            //refresh the page after update
            //header("Refresh:0; url=/admin/categories.php");

        }
        ?>

    </form>
</div>