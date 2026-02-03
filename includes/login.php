<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("connection.php");
if (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email_login'];
    $password = $_REQUEST['password_login'];
    $fetchSQL = mysqli_query($conn, "SELECT `id` FROM `teachers` WHERE `email`= '$email' AND `password` = '$password' ");
    if (mysqli_num_rows($fetchSQL) == 1) {
        $result = mysqli_fetch_assoc($fetchSQL);
        $_SESSION['id'] = $result['id'];
        if (headers_sent()) {
            die(" Redirect failed. Please click on this link: <a href= ./index.html > Home </a>");
        } else {
            exit(header("Location: ../teacher_dashboard/Teacher_dashboard.php"));
        }
    } elseif (mysqli_num_rows($fetchSQL) == 0) {
        $fetchSQL = mysqli_query($conn, "SELECT `id` FROM `students` WHERE `email` = '$email' AND `password` = '$password' ");
        if (mysqli_num_rows($fetchSQL) == 1) {
            $result = mysqli_fetch_assoc($fetchSQL);
            $_SESSION['id'] = $result['id'];
            if (headers_sent()) {
                die(" Redirect failed. Please click on this link: <a href= ./index.html > Home </a>");
            } else {
                exit(header("Location: ../student_dashboard/Student_dashboard.php"));
            }
        } else {
            exit(header("Location: ../user_not_found.html"));
        }
    }
}
