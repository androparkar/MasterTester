$(document).ready(function () {
    loadData();
    $("#exam_id").change(function () {
        loadTable();
    });
});

function loadData() {
    let userId = $("#app").data("userid");
    $.ajax({
        type: "POST",
        url: "./ajaxApis/select.php",
        data: {
            id: userId,
            reqType: 'EXAM'
        },
        success: function (data) {
            let arr = JSON.parse(data);
            let htmlData = '';
            $(arr).each(function (index, val) {
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
        success: function (data) {

            let arr = JSON.parse(data);
            let htmlData = '';
            $(arr).each(function (index, val) {
                let d = new Date(val.submitted_at);
                let formatted = d.toLocaleString('en-IN', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: '2-digit',
                    hour12: true
                });
                htmlData += `
                    <tr>
                    <th scope="row">${val.id}</th>
                    <td>${val.student_name}</td>
                    <td>${val.score}</td>
                    <td>${formatted}</td>
                    <td><button type='button' class='btn btn-outline-danger' onclick="if(confirm('Delete this result permanently?')) delete_result(${val.id})"><i class='bi bi-trash-fill'></i></button></td>
                    </tr>
                    `;
            });
            $("#result_table tbody").html(htmlData);
        },
        error: function (response) {
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
        success: function (response) {
            loadTable();
        },
        error: function (response) {
            alert(response)
        }
    });
}