<?php
if (isset($_POST['updatePost'])) {
    $errors = updatePost();
}
$id = mysqli_escape_string($connection, $_GET['id']);
$post = showUpdatePost($id);
$categories = allCategoriesList();
print_r($post);
?>

<div class="col-xs-12 center-block">
    <div class="row">
        <div class="col-xs-6 ">
            <?php include "errors.php" ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 ">
            <?php if (!empty($errors)) {
                ?>
                <div class="col-xs-12 alert alert-success">
                    <p>post added successfully!</p>
                </div>
                <?php
            } ?>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-6 center-block">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">post title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="title">post category id</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <option value="<?php echo $category['id'] ?>" <?php if ($category['id'] == $post['category_id']) {
                                echo ' selected';
                            } ?> ><?php echo $category['title'];
                                echo " " . $category['id']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">tags</label>
                    <input type="text" class="form-control" name="tags" value="<?php echo $post['tags'] ?>">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="title">old image:</label>

                        </div>
                        <div class="col-xs-12">
                            <img width="100" src="../<?php echo $post['image_path'] ?>">
                        </div>
                        <div class="col-xs-12">
                            <label for="title">uplad new image:</label>

                        </div>
                        <div class="col-xs-12">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">content</label>
                    <textarea type="text" rows="10" class="form-control" name="content" ><?php echo $post['content'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="checkbox"> publish </label>
                    <input type="checkbox" class="checkbox-inline">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-lg" value="Update Post" name="updatePost">
                </div>


            </form>
        </div>
    </div>
</div>
