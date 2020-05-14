<?php
if (isset($_POST['updateProfile'])) {
    updateProfile($_SESSION['authId']);
}
$user = showUserEdit($_SESSION['authId']);
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
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="fistname">first name</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">last name</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">last name</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                </div>


                <div class="form-group">
                    <label for="title">password</label>
                    <input type="text" class="form-control" name="password" value="<?php echo $user['password'] ?>">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="title">old image:</label>

                        </div>
                        <div class="col-xs-12">
                            <img width="100" src="<?php echo $user['image_path'] ?>">
                        </div>
                        <div class="col-xs-12">
                            <label for="title">upload new image:</label>

                        </div>
                        <div class="col-xs-12">
                            <input type="file" class="form-control-file" name="image_path">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-lg" value="Update User" name="updateProfile">
                </div>


            </form>
        </div>
    </div>
</div>
