<?php
session_start();
include_once('../includes/connection.php');
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
  exit(header("Location: ../login_form.php"));
} else {
  $loginUserId = $_SESSION['id'];
  $loginUserDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name` FROM students WHERE id = '$loginUserId'"));
  $name = $loginUserDetails['name'];
  $userId = $loginUserDetails['id'];
}
if (!isset($_GET['exam_id']) || empty($_GET['exam_id'])) {
  exit(header("Location: ../Exams.php"));
} else {
  $examId = $_GET['exam_id'];
  $examDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name` FROM exams WHERE id = '$examId'"));
  $examName = $examDetails['name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Teacher Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- Bootstrap -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.html" class="logo d-flex align-items-center">
        <img src="./assets/img/logo.png" alt="Company logos">
      </a>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $name; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $name; ?></h6>
              <span>Student</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="Student_profile.php">
                <i class="bi bi-gear"></i>
                <span>Leave Exam</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $examName; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Exams</li>
          <li class="breadcrumb-item active">Give Exam</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="container">

      <section class="section">

        <div class="row">
          <!-- Question and Options Section -->
          <div class="col-md-9">
            <div class="card" style="height: 300px;">
              <div class="card-body">
                <!-- Subject Name -->
                <h5 class="card-title" id="Qno">Question no. 1</h5>
                <form id="Paper">
                  <!-- Question Section -->
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" value="Question text here" id="Question" disabled>
                    </div>
                  </div><!-- End of Question  -->

                  <!-- Options Section -->
                  <form id="submit_answer">
                    <div class="row">
                      <!-- Left Side Options -->
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="opt1" value="option1">
                          <label class="form-check-label" for="opt1" id="opt1_lable">First radio</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="opt2" value="option2">
                          <label class="form-check-label" for="opt2" id="opt2_lable">Second radio</label>
                        </div>
                      </div>

                      <!-- Right Side Options -->
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="opt3" value="option3">
                          <label class="form-check-label" for="opt3" id="opt3_lable">Third radio</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="opt4" value="option4">
                          <label class="form-check-label" for="opt4" id="opt4_lable">Fourth radio</label>
                        </div>
                      </div>
                    </div><!-- End of Options  -->
                    <input type="hidden" id="question_id">
                  </form>

                  <!-- Buttons Section -->
                  <div class="row mt-5">
                    <!-- Previous Button -->
                    <div class="col-4 text-start">
                      <button type="button" class="btn btn-info" id="previous">Previous</button>
                    </div>
                    <!-- Next and Reset Buttons -->
                    <div class="col-8 text-end" id="button1">
                      <button type="button" class="btn btn-danger">Reset</button>
                      <button type="button" class="btn btn-success" id="next">Next</button>
                    </div>
                    <div class="col-8 text-end" id="button2" style="display: none;">
                      <button type="button" class="btn btn-primary" id="submit" onclick="submit()">Submit</button>
                    </div>
                  </div><!-- End of buttons  -->
                </form>
              </div>
            </div>
          </div>

          <!-- Guidelines Section -->
          <div class="col-md-3">
            <div class="card" style="width: 350px; height: 400px;">
              <div class="card-body">
                <!-- Guidelines Heading -->
                <h6 class="card-title fw-bold">Guidelines for Online Exam</h6>

                <!-- Guidelines Content -->
                <ul>
                  <li>Read each question carefully before answering.</li>
                  <li>You are not allowed to navigate away from the exam page.</li>
                  <li>Do not refresh the page during the exam.</li>
                  <li>Contact the invigilator in case of any issues.</li>
                  <li>Best of luck.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  </main><!-- End #main -->
  <?php
  include_once("./includes/footer.php");
  ?>
  <script>
    $(document).ready(function() {
      var i = 0;
      navigate(i);
      loadData(i);
      $('[name="gridRadios"]').click(function() {
        let answer = $(this).val();
        let question_id = $('#question_id').val();
        saveCookie(answer, question_id);
      });
    });

    function loadData(i) {
      $.ajax({
        type: "POST",
        url: "./ajaxApis/load.php",
        data: {
          reqType: "QUESTION",
          exam_id: <?= $examId; ?>
        },
        success: function(data) {
          let arr = JSON.parse(data);
          if (i < arr.length) {
            var segments = arr[i].options.split(',');
            $('#question_id').val(`${arr[i].id}`);
            $('#Question').val(`${arr[i].question_text}`);
            $('#opt1').val(1);
            $('#opt2').val(2);
            $('#opt3').val(3);
            $('#opt4').val(4);
            $('#opt1_lable').text(segments[0]);
            $('#opt2_lable').text(segments[1]);
            $('#opt3_lable').text(segments[2]);
            $('#opt4_lable').text(segments[3]);
            $('#button1').show();
            $('#button2').hide();
          } else if (i == arr.length) {
            $('#button1').hide();
            $('#button2').show();
          }
        }
      });
    }

    function saveCookie(ans, q_id) {
      var expires = "";
      var date = new Date();
      date.setTime(date.getTime() + (30 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
      document.cookie = "Q.no:" + q_id + "=" + (ans || "") + expires + ";";
    }

    function submit() {
      const exam_id = <?= $examId; ?>;
      const user_id = <?= $userId; ?>;
      $.ajax({
        type: "POST",
        url: "./ajaxApis/insert.php",
        data: {
          reqType: "ANSWER",
          exam_id,
          user_id
        },
        success: function(response) {
          if (confirm("Do u want to see results?")) {
            window.location.href = "./Results.php?exam_id=<?= $examId ?>;"
          }
        },
        error: function(response) {
          alert(response)
        }
      });
    }

    function navigate(i) {
      let n = 1;
      $('#next').click(function() {
        i++;
        n++;
        loadData(i);
        $('input[name="gridRadios"]').prop('checked', false);
        $('#Qno').text('Question no. ' + n);
      });
      $('#previous').click(function() {
        if (i == 0) {
          alert("stop")
        } else {
          i--;
          n--;
          loadData(i);
          $('input[name="gridRadios"]').prop('checked', false);
          $('#Qno').text('Question no. ' + n);
        }

      });

    }
  </script>