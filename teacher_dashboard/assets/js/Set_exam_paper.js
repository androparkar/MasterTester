// Set_exam_paper JS
var reqType = "QUESTION";
var append = false;
var teacher_id = $('#teacher_id').val();
$(document).ready(function () {
    loadData();
    $("#exam_id").change(function () {
        loadTable();
    });
});

function loadData() {
    $.ajax({
        type: "POST",
        url: "./ajaxApis/select.php",
        data: {
            id: teacher_id,
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
        url: "./ajaxApis/load.php",
        type: "POST",
        data: {
            id,
            reqType: 'QUESTION'
        },
        success: function (data) {
            let arr = JSON.parse(data);
            let htmlData = '';
            let counter = 1;
            $(arr).each(function (index, val) {
                htmlData += `
                    <tr>
                        <th scope="row">${counter}</th>
                        <td>${val.question_text}</td>
                        <td>${val.options}</td>
                        <td>${val.answer}</td>
                        <td>
                          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editQuestions" onclick=edit(${val.id})><i class='bi bi-pencil-fill'></i></>
                          <button type='button' class='btn btn-outline-danger' onclick=delete_question(${val.id})><i class='bi bi-trash-fill'></i></button>
                        </td>
                    </tr>`;
                counter++;
            });
            $('#exam_table tbody').html(htmlData);
        }
    });
}

function add() {
    let data = {
        exam_id: $('#exam_id').val(),
        question: $('#question').val(),
        opt1: $('#opt1').val(),
        opt2: $('#opt2').val(),
        opt3: $('#opt3').val(),
        opt4: $('#opt4').val(),
        answer: $('#answer').val(),
        type: Array()
    }
    $.ajax({
        type: "POST",
        url: "./ajaxApis/insert.php",
        data: {
            reqType,
            data
        },
        success: function (response) {
            $('#question').val('');
            $('#opt1').val('');
            $('#opt2').val('');
            $('#opt3').val('');
            $('#opt4').val('');
            $('#answer').val('');
            loadTable();
            loadData();
        },
        error: function (response) {
            alert(response)
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
            let arr = JSON.parse(data);
            let segments = arr.options.split(',');
            $('#edit_question_id').val(id);
            $('#edit_question').val(arr.question_text);
            $('#edit_opt1').val(segments[0]);
            $('#edit_opt2').val(segments[1]);
            $('#edit_opt3').val(segments[2]);
            $('#edit_opt4').val(segments[3]);
            if (append == false) {
                $('#edit_answer').append(`<option selected>Option ${arr.answer}</option>`);
                append = true;
                loadData();
            }

        },
        error: function (response) {
            alert(response)
        }
    });
}

function update() {
    let data = {
        id: $('#edit_question_id').val(),
        question: $('#edit_question').val(),
        opt1: $('#edit_opt1').val(),
        opt2: $('#edit_opt2').val(),
        opt3: $('#edit_opt3').val(),
        opt4: $('#edit_opt4').val(),
        answer: $('#edit_answer').val(),
        type: Array()
    }
    $.ajax({
        type: "POST",
        url: "./ajaxApis/update.php",
        data: {
            data,
            reqType
        },
        success: function (responce) {
            loadTable();
            alert("The Item No." + responce + " is updated !!!");
            location.reload();
        },
        error: function (response) {
            alert(response)
        }
    });

}

function delete_question(id) {
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
