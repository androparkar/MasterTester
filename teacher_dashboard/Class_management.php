<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Class Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="./Teacher_dashboard.php">Teacher Dashboard</a></li>
                <li class="breadcrumb-item active">Class Management</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="mb-3 row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Class</h5>
                        <form id="add_class">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Class Name</span>
                                <input type="text" class="form-control" placeholder="Name Here" aria-label="Username" aria-describedby="addon-wrapping" id="className">
                            </div>
                            <input type="hidden" id="teacher_id" value="<?= $userId; ?>">
                            <button type="button" class="btn btn-primary" style="float: right; margin-top: 10px;" onclick='add()'>Add Class</button>
                        </form>
                        <form id="edit_class" style="display: none;">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">@</span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" id="className_edit">
                            </div>
                            <input type="hidden" id="class_edit_id">
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
                            <h5 class="card-title">Class List</h5>
                        </div>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable" id='class_table'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
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
<script src="assets/js/Class_management.js"></script>