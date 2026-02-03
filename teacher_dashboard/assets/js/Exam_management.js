// Exam Management JS 
var reqType = "EXAM";
var teacher_id = $('#teacher_id').val();
$(document).ready(function () {
    loadTable();
    loadData("CLASS");
    $("#class_id").change(function () {
        let class_id = $("#class_id").val();
        if (class_id != "") {
            loadData("SUBJECT", class_id);
        }
    });
});

function loadData(reqType, class_id) {
    $.ajax({
        type: "POST",
        url: "ajaxApis/select.php",
        data: {
            id: teacher_id,
            class_id,
            reqType
        },
        success: function (data) {
            if (reqType == "SUBJECT") {
                $("#subject_id").html(data);
                $("#edit_subject_id").html(data);
            } else {
                $("#class_id").append(data);
                $("#edit_class_id").append(data);
            }
        }
    });
}

function loadTable() {
    $.ajax({
        url: "./ajaxApis/load.php",
        type: "POST",
        data: {
            id: teacher_id,
            reqType
        },
        success: function (data) {
            let arr = JSON.parse(data);
            let htmlData = '';
            $(arr).each(function (index, val) {
                htmlData += `
                    <tr>
                        <th scope="row">${val.id}</th>
                        <td>${val.name}</td>
                        <td>${val.subject_name}</td>
                        <td>${val.class_name}</td>
                        <td>${val.schedule_date}</td>
                        <td>${val.create_date}</td>
                        <td>${val.starting_time}</td>
                        <td>${val.full_marks}</td>
                        <td>${val.alotted_time}</td>
                        <td>${val.description}</td>
                        `;
                if (val.is_active == 0) {
                    htmlData += `<td><button type="button" class="btn btn-danger" onclick="activate_Deactivate(${val.id},${val.is_active})">Inactive</button>`;
                } else {
                    htmlData += `<td><button type="button" class="btn btn-success" onclick="activate_Deactivate(${val.id}, ${val.is_active})">Active</button>`;
                }
                htmlData += `</td>
                        <td><button type='button' class='btn btn-outline-primary' onclick=edit(${val.id})><i class='bi bi-pencil-fill'></i></button>
                            <button type='button' class='btn btn-outline-danger' onclick=delete_exam(${val.id})><i class='bi bi-trash-fill'></i></button></td>
                    </tr>
                `;
            });
            $("#exam_table tbody").html(htmlData);

        },
        error: function (response) {
            alert(response)
        }
    });

}

function add() {
    let data = {
        exam: $('#examName').val(),
        class_id: $('#class_id').val(),
        subject_id: $('#subject_id').val(),
        date: $('#examDate').val(),
        start_time: $('#examStartTime').val(),
        time: $('#examAllotedTime').val(),
        descripion: $('#examDescription').val(),
        type: Array()
    };

    $.ajax({
        url: "./ajaxApis/insert.php",
        type: "POST",
        data: {
            data,
            reqType

        },
        success: function (responce) {
            $('#examName').val('');
            $('#subject_id').val('');
            $('#class_id').val('');
            $('#examDate').val('');
            $('#examStartTime').val('');
            $('#examAllotedTime').val('');
            $('#examDescription').val('');
            loadTable();
        },
        error: function (response) {
            alert(response)
        }
    });
}

function delete_exam(id) {
    $.ajax({
        type: "POST",
        url: "./ajaxApis/delete.php",
        data: {
            id,
            reqType
        },
        success: function (response) {
            loadTable();
            alert("The Item No." + responce + " is Deleted!!");
        },
        error: function (response) {
            alert(response)
        }
    });
}

function edit(id) {
    $('#add_exam').hide();
    $('#edit_exam').show();
    $('h5').html('Edit Exam Data');

    $.ajax({
        type: "POST",
        url: "./ajaxApis/edit.php",
        data: {
            id,
            reqType
        },
        success: function (data) {
            arr = JSON.parse(data);
            $('#edit_exam_id').val(arr.id);
            $('#edit_exam_name').val(arr.exam_name);
            $('#edit_class_id').html(`<option value='${arr.class_id}' selected>${arr.class_name}</option>`);
            $('#edit_subject_id').html(`<option value='${arr.subject_id}' selected>${arr.subject_name}</option>`);
            $('#edit_examDate').val(arr.schedule_date);
            $('#edit_examStartTime').val(arr.starting_time);
            $('#edit_examAllotedTime').val(arr.alotted_time);
            // $('#edit_examFullMarks').val(arr.full_marks);
            $('#edit_examDescription').val(arr.description);
            loadData("CLASS");
            $("#edit_class_id").change(function () {
                let class_id = $("#edit_class_id").val();
                if (class_id != "") {
                    loadData("SUBJECT", class_id);
                }
            });
        },
        error: function (response) {
            alert(response)
        }
    });

}

function update() {
    let data = {
        id: $('#edit_exam_id').val(),
        exam: $('#edit_exam_name').val(),
        class_id: $('#edit_class_id').val(),
        subject_id: $('#edit_subject_id').val(),
        date: $('#edit_examDate').val(),
        start_time: $('#edit_examStartTime').val(),
        time: $('#edit_examAllotedTime').val(),
        // marks: $('#edit_examFullMarks').val(),
        descripion: $('#edit_examDescription').val(),
        type: Array()
    };
    $.ajax({
        type: "POST",
        url: "./ajaxApis/update.php",
        data: {
            data,
            reqType
        },
        success: function (responce) {
            console.log(responce);
            loadTable();
            alert("The Item is updated !!!");
            location.reload();
        },
        error: function (response) {
            alert(response)
        }
    });

}

function activate_Deactivate(id, status) {
    if (status == 0) {
        status = 1;
    } else {
        status = 0;
    }
    $.ajax({
        type: "POST",
        url: "./ajaxApis/is_active.php",
        data: {
            id,
            status,
            reqType
        },
        success: function (response) {
            loadTable();
        },
        error: function (response) {
            alert(response)
        }
    });
}
