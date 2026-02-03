<?php
session_start();
include_once('../includes/connection.php');
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    exit(header("Location: ../login_form.php"));
} else {
    $loginUserId = $_SESSION['id'];
    $loginUserDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name` FROM students WHERE id = '$loginUserId'"));
    $userName = $loginUserDetails['name'];
    $userId = $loginUserDetails['id'];
    $_SESSION['stu_name'] = $userName;
    $_SESSION['stu_id'] = $userId;
}
if (!isset($_GET['exam_id']) || empty($_GET['exam_id'])) {
    exit(header("Location: ../Exams.php"));
} else {
    $examId = $_GET['exam_id'];
    $examDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT exams.id, exams.name, subjects.name AS subject_name, classes.name AS class_name, classes.teacher_id AS teacher_id, exams.schedule_date, exams.full_marks FROM exams INNER JOIN subjects ON exams.subject_id = subjects.id INNER JOIN classes ON exams.class_id = classes.id WHERE exams.id = '$examId'"));
    $_SESSION['exam_name'] = $examDetails['name'];
    $_SESSION['exam_date'] = $examDetails['schedule_date'];
    $_SESSION['subject_name'] = $examDetails['subject_name'];
    $_SESSION['class_name'] = $examDetails['class_name'];
    $_SESSION['fullmarks'] = $examDetails['full_marks'];
    $teacherId = $examDetails['teacher_id'];

    //  = $examName;
    //  = $examDate;
    //  = $subjectName;
    //  = $className;
    //  = $fullMarks;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%);
            overflow: hidden;
        }

        .result-card {
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 90%;
            width: 500px;
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.5s ease forwards;
        }

        .heading {
            color: #1a1a1a;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .score {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 4rem;
            font-weight: bold;
            color: #4c1d95;
            margin: 1rem 0;
        }

        .score-value {
            display: flex;
            align-items: center;
        }

        .score-obtained,
        .score-total {
            margin: 0 5px;
        }

        .badge {
            background: #4c1d95;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 1.25rem;
            animation: pulse 2s infinite;
        }

        .message {
            color: #4b5563;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .motivation {
            color: #6b7280;
            font-size: 1rem;
            line-height: 1.6;
            padding: 1rem;
            background: #f3f4f6;
            border-radius: 0.5rem;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #ffd700;
            position: absolute;
            animation: confetti 5s ease-in-out infinite;
        }

        @keyframes confetti {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            100% {
                transform: translateY(100vh) rotate(720deg);
            }
        }

        .button-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .button {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .download-btn {
            background-color: #4c1d95;
            color: white;
        }

        .home-btn {
            background-color: #e5e7eb;
            color: #1f2937;
        }

        .button:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="row">

        <div class="result-card" id="result_card">
            <h1 class="heading">Congratulations! <?= $userName; ?></h1>
            <div class="score">
                <div class="score-value">
                    <div class="score-obtained" id="obtained">10</div>
                    <span>/</span>
                    <div class="score-total" id="total">10</div>
                </div>
                <span class="badge">Perfect!</span>
            </div>
            <p class="message">
                Outstanding achievement! You've demonstrated excellent understanding and dedication.
            </p>
            <div class="motivation">
                "Success is not final, failure is not fatal: it is the courage to continue that counts. Keep pushing your
                boundaries and reaching for excellence!"
            </div>
        </div>
        <div class="button-container">
            <a href="./pdf.php" class="button download-btn">Download Report</a>
            <a href="./Student_dashboard.php" class="button home-btn">Go to Home</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var examId = <?= $examId; ?>;
            var userId = <?= $userId; ?>;
            var teacherId = <?= $teacherId; ?>;
            createConfetti();
            setInterval(createConfetti, 5000);
            loadScore(examId, userId);
            saveScore(examId, userId, teacherId);
        });

        function createConfetti() {
            const colors = ['#ffd700', '#ff0000', '#00ff00', '#0000ff', '#ff00ff'];
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '0px'; // Ensure confetti starts from the top
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                confetti.style.opacity = Math.random();
                confetti.style.transform = `scale(${Math.random()})`;

                document.body.appendChild(confetti);

                // Remove confetti after animation
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }

        function loadScore(exam_id, user_id) {
            $.ajax({
                type: "POST",
                url: "./ajaxApis/load.php",
                data: {
                    reqType: "RESULT",
                    exam_id,
                    user_id
                },
                success: function(data) {
                    $('#obtained').text(data);
                    $('#total').text(<?= $_SESSION['fullmarks'] ?>);
                }
            });
        }

        function saveScore(exam_id, user_id, teacher_id) {
            let obtained = $('#obtained').text();
            $.ajax({
                type: "POST",
                url: "./ajaxApis/insert.php",
                data: {
                    reqType: "RESULT",
                    exam_id,
                    user_id,
                    teacher_id,
                    result: obtained + '/' + <?= $_SESSION['fullmarks'] ?>
                },
                success: function(responce) {

                }
            });
        }
    </script>

</body>

</html>