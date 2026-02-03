// Class Management JS
var reqType = "CLASS";
$(document).ready(function () {
    loadTable();
});

function loadTable() {
    let id = $('#teacher_id').val();
    $.ajax({
        url: "./ajaxApis/load.php",
        type: "POST",
        data: {
            id,
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
                        <td>${val.create_date}</td>
                        <td>`;
                if (val.is_active == 0) {
                    htmlData += `<button type="button" class="btn btn-danger" onclick="activate_Deactivate(${val.id},${val.is_active})">Inactive</button>`;
                } else {
                    htmlData += `<button type="button" class="btn btn-success" onclick="activate_Deactivate(${val.id}, ${val.is_active})">Active</button>`;
                }
                htmlData += `</td>
                        <td><button type='button' class='btn btn-outline-primary' onclick=edit(${val.id})><i class='bi bi-pencil-fill'></i></button><button type='button' class='btn btn-outline-danger' onclick=delete_class(${val.id})><i class='bi bi-trash-fill'></i></button></td>
                    </tr>
                `;
            });
            $("#class_table tbody").html(htmlData);

        },
        error: function (response) {
            alert(response)
        }
    });

}

function add() {
    let id = $('#teacher_id').val()
    let className = $('#className').val()
    $.ajax({
        url: "./ajaxApis/insert.php",
        type: "POST",
        data: {
            id,
            className,
            reqType
        },
        success: function (data) {
            $('#className').val('');
            loadTable();
        },
        error: function (response) {
            alert(response)
        }
    });
}

function delete_class(id) {
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
    $('#add_class').hide();
    $('#edit_class').show();
    $('h5').html('Edit class');

    $.ajax({
        type: "POST",
        url: "./ajaxApis/edit.php",
        data: {
            id,
            reqType
        },
        success: function (data) {
            arr = JSON.parse(data);
            $('#className_edit').val(arr.name)
            $('#class_edit_id').val(arr.id)

        },
        error: function (response) {
            alert(response)
        }
    });

}

function update() {
    let name = $('#className_edit').val();
    let id = $('#class_edit_id').val()
    $.ajax({
        type: "POST",
        url: "./ajaxApis/update.php",
        data: {
            id,
            name,
            reqType
        },
        success: function (responce) {
            loadTable();
            alert("The Item No." + responce + " is updated!!");
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
