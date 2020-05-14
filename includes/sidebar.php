<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">

                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                </span>
            </div>
        </form>

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $query = "SELECT * FROM categories LIMIT  6";
                    $categories = mysqli_query($connection, $query) or die(mysql_error());
                    //                    if (!mysqli_fetch_assoc($categories)){
                    //
                    //                    }else{
                    while ($rows = mysqli_fetch_assoc($categories)) {
                        $title = $rows['title'];
                        $id = $rows['id'];
                        ?>
                        <li><a href="category.php?id=<?php echo $id; ?>"><?php echo $title ?></a>
                        </li>
                        <?php

//                        }
                    }
                    ?>

                    <!--                    <li><a href="#">Category Name</a>-->
                    <!--                    </li>-->
                    <!--                    <li><a href="#">Category Name</a>-->
                    <!--                    </li>-->
                    <!--                    <li><a href="#">Category Name</a>-->
                    <!--                    </li>-->
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <?php if (!isset($_SESSION['auth'])) { ?>
        <!-- Side Widget Well -->
        <div class="well">
            <h4>login</h4>
            <p class="bg-danger"><?php if (isset($_SESSION['autherror'])) {
                    echo $_SESSION['autherror'];
                    unset($_SESSION['autherror']);
                } ?></p>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" name="username">

                </div>
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="password" name="password">
                    <span class="input-group-btn"><button class="btn btn-primary" name="login">login</button></span>

                </div>
            </form>
        </div>
    <?php } ?>

</div>