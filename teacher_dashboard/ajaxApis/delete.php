<?php
include('../../includes/connection.php');
if ($_POST['reqType'] == "CLASS") {
    $id = $_POST['id'];
    try {
        $Sql1 = mysqli_query($conn, "UPDATE `classes` SET `is_deleted`= 1 WHERE `id` = $id");
        $Sql2 = mysqli_query($conn, "DELETE FROM `subjects` WHERE `class_id` = $id");
        if ($Sql1 && $Sql2) {
            echo $id;
            die();
        } else {
            echo 'Something went wrong';
            die();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == "SUBJECT") {
    $id = $_POST['id'];
    try {
        $Sql = mysqli_query($conn, "DELETE FROM `subjects` WHERE `id` = $id");
        if ($Sql) {
            echo $id;
            die();
        } else {
            echo 'Something went wrong';
            die();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == "EXAM") {
    $id = $_POST['id'];
    try {
        $Sql1 = mysqli_query($conn, "DELETE FROM `exams` WHERE `id` = $id");
        $Sql2 = mysqli_query($conn, "DELETE FROM `questions` WHERE `exam_id` = $id");
        if ($Sql1 && $Sql2) {
            echo $id;
            die();
        } else {
            echo 'Something went wrong';
            die();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == "STUDENT") {
    $id = $_POST['id'];
    try {
        $Sql = mysqli_query($conn, "UPDATE `students` SET `is_deleted`= 1 WHERE `id` = $id");
        if ($Sql) {
            echo $id;
            die();
        } else {
            echo 'Something went wrong';
            die();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == "QUESTION") {
    $id = $_POST['id'];
    try {
        $Sql = mysqli_query($conn, "DELETE FROM `questions` WHERE `id` = $id");
        if ($Sql) {
            echo $id;
            die();
        } else {
            echo 'Something went wrong';
            die();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == "RESULT") {
    $id = $_POST['id'];
    try {
        $Sql = mysqli_query($conn, "DELETE FROM `results` WHERE `id` = $id");
        if ($Sql) {
            echo $id;
            die();
        } else {
            echo 'Something went wrong';
            die();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
