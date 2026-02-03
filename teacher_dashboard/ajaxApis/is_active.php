<?php
include('../../includes/connection.php');

$id = $_POST['id'];
$status = $_POST['status'];

if ($_POST['reqType'] == 'CLASS') {

    try {
        $updateSql = mysqli_query($conn, "UPDATE `classes` SET `is_active`='$status' WHERE `id` = $id");
        echo "Class no.$id status changed.";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'SUBJECT') {

    try {
        $updateSql = mysqli_query($conn, "UPDATE `subjects` SET `is_active`='$status' WHERE `id` = $id");
        echo "Class no.$id status changed.";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'STUDENT') {

    try {
        $updateSql = mysqli_query($conn, "UPDATE `students` SET `is_active`='$status' WHERE `id` = $id");
        echo "Student no.$id status changed.";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'EXAM') {

    try {
        $updateSql = mysqli_query($conn, "UPDATE `exams` SET `is_active`='$status' WHERE `id` = $id");
        echo "Student no.$id status changed.";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
