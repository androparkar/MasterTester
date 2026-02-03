<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Subject Management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="Teacher_dashboard.php">Teacher Dashboard</a></li>
        <li class="breadcrumb-item active">Subject Management</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="mb-3 row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Subject</h5>
            <form id="add_subject">
              <div class="input-group mb-3">
                <label class="input-group-text" for="class_id">Select Class</label>
                <select class="form-select" id="class_id" required>
                  <option selected>Choose...</option>
                  <!-- do not touch here -->
                </select>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Subject Name</span>
                <input type="text" class="form-control" placeholder="Name Here" aria-label="Username" aria-describedby="addon-wrapping" id="subjectName" required>
              </div>
              <input type="hidden" id="teacher_id" value="<?= $userId; ?>">
              <button type="button" class="btn btn-primary" style="float: right;" onclick='add()'>Add Subject</button>
            </form>
            <form id="edit_subject" style="display: none;">
              <div class="input-group mb-3">
                <label class="input-group-text" for="edit_class_id">Select Class</label>
                <select class="form-select" id="edit_class_id" required>
                  <option selected>Choose...</option>
                  <!-- do not touch here -->
                </select>
              </div>
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Subject Name</span>
                <input type="text" class="form-control" placeholder="Name Here" aria-label="Username" aria-describedby="addon-wrapping" id="editSubjectName" required>
              </div>

              <input type="hidden" id="edit_subject_id">
              <button type="button" class="btn btn-primary" style="float: right; margin-top: 10px;" onclick='update()'>Update</button>
              <button type="reset" class="btn btn-danger" style="float: right; margin-top: 10px;">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="col">
              <h5 class="card-title">Subject List</h5>
            </div>
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable" id='class_table'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Class Name</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Create Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- do not touch here -->
                </tbody>
              </table>
            </div>
            <!-- End Table with stripped rows -->
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require_once('./includes/footer.php'); ?>

<!-- JS File -->
<script src="assets/js/Subject_management.js"></script>