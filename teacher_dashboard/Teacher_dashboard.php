<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
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
                    <h6>-- total remaining exams--</h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
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
                    <h6>-- total results --</h6>
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
                    <h6>--total number of students --</h6>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- End Students Card -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Uplcoming Exams -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Upcoming </h5>
            <div class="activity">
              <div class="activity-item d-flex">
                <div class="activite-label">This Week</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  No recent activity <a href="#" class="fw-bold text-dark">.</a>
                </div>
              </div><!-- End activity item-->

            </div>

          </div>
        </div><!-- End Recent Activity -->
      </div>
      <!-- End Right side columns -->

    </div>
  </section>

</main><!-- End Main -->
<?php require_once('./includes/footer.php'); ?>