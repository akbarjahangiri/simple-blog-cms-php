<?php
ob_start();
include "includes/admin-header.php";
?>


    <body>

<div id="wrapper">

    <!-- Navigation -->
    <!--Navigation component included-------------------------->
    <?php include "includes/admin-navigation.php"; ?>
    <!-- /navigation end-->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        Welcome
                        <small>Akbar</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>

                    <div class="col-xs-12">
                        <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }

                        switch ($source) {


                            case "delete":
                                $id = $_GET['id'];
                                deleteUser($id);
                                break;
                            case "edit":
                                $id = $_GET['id'];
                                include "includes/edit_User.php";
                                break;


                            default:
                                include "includes/view_all_users.php";
                                break;

                        }

                        ?>
                    </div>


                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!--footer component---------->
<?php include "includes/admin-footer.php"; ?>