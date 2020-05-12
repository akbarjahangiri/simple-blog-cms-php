<?php
include "includes/admin-header.php"; ?>

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
                <div class="col-lg-12">
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
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <?php
                            //-----------------------------------insert category section------------------------------------
                            insertCategory();
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category-title">Add Category</label>
                                    <input class="form-control" type="text" name="category_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                        </div>
                        <!----------UPDATE CATEGORIES-->
                        <?php
                        if (isset($_GET['edit'])) {
                            include "includes/edit_categories.php";
                        }
                        ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-hover table-condensed table-responsive table-bordered">
                            <thead>
                            <tr class="active">
                                <th>Id</th>
                                <th>Category title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //------------------ALL CATEGORIES SECTION -------------------------------------------------
                            allCategories();
                            ?>
                            </tbody>
                        </table>
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