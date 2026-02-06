<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");

$studentData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) FROM `students` WHERE `teacher_id` = $userId"));
$examSql = mysqli_query($conn, "SELECT E.* FROM exams E LEFT JOIN classes C ON E.class_id = C.id WHERE E.is_active = 1 AND is_done = 1 AND C.teacher_id = $userId AND E.schedule_date >= CURRENT_DATE;");
$resultData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) FROM `results` WHERE `teacher_id` = $userId"));
$examCount = mysqli_num_rows($examSql);
$resultCount = $resultData["COUNT(*)"];
$studentCount = $studentData["COUNT(*)"];
$exams = [];
while ($row = mysqli_fetch_assoc($examSql)) {
  $exams[] = $row;
}
?>
<?php
$badgeColors = [
  'info',     // light blue
  'success',  // green
  'warning',  // yellow
  'danger',   // red
  'dark'      // black
];

date_default_timezone_set('Asia/Kolkata');
$now = time();

foreach ($exams as &$exam) {

  // combine date + time (if you have start_time column)
  if (!empty($exam['starting_time'])) {
    $examTime = strtotime($exam['schedule_date'] . ' ' . $exam['starting_time']);
  } else {
    $examTime = strtotime($exam['schedule_date']);
  }

  $exam['timestamp'] = $examTime;
  $exam['remaining'] = $examTime - $now; // seconds left
}
unset($exam);

// filtering the time data
$exams = array_filter($exams, function ($e) {
  return $e['remaining'] > 0;
});
usort($exams, function ($a, $b) {
  return $a['remaining'] <=> $b['remaining'];
});
$exams = array_slice($exams, 0, 5);

function formatRemaining($seconds)
{

  if ($seconds <= 60) return "Starting now";

  $mins = floor($seconds / 60);
  $hrs = floor($mins / 60);
  $days = floor($hrs / 24);

  if ($mins < 60) return $mins . " min";
  if ($hrs < 24) return $hrs . " hrs";
  if ($days == 1) return "1 day";
  if ($days < 7) return $days . " days";

  $weeks = floor($days / 7);
  return $weeks . " weeks";
}



?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Teacher Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Teacher Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Exams</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clipboard"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $examCount ?></h6>
                    <span class="text-success small pt-1 fw-bold"><?= $examCount ?></span> <span class="text-muted small pt-2 ps-1">Exams Remaining</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Results Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Total Results</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-graph-up-arrow"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $resultCount ?></h6>
                    <span class="text-success small pt-1 fw-bold"><?= $resultCount ?></span> <span class="text-muted small pt-2 ps-1">Results Submitted</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Results Card -->

          <!-- Students Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Students</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $studentCount ?></h6>
                    <span class="text-success small pt-1 fw-bold"><?= $studentCount ?></span> <span class="text-muted small pt-2 ps-1">Active Students</span>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- End Students Card -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Upcoming Exams</h5>

            <div class="activity">

              <?php if (empty($exams)): ?>
                <div class="activity-item d-flex">
                  <div class="activite-label">--</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">No upcoming exams</div>
                </div>
              <?php else: ?>

                <?php foreach ($exams as $index => $exam):
                  $color = $badgeColors[$index] ?? 'secondary';
                  $timeLeft = formatRemaining($exam['remaining']);
                ?>

                  <div class="activity-item d-flex">
                    <div class="activite-label"><?= $timeLeft ?></div>
                    <i class='bi bi-circle-fill activity-badge text-<?= $color ?> align-self-start'></i>
                    <div class="activity-content">
                      <?= htmlspecialchars($exam['name']) ?>
                      <small class="text-muted d-block">
                        (<?= date("d M, h:i A", $exam['timestamp']) ?>)
                      </small>
                    </div>
                  </div>

                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div><!-- End Recent Activity -->
      </div>
      <!-- End Right side columns -->

    </div>
  </section>

</main><!-- End Main -->
<?php require_once('./includes/footer.php'); ?>
