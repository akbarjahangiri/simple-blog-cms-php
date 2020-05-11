<table class="table table-hover table-condensed table-responsive table-bordered">
    <br>
    <br>
    <?php
    session_start();
//     echo $data['id'];
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
//    if (isset($_SESSION['unlink'])) {
//        echo $_SESSION['unlink'];
//        unset($_SESSION['unlink']);
//    } ?>

    <thead>
    <tr class="active">
        <th>Id</th>
        <th>category id</th>
        <th>title</th>
        <th>author</th>
        <th>content</th>
        <th>tags</th>
        <th>comment count</th>
        <th>status</th>
        <th>date</th>
        <th>image</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //------------------ALL CATEGORIES SECTION -------------------------------------------------
    foreach (allPosts() as $post) {
        $image_path = $post['image_path'];
        echo "<tr>";
        echo "<td>" . $post['id'] . "</td>";
        echo "<td>" . $post['category_id'] . "</td>";
        echo "<td>" . $post['title'] . "</td>";
        echo "<td >" . $post['author'] . "</td>";
        echo "<td class='td-word-break'>" . $post['content'] . "</td>";
        echo "<td>" . $post['tags'] . "</td>";
        echo "<td>" . $post['comment_count'] . "</td>";
        echo "<td>" . $post['status'] . "</td>";
        echo "<td>" . $post['date'] . "</td>";
        echo "<td><img class='img-responsive' width='100' src='../$image_path' alt=''></td>";
        echo "<td>" . "<a href='posts.php?source=delete&id=" . $post['id'] . "' class='btn btn-danger'>Delete</a> <a href='posts.php?source=edit&id=" . $post['id'] . "' class='btn btn-success'>Edit</a>" . "</td>";
        echo "</tr>";
    }


    ?>


    </tbody>
</table>