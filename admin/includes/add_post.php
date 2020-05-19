<?php
$categories = allCategoriesList();

if (isset($_POST['create_post'])) {
    $errors = createPost();
}

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
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="title">post category id</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">tags</label>
                    <input type="text" class="form-control" name="tags">
                </div>
                <div class="form-group">
                    <label for="title">image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>

                <div class="form-group">
                    <label for="title">content</label>
                    <textarea type="text" rows="10" class="form-control" name="content" id="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="checkbox"> publish </label>
                    <input type="checkbox" class="checkbox-inline">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-lg" value="Add Post" name="create_post">
                </div>


            </form>
        </div>
    </div>
</div>
