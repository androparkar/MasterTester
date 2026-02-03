<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("connection.php");
if (isset($_REQUEST['signup']) && !empty($_REQUEST['signup'])) {
    $username = $_REQUEST['username_signup'];
    $email = $_REQUEST['email_signup'];
    $password = $_REQUEST['password_signup'];
    $access = $_REQUEST['access'];
    if ($access == "Student") {
        if (!empty($username) && !empty($email) && !empty($password) && !empty($access)) {
            $insertQuery = "INSERT INTO `students`(`name`, `email`, `password`) VALUES ('" . $username . "','" . $email . "','" . $password . "')";
            $insertSQL = mysqli_query($conn, $insertQuery);
            $last_inserted_id = mysqli_insert_id($conn);
            if ($insertSQL) {
                $_SESSION['id'] = $last_inserted_id;
                exit(header("Location: ../student_dashboard/Student_dashboard.php"));
            } else {
                echo "something went wrong!!!";
            }
        } else {
            echo "please enter data correctly!";
        }
    } elseif ($access == "Teacher") {
        if (!empty($username) && !empty($email) && !empty($password) && !empty($access)) {
            $insertQuery = "INSERT INTO `teachers`(`name`, `email`, `password`) VALUES ('" . $username . "','" . $email . "','" . $password . "')";
            $insertSQL = mysqli_query($conn, $insertQuery);
            $last_inserted_id = mysqli_insert_id($conn);
            if ($insertSQL) {
                $_SESSION['id'] = $last_inserted_id;
                exit(header("Location: ../teacher_dashboard/Teacher_dashboard.php"));
            } else {
                echo "something went wrong!!!";
            }
        } else {
            echo "please enter data correctly!";
        }
    }
}
