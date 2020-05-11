<!--//HEADER SECTION COMPONENT INCLUDED-->
<?php
include "includes/header.php";
include "includes/db.php";
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

            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM posts WHERE category_id = $id";
            $posts = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($posts)) {
                $post_id = $row['id'];
                $title = $row['title'];
                $author = $row['author'];
                $date = $row['date'];
                $content =substr( $row['content'],0,100)."...";
                $image = $row['image_path'];
                $post = $row['title'];

                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="<?php echo 'post.php?id='.$post_id; ?>"> <?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $date; ?></p>
                <hr>
                <img class="img-responsive"  src="<?php echo $image?>" alt="<?php echo $title.' image'?>">
                <hr>
                <p><?php echo $content ; ?></p>
                <a class="btn btn-primary" href="<?php echo 'post.php?id='.$post_id; ?>">Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php
            }
            ?>


            <!-- Pager -->
            <ul class="pager">

                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>

            </ul>


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
