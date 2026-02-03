<?php
session_start();
require __DIR__.'/vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// set the variables
$studentName = $_SESSION['stu_name'];
$studentId = $_SESSION['stu_id'];
$examName = $_SESSION['exam_name'];
$examDate = $_SESSION['exam_date'];
$subjectName = $_SESSION['subject_name'];
$className = $_SESSION['class_name'];
$score = $_SESSION['score'];
$fullMarks = $_SESSION['fullmarks'];
$currentDate = date('F-d-Y');


// Initialize dompdf with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);

// Load HTML content
$html = file_get_contents("Template.html");
$html = str_replace(["{{student_name}}", "{{student_id}}", "{{exam_name}}", "{{class_name}}", "{{subject_name}}", "{{exam_date}}", "{{score}}", "{{fullmarks}}", "{{current_date}}"], [$studentName, $studentId, $examName, $className, $subjectName, $examDate, $score, $fullMarks, $currentDate], $html);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("Result.pdf", array("Attachment" => 1));

