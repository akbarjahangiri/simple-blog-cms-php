<!--//HEADER SECTION COMPONENT INCLUDED-->
<?php
include "includes/header.php";
include "includes/db.php";
include "includes/functions.php";

if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connection, $_GET['id']);
    $post = postData($id);

}
//if (isset($_POST['submit_comment'])){
//        $errors =  createComment();
//        print_r($errors);
//
//}
?>

<body>

<!-- NAV SECTION COMPONENT ADDED-->
<?php
include "includes/navigation.php";
?>

<!-- Page Content -->
<div class="container">
    <?php
    if (isset($_SESSION['sql'])) {
        echo $_SESSION['sql'];
    }
    if (isset($_POST['submit_comment'])) {
        echo "Dada";

//    echo $_GET['id'];
//    echo $_POST['email'];
//    echo $_POST['content'];
//    echo $_POST['author'];
        $errors = createComment();
        if (empty($errors)) {
            echo "empty";
        }
        print_r($errors);
    }
    ?>

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo $post['title'] ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?php echo $post['author'] ?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted
                on <?php echo $post['date'] ?> </p>


            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="<?php echo $post['image_path'] ?>" alt="<?php echo $post['title'] ?>">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $post['content'] ?></p>
            <hr>
            <?php if (isset($_SESSION['auth'])) { ?>
                <a href="admin/posts.php?source=edit&id=<?php echo $_GET['id']; ?>"><button class="btn btn-block">edit post</button></a>
            <?php } ?>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment: <?php if (isset($_SESSION['comment'])) {
                        echo $_SESSION['comment'];
                    } ?></h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="author">author:</label>
                        <input type="text" class="form-control" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">comment:</label>

                        <textarea class="form-control" rows="4" name="content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->

            <?php
            $comments = showComments($_GET['id']);
            if (isset($comments)) {
                foreach ($comments as $comment) {
                    ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment['author']; ?>
                                <small><?php echo $comment['date']; ?></small>
                            </h4>
                            <?php echo $comment['content']; ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <!-- Comment -->
            <!--            <div class="media">-->
            <!--                <a class="pull-left" href="#">-->
            <!--                    <img class="media-object" src="http://placehold.it/64x64" alt="">-->
            <!--                </a>-->
            <!--                <div class="media-body">-->
            <!--                    <h4 class="media-heading">Start Bootstrap-->
            <!--                        <small>August 25, 2014 at 9:30 PM</small>-->
            <!--                    </h4>-->
            <!--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.-->
            <!--                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi-->
            <!--                    vulputate fringilla. Donec lacinia congue felis in faucibus.-->
            <!--                    <!-- Nested Comment -->
            <!--                    <div class="media">-->
            <!--                        <a class="pull-left" href="#">-->
            <!--                            <img class="media-object" src="http://placehold.it/64x64" alt="">-->
            <!--                        </a>-->
            <!--                        <div class="media-body">-->
            <!--                            <h4 class="media-heading">Nested Start Bootstrap-->
            <!--                                <small>August 25, 2014 at 9:30 PM</small>-->
            <!--                            </h4>-->
            <!--                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin-->
            <!--                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce-->
            <!--                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <!-- End Nested Comment -->
            <!--                </div>-->
            <!--            </div>-->

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
