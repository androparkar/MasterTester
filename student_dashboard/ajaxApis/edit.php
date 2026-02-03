<?php
include('../../includes/connection.php');
if ($_POST['reqType'] == 'STUDENT') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name`, `email`, `phone`, `password`, `address`, `about_comment` FROM `students` WHERE id = '$id'"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'PASSWORD') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `password` FROM `students` WHERE id = '$id'"));
    echo json_encode($result);
    die();
}
