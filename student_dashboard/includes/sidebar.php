<?php 
  $currentPage = basename($_SERVER['PHP_SELF']);
?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Student_dashboard.php') ? '' : 'collapsed'; ?>" href="./Student_dashboard.php">
          <i class="bi bi-grid"></i>
          <span> Student Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Exams.php') ? '' : 'collapsed'; ?>" data-bs-target="#exam-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Exams.php') ? 'true' : 'false'; ?>">
          <i class="bi bi-journal-text"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="exam-nav" class="nav-content collapse <?= ($currentPage === 'Exams.php') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="./Exams.php" class="<?= ($currentPage === 'Exams.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Exams</span>
            </a>
          </li>
        </ul>
      </li><!-- End Exam Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Student_Results.php') ? '' : 'collapsed'; ?>" data-bs-target="#result-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Student_Results.php') ? 'true' : 'false'; ?>">
          <i class="bi bi-clipboard-data-fill"></i><span>Results</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="result-nav" class="nav-content collapse <?= ($currentPage === 'Student_Results.php') ? 'show' : ''; ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Student_Results.php" class="<?= ($currentPage === 'Student_Results.php') ? 'active' : ''; ?>">
              <i class="bi bi-circle"></i><span>Show Results</span>
            </a>
          </li>
        </ul>
      </li><!-- End Result Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Student_profile.php') ? '' : 'collapsed'; ?>" href="./Student_profile.php" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Classes.php') ? '' : 'collapsed'; ?>" href="#">
          <i class="bi bi-clipboard2"></i>
          <span>Class</span>
        </a>
      </li><!-- End Class Page Nav -->
      <!-- // TODO: add view enrolled/assigned classes  -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Exams.php') ? '' : 'collapsed'; ?>" href="./Exams.php">
          <i class="bi bi-question-circle"></i>
          <span>Exams</span>
        </a>
      </li><!-- End EXAM Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->