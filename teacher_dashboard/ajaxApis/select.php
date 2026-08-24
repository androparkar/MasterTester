<?php
include_once("../../includes/connection.php");
if ($_POST['reqType'] == "CLASS") {
    $id = $_POST['id'];
    $sql = $conn->query("SELECT `id`,`name` FROM `classes` WHERE `is_active`= 1 AND `is_deleted` = 0 AND `teacher_id` = $id;");
    $options = "";
    while ($row = $sql->fetch_assoc()) {
        $options = "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        echo $options;
    }
}

if ($_POST['reqType'] == "SUBJECT") {

    $sql = "SELECT `id`,`name` FROM `subjects` WHERE `class_id` =" . $_POST['class_id'];
    $result = $conn->query($sql);
    $options = "";
    while ($row = $result->fetch_assoc()) {
        $options = "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        echo $options;
    }
}

if ($_POST['reqType'] == "STUDENT") {
    
    if (isset($_POST['email']) && !empty($_POST['email'])) {


        $email =  $_POST['email']; 
        $sql = "SELECT `id`,`name`,`email` FROM `students` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row);
        die();
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $id = $_POST['id'];
        $sql = "SELECT `id`,`name`,`email` FROM `students` WHERE `id` = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo json_encode($row);
        die();
    }
}

if ($_POST['reqType'] == "EXAM") {
    $id = $_POST['id'];
    $sql = mysqli_query($conn, "SELECT e.`id`, e.`name` FROM `exams` e INNER JOIN classes c ON e.class_id = c.id WHERE c.`teacher_id` = 1 AND e.is_done = 0;") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}
