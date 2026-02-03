<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Student Management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Teacher Dashboard</li>
        <li class="breadcrumb-item active">Student Management</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="col">
              <h5 class="card-title">Student List</h5>
            </div>
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable" id='student_table'>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
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
            <input type="hidden" id="teacher_id" value="<?= $userId; ?>">
            <button type="button" class="btn btn-primary m-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#addStudent">New Student</button>
            <button type="button" class="btn btn-info m-1" style="float: right;" data-bs-toggle="modal" data-bs-target="#addExistingStudent">Existing Student</button>
          </div>
          <div class="card-footer">
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require_once('./includes/footer.php'); ?>

<!-- JS File -->
<script src="assets/js/Student_management.js"></script>

<div class="modal fade" id="addStudent" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="add_student">
          <div class="col-12">
            <label for="stu_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="stu_name" placeholder="Student Name" required>
          </div> <!-- name -->

          <div class="col-md-6">
            <label for="stu_email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Student Email" id="stu_email" required>
          </div> <!-- Email -->

          <div class="col-md-6">
            <label for="stu_password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="8-20 characters long." id="stu_password" required>
          </div>

          <div class="col-md-10">
            <label for="stu_ph_num" class="form-label">Phone No.</label>
            <input type="text" class="form-control" placeholder="Student number" id="stu_ph_num" required>
          </div> <!-- Phone Number -->

          <div class="col-md-12">
            <div class="input-group mb-3">
              <label class="input-group-text" for="class_id">Select Class</label>
              <select class="form-select" id="class_id">
                <option selected>Choose...</option>
                <!-- do not touch -->
              </select>
            </div>
          </div><!-- Class -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="add()">Submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- End Add New Student Modal-->

<div class="modal fade" id="addExistingStudent" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Existing Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="add_ext_student">
          <div class="col-md-6">
            <label for="stu_email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Student Email" id="ext_stu_email" onchange="loadStudent()">
          </div> <!-- Email -->
          <div class="col-md-6">
            <label for="stu_ph_num" class="form-label">ID No.</label>
            <input type="number" class="form-control" placeholder="Student ID" id="ext_stu_id" onchange="loadStudent()">
          </div> <!-- ID Number -->

          <div class="col-md-12">
            <label for="stu_ph_num" class="form-label">User Name</label>
            <input type="text" class="form-control" placeholder="Name" id="ext_stu_name" disabled>
          </div> <!-- ID Number -->
          <div class="col-md-12">
            <div class="input-group mb-3">
              <label class="input-group-text" for="ext_class_id">Select Class</label>
              <select class="form-select" id="ext_class_id">
                <option selected>Choose...</option>
                <!-- do not touch -->
              </select>
            </div>
          </div><!-- Student -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="add_existing(<?= $userId ?>)">Submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- End Add Existing Student Modal-->

<div class="modal fade" id="editStudent" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="edit_student">
          <div class="col-12">
            <label for="stu_edit_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="stu_edit_name" placeholder="Student Name" required>
          </div> <!-- name -->
          <div class="col-md-6">
            <label for="stu_edit_email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Student Email" id="stu_edit_email" required>
          </div> <!-- Email -->
          <div class="col-md-6">
            <label for="stu_edit_ph_num" class="form-label">Phone No.</label>
            <input type="number" class="form-control" placeholder="Student number" id="stu_edit_ph_num" required>
          </div> <!-- phone number -->
          <div class="col-md-12">
            <div class="input-group mb-3">
              <label class="input-group-text" for="edit_class_id">Select Class</label>
              <select class="form-select" id="edit_class_id">
                <!-- do not touch -->
              </select>
            </div>
          </div><!-- Class -->
          <input type="hidden" id="stu_edit_id"> <!-- STUDENT ID -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="update()">Submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- End Student Edit Modal-->