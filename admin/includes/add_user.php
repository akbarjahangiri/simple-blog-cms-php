<?php
if (isset($_POST['addUser'])) {
    addUser();
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
                    <p>user added successfully!</p>
                </div>
                <?php
            } ?>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-6 center-block">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">username</label>
                    <input type="text" class="form-control" name="username" >
                </div>
                <div class="form-group">
                    <label for="title">first name</label>
                    <input type="text" class="form-control" name="firstname" >
                </div>
                <div class="form-group">
                    <label for="title">last name</label>
                    <input type="text" class="form-control" name="lastname" >
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" >
                </div>

                <div class="form-group">
                    <label for="title">password</label>
                    <input type="text" class="form-control" name="password" ">
                </div>
                <div class="form-group">
                    <label for="role">role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="admin" >Admin</option>
                        <option value="user" >user</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">


                        <div class="col-xs-12">
                            <label for="image_path">upload image:</label>

                        </div>
                        <div class="col-xs-12">
                            <input type="file" class="form-control-file" name="image_path">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-lg" value="add User" name="addUser">
                </div>


            </form>
        </div>
    </div>
</div>
