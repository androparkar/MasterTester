<?php
require_once('./includes/header.php');
require_once('./includes/sidebar.php');
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manage Questions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="./Teacher_dashboard.php">Teacher Dashboard</a></li>
                <li class="breadcrumb-item"><a href="./Exam_management.php">Exam</a></li>
                <li class="breadcrumb-item active">Manage Questions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Select Exams</h5>
                        <form id="add_exam">
                            <div class="row g-3">
                                <div class="col-sm-10">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="exam_id">Select Exam</label>
                                        <select class="form-select" id="exam_id">
                                            <option Selected>Choose....</option>
                                            <!-- do not touch here -->
                                        </select>
                                    </div>
                                </div><!-- End of Exam selector -->
                            </div>
                        </form>
                        <input type="hidden" id="teacher_id" value="<?=$userId;?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-0">
                                <h5 class="card-title">Questions List</h5>
                            </div>
                            <div class="col-md-2 mt-2 m-0">
                                <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#addQustions"><i class="bi bi-plus-square-fill"></i> Add more...</button>
                            </div>
                        </div>
                        <hr style="margin-top: 0;">
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable" id="exam_table">
                                <thead>
                                    <tr>
                                        <th>Slno.</th>
                                        <th>Question</th>
                                        <th>Options</th>
                                        <th>Answer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DO NOT TOUCH HERE -->
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

<?php require_once('includes/footer.php'); ?>

<!-- JS File -->
<script src="assets/js/Set_exam_paper.js"></script>

<div class="modal fade" id="addQustions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Qustions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="add_question">
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Question</span>
                        <input type="text" class="form-control" placeholder="Question" id="question" name="question" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 1</span>
                        <input type="text" class="form-control" placeholder="Option 1" id="opt1" name="addOpt1" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 2</span>
                        <input type="text" class="form-control" placeholder="Option 2" id="opt2" name="addOpt2" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 3</span>
                        <input type="text" class="form-control" placeholder="Option 3" id="opt3" name="addOpt3" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 4</span>
                        <input type="text" class="form-control" placeholder="Option 4" id="opt4" name="addOpt4" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Choose Answer</span>
                        <select class="form-select" aria-label="Default select example" name="Answer" id="answer">
                            <option value="">Select</option>
                            <option value="1">1 Option</option>
                            <option value="2">2 Option</option>
                            <option value="3">3 Option</option>
                            <option value="4">4 Option</option>
                        </select>
                    </div>
                    <input type="hidden" id="exam_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="add()">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!-- End Question Add Modal-->

<div class="modal fade" id="editQuestions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Qustions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="add_question">
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Question</span>
                        <input type="text" class="form-control" placeholder="Question" id="edit_question" name="editQuestion" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 1</span>
                        <input type="text" class="form-control" placeholder="Option 1" id="edit_opt1" name="editOpt1" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 2</span>
                        <input type="text" class="form-control" placeholder="Option 2" id="edit_opt2" name="editOpt2" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 3</span>
                        <input type="text" class="form-control" placeholder="Option 3" id="edit_opt3" name="editOpt3" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Option 4</span>
                        <input type="text" class="form-control" placeholder="Option 4" id="edit_opt4" name="editOpt4" required />
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">Choose Answer</span>
                        <select class="form-select" aria-label="Default select example" name="editAnswer" id="edit_answer">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                        </select>
                    </div>
                    <input type="hidden" id="edit_question_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="update()">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!-- End Question Edit Modal-->