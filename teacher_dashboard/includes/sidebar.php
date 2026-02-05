<?php 
  $currentPage = basename($_SERVER['PHP_SELF']);
?>
 
 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Teacher_dashboard.php') ? '' : 'collapsed'; ?>" href="Teacher_dashboard.php">
          <i class="bi bi-grid"></i>
          <span> Teacher Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Class_management.php') ? '' : 'collapsed'; ?>" data-bs-target="#Class-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Class_management.php') ? 'true' : 'false'; ?>" >
          <i class="bi bi-journal-bookmark-fill"></i></i><span>Class</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Class-nav" class="nav-content collapse  <?= ($currentPage === 'Class_management.php') ? 'show' : ''; ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./Class_management.php" class="<?= ($currentPage === 'Class_management.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Manage Classes</span>
            </a>
          </li>
        </ul>
      </li><!-- End Class Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Subject_management.php') ? '' : 'collapsed'; ?>" data-bs-target="#subject-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Subject_management.php') ? 'true' : 'false'; ?>">
          <i class="bi bi-book-half"></i><span>Subject</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="subject-nav" class="nav-content collapse  <?= ($currentPage === 'Subject_management.php') ? 'show' : ''; ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./Subject_management.php" class="<?= ($currentPage === 'Subject_management.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Manage Subject</span>
            </a>
          </li>
        </ul>
      </li><!-- End Subject Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Student_management.php') ? '' : 'collapsed'; ?>" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Student_management.php') ? 'true' : 'false'; ?>">
          <i class="bi bi-mortarboard-fill"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="student-nav" class="nav-content collapse  <?= ($currentPage === 'Student_management.php') ? 'show' : ''; ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./Student_management.php" class="<?= ($currentPage === 'Student_management.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Manage Students</span>
            </a>
          </li>
        </ul>
      </li><!-- End Student Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Exam_management.php'|| $currentPage === 'Set_exam_paper.php') ? '' : 'collapsed'; ?>" data-bs-target="#exam-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Exam_management.php' || $currentPage === 'Set_exam_paper.php')? 'true' : 'false'; ?>">
          <i class="bi bi-file-earmark-medical"></i></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="exam-nav" class="nav-content collapse  <?= ($currentPage === 'buttons.php') ? 'show' : ''; ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./Exam_management.php" class="<?= ($currentPage === 'Exam_management.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Manage Exams</span>
            </a>
          </li>
          <li>
            <a href="./Set_exam_paper.php" class="<?= ($currentPage === 'Set_exam_paper.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Set Papers</span>
            </a>
          </li>
        </ul>
      </li><!-- End Exam Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Results.php') ? '' : 'collapsed'; ?>" data-bs-target="#result-nav" data-bs-toggle="collapse" href="#" aria-expanded="<?= ($currentPage === 'Results.php') ? 'true' : 'false'; ?>">
          <i class="bi bi-clipboard-data-fill"></i><span>Results</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="result-nav" class="nav-content collapse  <?= ($currentPage === 'Results.php') ? 'show' : ''; ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Results.php" class="<?= ($currentPage === 'Results.php') ? 'active' : '';?>">
              <i class="bi bi-circle"></i><span>Manage Results</span>
            </a>
          </li>
        </ul>
      </li><!-- End Result Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Teacher_profile.php') ? '' : 'collapsed'; ?>" href="Teacher_profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Class_management.php') ? '' : 'collapsed'; ?>" href="./Class_management.php" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-clipboard2"></i>
          <span>Create a Class</span>
        </a>
      </li><!-- End Class Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Subject_management.php') ? '' : 'collapsed'; ?>" href="./Subject_management.php" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-lightbulb"></i>
          <span>Subjects</span>
        </a>
      </li><!-- End SUBJECTS Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?= ($currentPage === 'Exam_management.php') ? '' : 'collapsed'; ?>" href="./Exam_management.php" target="_blank" rel="noopener noreferrer">
          <i class="bi bi-question-circle"></i>
          <span>Exams</span>
        </a>
      </li><!-- End EXAM Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->