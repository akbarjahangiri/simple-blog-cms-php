<!--//HEADER SECTION COMPONENT INCLUDED-->
<?php
include "includes/header.php";
include "includes/db.php";
include "includes/functions.php";


?>

<body>
<!-- Navigation -->
<!-- NAV SECTION COMPONENT ADDED-->
<?php
include "includes/navigation.php";

?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php if (isset($_POST['submitregister'])) {
               registerUser();


            }?>

            <div class="form-wrap">
                <h1>Register</h1>
                <form role="form" action="" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="username" class="sr-only">username</label>
                        <input type="text" name="username" id="username" class="form-control"
                               placeholder="Enter Desired Username">
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="sr-only">firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                               placeholder="Enter  firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="sr-only">lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control"
                               placeholder="Enter  lastname">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="somebody@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                    </div>

                    <input type="submit"  id="btn-login" class="btn btn-custom btn-lg btn-block"
                           name="submitregister">
                </form>

            </div>


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <!-- Sidebar bar component added -->
        <?php
        include "includes/sidebar.php";
        ?>

    </div>
    <!-- /.row -->


    <hr>
    <!--    // FOOTER SECTION COMPONENT INCLUDED-->
    <?php
    include "includes/footer.php";
    ?>
