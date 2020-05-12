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
        <th>username</th>
        <th>first name</th>
        <th>last name</th>
        <th>email</th>
        <th>role</th>
        <th>image</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //------------------ALL CATEGORIES SECTION -------------------------------------------------
    $users = allUsers();
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td >" . $user['username'] . "</td>";
        echo "<td class='td-word-break'>" . $user['firstname'] . "</td>";
        echo "<td>" . $user['lastname'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['role'] . "</td>";
        echo "<td>" . $user['image_path'] . "</td>";

        echo "<td>" . "<a href='users.php?source=delete&id=" . $user['id'] . "' class='btn btn-danger'>Delete</a> " ."</td>";
        echo "<td>" . " <a href='users.php?source=edit&id=" . $user['id'] . "' class='btn btn-success'>Edit</a>" . "</td>";
        echo "</tr>";
    }


    ?>


    </tbody>
</table>