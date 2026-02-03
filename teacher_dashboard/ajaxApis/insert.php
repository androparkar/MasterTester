<?php
include('../../includes/connection.php');

if ($_POST['reqType'] == 'CLASS') {
    $teacher_id = $_POST['id'];
    $class = $_POST['className'];
    try {
        $Sql = mysqli_query($conn, "INSERT INTO `classes`(`name`, `teacher_id`) VALUES ('$class', '$teacher_id')");
        if ($Sql) {
            echo 'Succesfully inserted';
        } else {
            echo 'Something went wrong';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'SUBJECT') {

    $subject = $_POST['subject'];
    $class_id = $_POST['class_id'];
    try {
        $Sql = mysqli_query($conn, "INSERT INTO `subjects`(`name`, `class_id`) VALUES ('$subject', '$class_id')");
        if ($Sql) {
            echo 'Succesfully inserted';
        } else {
            echo 'Something went wrong';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'STUDENT') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ph_num = $_POST['phone_num'];
    $password = $_POST['password'];
    $teacher = $_POST['tech_id'];
    $class_id = $_POST['class_id'];
    try {
        $Sql = mysqli_query($conn, "INSERT INTO `students`(`name`, `email`, `password`, `phone`, `teacher_id`, `class_id`) VALUES ('$name','$email','$password','$ph_num',$teacher, $class_id )");
        if ($Sql) {
            echo 'Succesfully inserted';
        } else {
            echo 'Something went wrong';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'EXT_STUDENT') {
    $id = $_POST['id'];
    $teacher_id = $_POST['tech_id'];
    $class_id = $_POST['class_id'];
    try {
        $Sql = mysqli_query($conn, "UPDATE `students` SET `teacher_id`='$teacher_id',`class_id`='$class_id' WHERE `id` = $id;");
        if ($Sql) {
            echo 'Succesfully inserted';
        } else {
            echo 'Something went wrong';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_POST['reqType'] == 'EXAM') {
    $arr = $_POST['data'];
    $exam = $arr['exam'];
    $subject_id = $arr['subject_id'];
    $class_id = $arr['class_id'];
    $date = $arr['date'];
    $start_time = $arr['start_time'];
    $time = $arr['time'];
    $descripion = $arr['descripion'];

    if ($class_id != '' && $exam != '') {
        try {
            $Sql = mysqli_query($conn, "INSERT INTO `exams`(`name`, `subject_id`, `class_id`,`schedule_date`, `starting_time`, `alotted_time`, `description`) VALUES ('$exam','$subject_id','$class_id','$date','$start_time','$time','$descripion')");
            if ($Sql) {
                echo mysqli_insert_id($conn);
                echo 'Succesfully inserted';
            } else {
                echo 'Something went wrong';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

if ($_POST['reqType'] == 'QUESTION') {
    $arr = $_POST['data'];
    $question = $arr['question'];
    $option1 = $arr['opt1'];
    $option2 = $arr['opt2'];
    $option3 = $arr['opt3'];
    $option4 = $arr['opt4'];
    $answer = $arr['answer'];
    $exam_id = $arr['exam_id'];
    $options = "$option1," . "$option2," . "$option3," . "$option4";
    try {
        $insertQuery = "INSERT INTO `questions`(`question_text`, `options`, `answer`, `exam_id`) VALUES ('$question','$options','$answer','$exam_id')";
        $insertSQL = mysqli_query($conn, $insertQuery);
        if ($insertSQL) {
            echo 'Succesfully inserted';
        } else {
            echo "Something went wrong!";
        }
    } catch (Exception $e) {
        echo 'Error; ', $e->getMessage();
    }
}
