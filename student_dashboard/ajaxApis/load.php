<?php
include('../../includes/connection.php');
if ($_POST['reqType'] == "EXAM") {
    if (isset($_POST['class_id'])) {
        $class_id = $_POST['class_id'];
        $updSql = mysqli_query($conn, "UPDATE `exams` SET `is_done`= 1 WHERE `schedule_date` < CURRENT_DATE");
        $sql = mysqli_query($conn, "SELECT * FROM `exams` WHERE `class_id` = '$class_id' AND `is_active` = 1 AND `is_done` = 0");
        $row = mysqli_num_rows($sql);
        $output = [];
        if ($row > 0) {
            while ($result = mysqli_fetch_assoc($sql)) {
                $output[] = $result;
            }
            echo json_encode($output);
        } else {
            echo 0;
        }
        die();
    } else {
        echo "send data correctly!";
    }
}

if ($_POST['reqType'] == "QUESTION") {
    if (isset($_POST['exam_id'])) {
        $exam_id = $_POST['exam_id'];
        $sql = mysqli_query($conn, "SELECT * FROM `questions` WHERE `exam_id` = '$exam_id'");
        $output = [];
        if (mysqli_num_rows($sql) > 0) {
            while ($result = mysqli_fetch_assoc($sql)) {
                $output[] = $result;
            }
        }
        echo json_encode($output);
        die();
    } else {
        echo "send data correctly!";
    }
}

if ($_POST['reqType'] == "RESULT") {
    session_start();
    if (isset($_POST['user_id']) && isset($_POST['exam_id'])) {
        $user_id = $_POST['user_id'];
        $exam_id = $_POST['exam_id'];
        $sql = mysqli_query($conn, "SELECT * FROM answer_submission INNER JOIN questions ON answer_submission.question_id = questions.id WHERE answer_submission.answer = questions.answer AND answer_submission.exam_id = $exam_id AND answer_submission.user_id = $user_id;");
        echo mysqli_num_rows($sql);
        $_SESSION['score'] = mysqli_num_rows($sql);
        die();
    } else {
        echo "send data correctly!";
    }
}
