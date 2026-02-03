// Student Management JS 
var reqType = "STUDENT";
var teacher_id = $('#teacher_id').val();
$(document).ready(function () {
    loadTable();
    loadData();
});


function loadData() {
    $.ajax({
        type: "POST",
        url: "./ajaxApis/select.php",
        data: {
            id: teacher_id,
            reqType: 'CLASS'
        },
        success: function (data) {
            $("#class_id").append(data);
            $("#ext_class_id").append(data);
            $("#edit_class_id").append(data);
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
                        <td>${val.class_name}</td>
                        <td>${val.email}</td>
                        <td>${val.phone}</td>
                        <td>${val.join_date}</td>
                        <td>`;
                if (val.is_active == 0) {
                    htmlData += `<button type="button" class="btn btn-danger" onclick="activate_Deactivate(${val.id},${val.is_active})">Inactive</button>`;
                } else {
                    htmlData += `<button type="button" class="btn btn-success" onclick="activate_Deactivate(${val.id}, ${val.is_active})">Active</button>`;
                }
                htmlData += `</td>
                        <td>
                          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editStudent" onclick=edit(${val.id})><i class='bi bi-pencil-fill'></i></>
                          <button type='button' class='btn btn-outline-danger' onclick=delete_student(${val.id})><i class='bi bi-trash-fill'></i></button>
                        </td>
                    </tr>`;
            });
            $('#student_table tbody').html(htmlData);

        }
    });
}

function loadStudent() {
    let id = $('#ext_stu_id').val();
    let email = $('#ext_stu_email').val();
    $.ajax({
        type: "POST",
        url: "./ajaxApis/select.php",
        data: {
            id,
            teacher_id,
            email,
            reqType
        },
        success: function (data) {
            let arr = JSON.parse(data);
            $("#ext_stu_id").val(arr.id);
            $("#ext_stu_name").val(arr.name);
            $("#ext_stu_email").val(arr.email);
        }
    });


}

function add(tech_id) {
    let name = $('#stu_name').val();
    let email = $('#stu_email').val();
    let phone_num = $('#stu_ph_num').val();
    let class_id = $('#class_id').val();
    let password = $('#stu_password').val();
    $.ajax({
        url: "./ajaxApis/insert.php",
        type: "POST",
        data: {
            name,
            class_id,
            email,
            phone_num,
            password,
            tech_id,
            reqType
        },
        success: function (data) {
            loadTable();
            loadData();
        }
    });
}

function add_existing(tech_id) {
    let id = $('#ext_stu_id').val();
    let class_id = $('#ext_class_id').val();
    $.ajax({
        url: "./ajaxApis/insert.php",
        type: "POST",
        data: {
            id,
            class_id,
            tech_id,
            reqType: "EXT_STUDENT"
        },
        success: function (data) {
            loadTable();
            loadData();
        }
    });


}

function edit(id) {
    $.ajax({
        type: "POST",
        url: "./ajaxApis/edit.php",
        data: {
            id,
            reqType
        },
        success: function (data) {
            arr = JSON.parse(data);
            $('#stu_edit_name').val(arr.name);
            $('#stu_edit_email').val(arr.email);
            $('#stu_edit_ph_num').val(arr.phone);
            $('#stu_edit_id').val(arr.id);
            $('#edit_class_id').html(`<option value='${arr.class_id}' selected>${arr.class_name}</option>`);
            loadData();
        },
        error: function (response) {
            alert(response)
        }
    });
}

function update() {
    let name = $('#stu_edit_name').val();
    let email = $('#stu_edit_email').val();
    let phone_num = $('#stu_edit_ph_num').val();
    let id = $('#stu_edit_id').val()
    let class_id = $('#edit_class_id').val()
    $.ajax({
        type: "POST",
        url: "./ajaxApis/update.php",
        data: {
            id,
            name,
            class_id,
            email,
            phone_num,
            reqType
        },
        success: function (responce) {
            loadTable();
            alert("The Item No."+ responce +" is updated !!!");
            location.reload();
        },
        error: function (response) {
            alert(response)
        }
    });

}

function delete_student(id) {
    $.ajax({
        type: "POST",
        url: "./ajaxApis/delete.php",
        data: {
            id,
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
