<?php
include('../../includes/connection.php');
if ($_POST['reqType'] == 'ANSWER') {
    $exam_id = $_POST['exam_id'];
    $user_id = $_POST['user_id'];

    $fetchSql = mysqli_query($conn, "SELECT * FROM `answer_submission` WHERE `exam_id` = $exam_id AND `user_id` = $user_id");
    if (mysqli_num_rows($fetchSql) > 0) {
        mysqli_query($conn, "DELETE FROM `answer_submission` WHERE `exam_id` = $exam_id AND `user_id` = $user_id");
    }
    foreach ($_COOKIE as $key => $value) {
        if ($key == "PHPSESSID") {
            continue;
        }
        $parts = explode(":", $key);
        $question_id = $parts[1];
        $answer = $value;
        try {
            $sql = mysqli_query($conn, "INSERT INTO `answer_submission`(`user_id`, `exam_id`, `question_id`, `answer`) VALUES ('$user_id','$exam_id','$question_id','$answer')");
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
if ($_POST['reqType'] == 'RESULT') {
    $exam_id = $_POST['exam_id'];
    $teacher_id = $_POST['teacher_id'];
    $student_id = $_POST['user_id'];
    $result = $_POST['result'];
    try {
        $sql = mysqli_query($conn, "INSERT INTO `results`(`exam_id`, `teacher_id`, `student_id`, `result`) VALUES ('$exam_id','$teacher_id','$student_id','$result')");
        echo $sql? "success" : "failed";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
