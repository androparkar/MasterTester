<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Exam Management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="./Teacher_dashboard.php">Teacher Dashboard</a></li>
        <li class="breadcrumb-item active">Exam</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="mb-3 row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Exams</h5>
            <form id="add_exam">
              <div class="row g-3">
                <div class="col-sm-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="class_id">Select Class</label>
                    <select class="form-select" id="class_id" required>
                      <option selected>Choose...</option>
                      <!-- do not touch here -->
                    </select>
                  </div>
                </div><!-- End of class selector -->

                <div class="col-sm-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="subject_id">Select Subject</label>
                    <select class="form-select" id="subject_id" required>
                      <option selected>Options will appear...</option>
                      <!-- do not touch here -->
                    </select>
                  </div>
                </div><!-- End of subject selector -->

                <div class="col-sm-10">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Exam Name</span>
                    <input type="text" class="form-control" placeholder="Name Here" aria-label="Username" aria-describedby="addon-wrapping" id="examName" required>
                  </div>
                </div><!-- End of Exam name input -->

                <div class="col-sm-4">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Exam Date</span>
                    <input type="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" id="examDate" required>
                  </div>
                </div><!-- End of Date selector -->

                <div class="col-sm-4">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Start Time</span>
                    <input type="time" class="form-control" aria-label="time" aria-describedby="addon-wrapping" id="examStartTime" required>
                  </div>
                </div><!-- End of Starting time selector -->

                <div class="col-sm-4">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Time</span>
                    <input title="Time here is in minutes so for 2 hours you write 120." type="number" class="form-control" aria-label="Full_marks" aria-describedby="addon-wrapping" id="examAllotedTime" required>
                  </div>
                </div><!-- End of Set Alotted Time -->

                <!-- <div class="col-sm-2">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">F.M.</span>
                    <input title="Insert Full Marks." type="number" class="form-control" aria-label="Full_marks" aria-describedby="addon-wrapping" id="examFullMarks" required>
                  </div>
                </div>End of Set Full Marks -->

                <div class="mb-3 col-sm-11">
                  <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea title="Give a description to your Exam." class="form-control" aria-label="Description" style="height: 75px" id="examDescription"></textarea>
                  </div>
                </div>
              </div>
              <input type="hidden" id="teacher_id" value="<?=$userId;?>">
              <input type="hidden" id="exam_id" value="">
              <button type="button" class="btn btn-primary" style="float: right;" onclick='add()'>Add Exam</button>
            </form>
            <form id="edit_exam" style="display: none;">
              <div class="row g-3">
                <div class="col-sm-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="class_id">Select Class</label>
                    <select class="form-select" id="edit_class_id" required>
                      <option selected>Choose...</option>
                      <!-- do not touch here -->
                    </select>
                  </div>
                </div><!-- End of class selector. -->

                <div class="col-sm-6">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="subject_id">Select Subject</label>
                    <select class="form-select" id="edit_subject_id" required>
                      <option selected>Options will appear...</option>
                      <!-- do not touch here -->
                    </select>
                  </div>
                </div><!-- End of subject selector. -->

                <div class="col-sm-10">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Exam Name</span>
                    <input type="text" class="form-control" placeholder="Exam Name Here" aria-label="Examname" aria-describedby="addon-wrapping" id="edit_exam_name" required>
                  </div>
                </div><!-- End of Exam name input. -->

                <div class="col-sm-4">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Exam Date</span>
                    <input type="date" class="form-control" aria-label="date" aria-describedby="addon-wrapping" id="edit_examDate" required>
                  </div>
                </div><!-- End of Date selector. -->

                <div class="col-sm-4">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Start Time</span>
                    <input type="time" class="form-control" aria-label="starting_time" aria-describedby="addon-wrapping" id="edit_examStartTime" required>
                  </div>
                </div><!-- End of Starting time selector. -->

                <div class="col-sm-4">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">Time</span>
                    <input type="number" class="form-control" aria-label="alotted_time" aria-describedby="addon-wrapping" id="edit_examAllotedTime" required>
                  </div>
                </div><!-- End of Set Alotted Time. -->

                <!-- <div class="col-sm-2">
                  <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">F.M.</span>
                    <input type="number" class="form-control" aria-label="Full_marks" aria-describedby="addon-wrapping" id="edit_examFullMarks" required>
                  </div>
                </div> -->
                <!-- End of Set Full Marks. -->

                <div class="mb-3 col-sm-11">
                  <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea title="Give a description to your Exam." class="form-control" aria-label="Description" style="height: 75px" id="edit_examDescription"></textarea>
                  </div>
                </div><!-- End of Set Description. -->

              </div>
              <input type="hidden" id="edit_exam_id">
              <button type="button" class="btn btn-primary mx-1" style="float: right; margin-top: 10px;" onclick='update()'>Update</button>
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
              <h5 class="card-title">Exam List</h5>
            </div>
            <!-- Data Table -->
            <div class="table-responsive">
              <table class="table datatable" id='exam_table'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Exam Name</th>
                    <th>Subject Name</th>
                    <th>Class Name</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Schedule Date</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Create Date</th>
                    <th data-type="time" data-format="HH:MM">Starting Time</th>
                    <th>Full marks</th>
                    <th>Time Alotted</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- do not touch here -->
                </tbody>
              </table>
            </div>
            <!-- End Data Table -->
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require_once('./includes/footer.php'); ?>

<!-- JS File -->
<script src="assets/js/Exam_management.js"></script>