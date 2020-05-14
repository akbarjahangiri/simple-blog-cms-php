<?php
function testQuery($result)
{
    global $errors;
    global $connection;
    if (!$result) {
        array_push($errors, mysqli_error($connection, 'Query error'));
    }
}

//validate and reform input data
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//create new category
function insertCategory()
{
    if (isset($_POST['category_title'])) {
        global $connection;
        $category_title = $_POST['category_title'];
        if ($category_title == "" || empty($category_title)) {
            echo "this field should not be empty";
        } else {
            $sql = "INSERT INTO categories(title) VALUES('" . $category_title . "') ";
            if (mysqli_query($connection, $sql)) {
                echo "category added successfully!";
            } else {
                echo "Error " . $sql . "<br>" . mysqli_error($connection);
            }
        }
    }
}

// return all categories list table in categories.php
function allCategories()
{
    global $connection;
    $categories = mysqli_query($connection, "SELECT * FROM categories");
    while ($rows = mysqli_fetch_assoc($categories)) {
        ?>
        <tr>
            <td><?php echo $rows['id'] ?></td>
            <td><?php echo $rows['title'] ?></td>
            <td><a class="btn btn-danger"
                   href="categories.php?delete=<?php echo $rows['id'] ?>">Delete</a> <a
                        class="btn btn-success"
                        href="categories.php?edit=<?php echo $rows['id'] ?>">Edit</a></td>
        </tr>
        <?php
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $delete_query = mysqli_query($connection, "DELETE FROM categories WHERE id = '$id' ");
        header("Location: categories.php");

    }
}

//return all categories as array
function allCategoriesList()
{
    global $connection;
    $categoreisArray = array();
    $query = "SELECT * FROM categories";
    $categoreis = mysqli_query($connection, $query);
    testQuery($categoreis);

    while ($row = mysqli_fetch_assoc($categoreis)) {
        array_push($categoreisArray, $row);
    }
    return $categoreisArray;
}

//----------------------------------------------posts functions---------------------------------

//return all posts as array
function allPosts()
{
    global $connection;
    $post_query = mysqli_query($connection, "SELECT * FROM posts");
    $posts = array();

    while ($row = mysqli_fetch_assoc($post_query)) {
        $posts[] = $row;
    }
    return $posts;
}

function createPost()
{
    global $connection;
    $title = $category_id = $image_path = $content = $author = $comment_count = $status = "";
    $allowextension = array("jpg", "jpeg", "png");
    $errors = array();

//    validating data
    if (isset($_POST['create_post'])) {

        $title = mysqli_real_escape_string($connection, $_POST['title']);
        if (empty($title)) {
            array_push($errors, "title is empty...");
        }

        $category_id = mysqli_real_escape_string($connection, $_POST['category_id']);
        if (empty($category_id)) {
            array_push($errors, "category id needed...");
        }

        $tags = mysqli_real_escape_string($connection, $_POST['tags']);
        if (empty($tags)) {
            array_push($errors, "tags are empty...");
        }
        $author = 'akbar';
//        $author = mysqli_real_escape_string($connection, $_POST['author']);
//        if (empty($author)) {
//            array_push($errors, "author is empty...");
//        }
        $content = mysqli_real_escape_string($connection, $_POST['content']);
        if (empty($content)) {
            array_push($errors, "content is empty...");
        }

        if (isset($_FILES['image'])) {
            $extention = explode(".", $_FILES['image']['name']);
            $extention = end($extention);
            if (in_array($extention, $allowextension)) {
                if ($_FILES['image']['error'] == 0) {
                    $randnum = rand(1, 10000000);
                    $query_image_path = "images/posts/" . $randnum . "-" . $_FILES['image']['name'];
                    $image_path = "../images/posts/" . $randnum . "-" . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
                } else {
                    array_push($errors, "Error in uploading file");
                }
            } else {
                array_push($errors, "image format must be: jpeg , jpg , png");
            }
        }
//        $date = mysqli_real_escape_string($connection, $_POST['date']);
        $comment_count = 0;
        $status = 'draft';
        $create_post_query = "INSERT INTO posts(title,category_id, image_path, content ,date , author, tags, comment_count, status )";
        $create_post_query .= "VALUES('$title', $category_id, '$query_image_path', '$content', now(), '$author', '$tags', $comment_count, '$status' )";
        $create_post = mysqli_query($connection, $create_post_query);
        testQuery($create_post);

        return $errors;
    }

}

/*return a post data from database as array*/
function postData($id)
{
    global $connection;
    $post = array();
    $postQuery = "SELECT * FROM posts WHERE id = $id ";
    $postData = mysqli_query($connection, $postQuery);
    testQuery($postData);
    if (mysqli_num_rows($postData) > 0) {
        while ($row = mysqli_fetch_assoc($postData)) {
            $post = $row;
        }
    }
    return $post;

}

function showUpdatePost($postId)
{
    global $connection;
    $post = array();

    $query = "SELECT * FROM posts WHERE id = $postId ";
    $postQuery = mysqli_query($connection, $query);

    if (!$postQuery) {
        die("Update category: " . mysqli_error($connection));
    }
    testQuery($postQuery);

    if (mysqli_num_rows($postQuery) > 0) {

        while ($row = mysqli_fetch_assoc($postQuery)) {

            $post = $row;
//            print_r($post);
        }
    }
    return $post;

}

function editPost()
{

    global $connection;
    //loading old post data from DB
    $oldPostData = array();
    $id = mysqli_escape_string($connection, $_GET['id']);
    $oldPostQuery = "SELECT * FROM posts WHERE id = $id";
    $oldPost = mysqli_query($connection, $oldPostQuery);
    if (empty(testQuery($oldPost))) {
        while ($row = mysqli_fetch_assoc($oldPost)) {
            $oldPostData = $row;
        }
    }

    $allowextension = array("jpg", "jpeg", "png");
    $errors = array();

//    validating data
    if (isset($_POST['updatePost'])) {

        $title = mysqli_real_escape_string($connection, $_POST['title']);
        if (empty($title)) {
            array_push($errors, "title is empty...");
        }

        $category_id = mysqli_real_escape_string($connection, $_POST['category_id']);
        if (empty($category_id)) {
            array_push($errors, "category id needed...");
        }

        $tags = mysqli_real_escape_string($connection, $_POST['tags']);
        if (empty($tags)) {
            array_push($errors, "tags are empty...");
        }
        $author = 'akbar';
//        $author = mysqli_real_escape_string($connection, $_POST['author']);
//        if (empty($author)) {
//            array_push($errors, "author is empty...");
//        }
        $content = mysqli_real_escape_string($connection, $_POST['content']);
        if (empty($content)) {
            array_push($errors, "content is empty...");
        }

        if (!empty($_FILES['image']['tmp_name'])) {
            $extention = explode(".", $_FILES['image']['name']);
            $extention = end($extention);
            if (in_array($extention, $allowextension)) {
                if ($_FILES['image']['error'] == 0) {
                    $randnum = rand(1, 10000000);
                    $query_image_path = "images/posts/" . $randnum . "-" . $_FILES['image']['name'];
                    /* delete old image from storage */

                    if (file_exists("../" . $oldPostData['image_path'])) {
                        unlink("../" . $oldPostData['image_path']);
                    }
                    $image_path = "../images/posts/" . $randnum . "-" . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                } else {
                    array_push($errors, "Error in uploading file");
                }
            } else {
                array_push($errors, "image format must be: jpeg , jpg , png");
            }
        } else {
            $image_path = "../" . $oldPostData['image_path'];
        }
        $comment_count = 4;
        $status = 'draft';
        $update_post_query = "UPDATE  posts SET title='$title', tags='$tags', category_id=$category_id, content='$content', image_path='$image_path' WHERE id=$id ";
        $updateQuery = mysqli_query($connection, $update_post_query);
        testQuery($updateQuery);
        header('location: posts.php');
        return $errors;

    }
}

function deletePost($id)
{
    global $connection;
    global $errors;
    $postData = postData($id);
    if (file_exists("../" . $postData['image_path'])) {
        session_start();
        $unlink = unlink("../" . $postData['image_path']);
        $_SESSION['error'] = "../" . $postData['image_path'];

    } else {
        session_start();
        $_SESSION['error'] = "no file to delete";
    }
    $deleteQuery = "DELETE FROM posts WHERE id=$id";
    $deletePost = mysqli_query($connection, $deleteQuery);
    testQuery($deletePost);
    header('location: posts.php ');

    return $postData;
}

/*-------------------------Comments section function-------------------------*/
// Admin Comments parts

//show all comments in commenst.php>view_all_comments.php
function allComments()
{
    global $connection;
    $comments = array();
    $sql = "SELECT * FROM comments";
    $all_posts = mysqli_query($connection, $sql);
    testQuery($all_posts);
    if (mysqli_num_rows($all_posts) > 0) {
        while ($row = mysqli_fetch_assoc($all_posts)) {
            $comments[] = $row;
        }
    }
    return $comments;
}

//approve comment
function approveComment($id)
{
    global $connection;
    $sql = "UPDATE comments SET status = 'approved' WHERE id = $id ";
    $approveQuery = mysqli_query($connection, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//unapprove comment
function unapproveComment($id)
{
    global $connection;
    $sql = "UPDATE comments SET status = 'unapproved' WHERE id = $id ";
    $approveQuery = mysqli_query($connection, $sql);
    header('Location: comments.php');
}

/*-------------------------Users manage  functions-------------------------*/

//return all users
function allUsers()
{
    global $connection;
    $users = array();
    $sql = "SELECT * FROM users";
    $userQuery = mysqli_query($connection, $sql);
    testQuery($userQuery);
    if (mysqli_num_rows($userQuery) > 0) {
        while ($row = mysqli_fetch_assoc($userQuery)) {
            $users[] = $row;
        }
    }
    return $users;
}

//delete user by id
function deleteUser($id)
{
    global $connection;
    $userOldData = userOldData($id);

    //check and delete old image from storage
    if (!empty($userOldData['image_path'])) {
        unlink(unlink($userOldData['image_path']));
    }
    $sql = "DELETE FROM users WHERE id = $id";
    //delete image from storage
    mysqli_query($connection, $sql);
    header('Location:  users.php');

}

//return user data to edit page
function showUserEdit($id)
{
    global $connection;
    $user = array();
    $sql = "SELECT * FROM users WHERE id = $id";
    $userQuery = mysqli_query($connection, $sql);
    testQuery($userQuery);
    if (mysqli_num_rows($userQuery) > 0) {
        while ($row = mysqli_fetch_assoc($userQuery)) {
            $user = $row;
        }
    }
    return $user;
}

function userData($id)
{
    global $connection;
    $user = array();
    $sql = "SELECT * FROM users WHERE id =$id";
    $userQuery = mysqli_query($connection, $sql);
    if (mysqli_num_rows($userQuery)) {
        while ($row = mysqli_fetch_assoc($userQuery)) {
            $user = $row;
        }
    }
    return $user;

}

//edit and update user
function updateUser()
{
    global $connection;
    global $errors;
    $id = testInput($_GET['id']);
    $userOldData = userData($id);
    $allowextension = array("jpg", "jpeg", "png");

    $username = testInput($_POST['username']);
    $firstname = testInput($_POST['firstname']);
    $lastname = testInput($_POST['lastname']);
    $role = testInput($_POST['role']);
    $password = testInput($_POST['password']);

    $sql = "UPDATE users SET username = '$username' , firstname = '$firstname', lastname = '$lastname', role = '$role', password = '$password' ";

    if (!empty($_FILES['image_path']['tmp_name'])) {
        //check and delete old image from storage
        if (!empty($userOldData['image_path'])) {
            unlink(unlink($userOldData['image_path']));
        }

        $extention = explode(".", $_FILES['image_path']['name']);
        $extention = end($extention);
        if (in_array($extention, $allowextension)) {
            if ($_FILES['image_path']['error'] == 0) {

                $randnum = rand(1, 10000000);
                $query_image_path = "images/users/" . $randnum . "-" . $_FILES['image_path']['name'];
                $image_path = "images/users/" . $randnum . "-" . $_FILES['image_path']['name'];
                move_uploaded_file($_FILES['image_path']['tmp_name'], $image_path);

            } else {
                array_push($errors, "Error in uploading file");
            }
        } else {
            array_push($errors, "image format must be: jpeg , jpg , png");
        }

        $sql .= ",image_path ='$query_image_path'";
    }

    $sql .= " WHERE id = $id";

    $updateQuery = mysqli_query($connection, $sql);
    $_SESSION['errors'] = $errors;
    header('Location: users.php');

}

