<?php
include('../../includes/connection.php');

if ($_POST['reqType'] == "CLASS") {
    if ($_POST['name'] == '' || $_POST['id'] == '') {
        echo "data was not sent properly";
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        try {
            $Sql = mysqli_query($conn, "UPDATE `classes` SET `name`='$name' WHERE `id` = $id");
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

if ($_POST['reqType'] == "SUBJECT") {
    if ($_POST['subject'] == '' || $_POST['id'] == '') {
        echo "data was not sent properly";
    } else {
        $id = $_POST['id'];
        $subject = $_POST['subject'];
        $class_id = $_POST['class_id'];
        try {
            $Sql = mysqli_query($conn, "UPDATE `subjects` SET `name`='$subject',`class_id`='$class_id' WHERE `id` = $id");
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

if ($_POST['reqType'] == "STUDENT") {
    if ($_POST['id'] == '') {
        echo "data was not sent properly";
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $ph_num = $_POST['phone_num'];
        $class_id = $_POST['class_id'];
        try {
            $Sql = mysqli_query($conn, "UPDATE `students` SET `name`='$name',`email`='$email',`phone`='$ph_num',`class_id`='$class_id' WHERE `id` = $id");
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


if ($_POST['reqType'] == "EXAM") {
    if (!isset($_POST['data'])) {
        echo "data was not sent properly";
    } else {
        $arr = $_POST['data'];
        $id = $arr['id'];
        $exam = $arr['exam'];
        $subject_id = $arr['subject_id'];
        $class_id = $arr['class_id'];
        $date = $arr['date'];
        $start_time = $arr['start_time'];
        $time = $arr['time'];
        $descripion = $arr['descripion'];
        try {
            $Sql = mysqli_query($conn, "UPDATE `exams` SET `name`='$exam',`subject_id`='$subject_id',`class_id`='$class_id',`schedule_date`='$date',`starting_time`='$start_time', `description`='$descripion',`alotted_time`='$time' WHERE `id`=$id");
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

if ($_POST['reqType'] == "QUESTION") {
    if (!isset($_POST['data']) || $_POST['data'] == '') {
        echo "data was not sent properly";
    } else {
        $arr = $_POST['data'];
        $id = $arr['id'];
        $question = $arr['question'];
        $opt1 = $arr['opt1'];
        $opt2 = $arr['opt2'];
        $opt3 = $arr['opt3'];
        $opt4 = $arr['opt4'];
        $answer = $arr['answer'];
        $options = "$opt1," . "$opt2," . "$opt3," . "$opt4";
        try {
            $Sql = mysqli_query($conn, "UPDATE `questions` SET `question_text`='$question',`options`='$options',`answer`='$answer' WHERE `id`=$id");
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

if ($_POST['reqType'] == "TEACHER") {
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
            $Sql = mysqli_query($conn, "UPDATE `teachers` SET `name`='$name',`email`='$email',`phone`='$phone', `address`='$address',`about_comment`='$about' WHERE `id` =  $id");
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
            $Sql = mysqli_query($conn, "UPDATE `teachers` SET `password`='$newPassword' WHERE `id` =  $id AND `password` = $currentPassword");
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
