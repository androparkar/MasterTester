<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Result Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="./Teacher_dashboard.php">Teacher Dashboard</a></li>
                <li class="breadcrumb-item active">Result Management</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
<p>please change this page this needs fix</p>
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
                        <input type="hidden" id="teacher_id" value="<?= $userId; ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Results</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped table-hover datatable" id="result_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student name</th>
                                    <th>Result</th>
                                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Exam Date</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- do not touch here -->
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php require_once('./includes/footer.php'); ?>
<script>
    $(document).ready(function() {
        loadData();
        $("#exam_id").change(function() {
            loadTable();
        });
    });

    function loadData() {
        $.ajax({
            type: "POST",
            url: "./ajaxApis/select.php",
            data: {
                id: <?= $userId; ?>,
                reqType: 'EXAM'
            },
            success: function(data) {
                let arr = JSON.parse(data);
                let htmlData = '';
                $(arr).each(function(index, val) {
                    htmlData = `<option value='${val.id}' >${val.name}</option>`;
                    $('#exam_id').append(htmlData);
                });
            }
        });
    }

    function loadTable() {
        let id = $("#exam_id").val();
        $.ajax({
            type: "POST",
            url: "./ajaxApis/load.php",
            data: {
                id,
                reqType: "RESULT"
            },
            success: function(data) {

                let arr = JSON.parse(data);
                let htmlData = '';
                $(arr).each(function(index, val) {
                    htmlData += `
                    <tr>
                    <th scope="row">${val.id}</th>
                    <td>${val.student_name}</td>
                    <td>${val.result}</td>
                    
                    <td><button type='button' class='btn btn-outline-danger' onclick=delete_result(${val.id})><i class='bi bi-trash-fill'></i></button></td>
                    </tr>
                    `;
                });
                $("#result_table tbody").html(htmlData);
            },
            error: function(response) {
                alert(response)
            }
        });

    }


    function delete_result(id) {
        $.ajax({
            type: "POST",
            url: "./ajaxApis/delete.php",
            data: {
                id,
                reqType: "RESULT"
            },
            success: function(response) {
                loadTable();
            },
            error: function(response) {
                alert(response)
            }
        });
    }

    function download(id) {
        // $('#add_class').hide();
        // $('#edit_class').show();
        // $('h5').html('Edit class');

        // $.ajax({
        //     type: "POST",
        //     url: "./ajaxApis/edit.php",
        //     data: {
        //         id,
        //         reqType
        //     },
        //     success: function (data) {
        //         arr = JSON.parse(data);
        //         $('#className_edit').val(arr.name)
        //         $('#class_edit_id').val(arr.id)

        //     },
        //     error: function (response) {
        //         alert(response)
        //     }
        // });

        // <button type='button' class='btn btn-outline-success' onclick=download(${val.id})><i class="bi bi-box-arrow-in-down"></i></button>
    }
</script>