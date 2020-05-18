<table class="table table-hover table-condensed table-responsive table-bordered">
    <br>
    <br>
    <?php
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
        <th>post link</th>
        <th>author</th>
        <th>content</th>
        <th>date</th>
        <th>status</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //------------------ALL CATEGORIES SECTION -------------------------------------------------
    $comments = allComments();
    foreach ($comments as $comment) {
        echo "<tr>";
        echo "<td>" . $comment['id'] . "</td>";
        echo "<td>"." <a href='../post.php?id=".$comment['post_id']." '> " ."post" . "</a></td>";
        echo "<td >" . $comment['author'] . "</td>";
        echo "<td class='td-word-break'>" . $comment['content'] . "</td>";
        echo "<td>" . $comment['date'] . "</td>";
        if ($comment['status'] == 'approved'){
            echo "<td>" . "<a href='comments.php?source=unapprove&id=" . $comment['id'] . "' class='btn btn-info   '>approved</a> " ."</td>";
        }else{
            echo "<td>" . "<a href='comments.php?source=approve&id=" . $comment['id'] . "' class='btn btn-default'>unapproved</a> " ."</td>";

        }
        echo "<td>" . "<a href='posts.php?source=delete&id=" . $comment['id'] . "' class='btn btn-danger'>Delete</a> " ."</td>";
        echo "<td>" . " <a href='posts.php?source=edit&id=" . $comment['id'] . "' class='btn btn-success'>Edit</a>" . "</td>";
        echo "</tr>";
    }


    ?>


    </tbody>
</table>