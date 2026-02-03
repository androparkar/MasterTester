<?php
include('../../includes/connection.php');
if ($_POST['reqType'] == 'CLASS') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name` FROM `classes` WHERE `id` = '$id'"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'SUBJECT') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT subjects.id,subjects.name AS subject_name, subjects.class_id, classes.name AS class_name FROM subjects INNER JOIN classes ON subjects.class_id = classes.id WHERE subjects.id ='$id'"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'EXAM') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT exams.id, exams.name AS exam_name,exams.subject_id,exams.class_id, subjects.name AS subject_name, classes.name AS class_name, exams.schedule_date, exams.starting_time, exams.description, exams.alotted_time FROM exams INNER JOIN subjects ON exams.subject_id = subjects.id INNER JOIN classes ON exams.class_id = classes.id WHERE exams.id = $id;"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'STUDENT') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT students.id, students.name, email, phone, classes.id AS class_id ,classes.name AS class_name FROM students INNER JOIN classes ON students.class_id = classes.id WHERE students.id = '$id'"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'QUESTION') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM questions WHERE id = '$id'"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'TEACHER') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name`, `email`, `phone`, `password`, `address`, `about_comment` FROM `teachers` WHERE id = '$id';"));
    echo json_encode($result);
    die();
}

if ($_POST['reqType'] == 'PASSWORD') {
    $id = $_POST['id'];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `password` FROM `teachers` WHERE id = '$id'"));
    echo json_encode($result);
    die();
}
