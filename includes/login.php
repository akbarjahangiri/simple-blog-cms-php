<?php
include 'db.php';
include_once 'functions.php';
session_start();

if (isset($_POST['login'])) {
    $username = testInput($_POST['username']);
    $password = testInput($_POST['password']);
    $user = userDataByUsername($username);
    if ($user['username'] === $username) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['auth'] = "true";
            $_SESSION['authId'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: ../admin');
        } else {
            $_SESSION['autherror'] = 'wrong password or username...';
            header('Location: ../index.php');
        }

    } else {
        $_SESSION['autherror'] = 'wrong password or username...';
        header('Location: ../index.php');
    }
}