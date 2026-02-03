<?php
include('../../includes/connection.php');
if ($_POST['reqType'] == "STUDENT") {
    if (!isset($_POST['data']) || empty($_POST['data'])) {
        echo "data was not sent properly";
    } else {
        $arr = $_POST['data'];
        $id = $arr['id'];
        $name = $arr['name'];
        $email = $arr['email'];
        $phone = $arr['phone_num'];
        $address = $arr['address'];
        $about = $arr['about'];
        try {
            $Sql = mysqli_query($conn, "UPDATE `students` SET `name`='$name',`email`='$email',`phone`='$phone', `address`='$address',`about_comment`='$about' WHERE `id` =  $id");
            if ($Sql) {
                echo $id;
            } else {
                echo 'Something went wrong';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

if ($_POST['reqType'] == "PASSWORD") {
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo "data was not sent properly";
    } else {
        $id = $_POST['id'];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        try {
            $Sql = mysqli_query($conn, "UPDATE `students` SET `password`='$newPassword' WHERE `id` =  $id AND `password` = $currentPassword");
            if ($Sql) {
                echo $id;
            } else {
                echo 'Wrong password';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
