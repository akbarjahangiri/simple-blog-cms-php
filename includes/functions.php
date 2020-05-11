<?php
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

function testQuery($result)
{
    global $errors;
    global $connection;
    if (!$result) {
        array_push($errors, mysqli_error($connection, 'Query error'));
    }
}


//create comment on special post form
//front side
function createComment()
{
    global $connection;
    global $errors;

    $postId = mysqli_escape_string($connection, $_GET['id']);
    $auhtor = mysqli_escape_string($connection, $_POST['author']);
    $email = mysqli_escape_string($connection, $_POST['email']);
    $content = mysqli_escape_string($connection, $_POST['content']);

    if (empty($email)) {
        array_push($errors, "email is empty");
    }
    if (empty($content)) {
        array_push($errors, "content is empty");
    }
    if (empty($auhtor)) {
        array_push($errors, "author is empty");
    }
    if (empty($errors)) {
        session_start();
        $_SESSION['comment'] = "yes";
        $sql = "INSERT INTO comments(post_id,author,content,date,status,email)  ";
        $sql .= "VALUES($postId, '$auhtor','$content',now(),'unapproved','$email')";


        $createComment = mysqli_query($connection, $sql);
        $_SESSION['sql'] = "sql error" . mysqli_error($connection);
        //selecting post from DB to change comment count
        $postSql = "UPDATE posts SET comment_count+1 WHERE id = $postId";
        $postQuery = mysqli_query($connection, $postSql);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    return $errors;


}

//show post pages comments
function showComments($id)
{
    global $connection;
    $comments = array();
    $sql = "SELECT * FROM comments WHERE post_id = $id AND status = 'approved' ";
    $postQuery = mysqli_query($connection, $sql);
    if (mysqli_num_rows($postQuery) > 0) {
        while ($row = mysqli_fetch_assoc($postQuery)) {
            $comments[] = $row;
        }
    }
    if (!empty($comments)) {
        return $comments;
    }
}