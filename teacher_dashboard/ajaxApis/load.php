<?php
include_once('../../includes/connection.php');

if ($_POST['reqType'] == 'CLASS') {

    $id = $_POST['id'];
    $sql = mysqli_query($conn, "SELECT * FROM `classes` WHERE `is_deleted` = 0 AND `teacher_id` = $id ORDER BY `classes`.`id` ASC") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}

if ($_POST['reqType'] == 'SUBJECT') {

    $id = $_POST['id'];
    $sql = mysqli_query($conn, "SELECT subjects.id, subjects.name AS subject_name, classes.name AS class_name, subjects.create_date, subjects.is_active FROM `subjects` INNER JOIN classes ON subjects.class_id = classes.id WHERE classes.teacher_id = $id ORDER BY subjects.id DESC;") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}

if ($_POST['reqType'] == 'STUDENT') {

    $id = $_POST['id'];
    $sql = mysqli_query($conn, "SELECT students.id, students.name, email, phone, students.join_date, students.is_active, classes.name AS class_name FROM students INNER JOIN classes ON students.class_id = classes.id WHERE students.`is_deleted` = 0 AND students.`teacher_id` = $id ORDER BY students.id ASC;") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}

if ($_POST['reqType'] == 'EXAM') {

    $id = $_POST['id'];
    $fetchSql = mysqli_query($conn, "SELECT `id` FROM `exams`");
    if (mysqli_num_rows($fetchSql) > 0) {
        while ($exam_id = mysqli_fetch_assoc($fetchSql)) {
            foreach ($exam_id as $exam_id) {
                $fullMarks = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `questions` WHERE `exam_id` = $exam_id"));
                $updateSql1 = mysqli_query($conn, "UPDATE `exams` SET `full_marks`= $fullMarks WHERE `id` = $exam_id");
            }
        }
    }
    // $updateSql2 = mysqli_query($conn, "UPDATE `exams` SET `is_active`= 0 WHERE `schedule_date` < CURRENT_DATE");
    $sql = mysqli_query($conn, "SELECT exams.id, exams.name,subjects.name AS subject_name, classes.name AS class_name, exams.schedule_date, exams.create_date, exams.starting_time,exams.full_marks,exams.alotted_time,exams.description,exams.is_active FROM exams INNER JOIN subjects ON exams.subject_id = subjects.id INNER JOIN classes ON exams.class_id = classes.id WHERE classes.`teacher_id` = $id  ORDER BY exams.id DESC") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}

if ($_POST['reqType'] == 'EXAM_ID') {
    $id = $_POST['exam_id'];
    $sql = mysqli_query($conn, "SELECT class_id, subject_id FROM `exams` WHERE `id` = $id") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}

if ($_POST['reqType'] == 'QUESTION') {

    $id = $_POST['id'];
    $sql = mysqli_query($conn, "SELECT * FROM `questions` WHERE `exam_id` = $id") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}

if ($_POST['reqType'] == 'RESULT') {

    $id = $_POST['id'];
    $sql = mysqli_query($conn, "SELECT results.id, students.name as student_name, results.score, results.submitted_at FROM results INNER JOIN exams ON results.exam_id = exams.id INNER JOIN students ON results.student_id = students.id WHERE `exam_id` = $id") or die("cholche na>>> " . mysqli_error($conn));
    $output = [];
    if (mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $output[] = $result;
        }
    }
    echo json_encode($output);
}
