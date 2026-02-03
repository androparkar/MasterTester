// Subject Management JS 
var reqType = "SUBJECT";
$(document).ready(function () {
  loadData();
  loadTable();
});

var teacher_id = $('#teacher_id').val();

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
                        <td>${val.subject_name}</td>
                        <td>${val.class_name}</td>
                        <td>${val.create_date}</td>
                        <td>`;
                        if (val.is_active == 0) {
                          htmlData += `<button type="button" class="btn btn-danger" onclick="activate_Deactivate(${val.id},${val.is_active})">Inactive</button>`;
                        } else {
                          htmlData += `<button type="button" class="btn btn-success" onclick="activate_Deactivate(${val.id}, ${val.is_active})">Active</button>`;
                        }
                        htmlData += 
                        `</td>
                          <td>
                            <button type='button' class='btn btn-outline-primary' onclick=edit(${val.id})><i class='bi bi-pencil-fill'></i></button>
                            <button type='button' class='btn btn-outline-danger' onclick=delete_subject(${val.id})><i class='bi bi-trash-fill'></i></button>
                          </td>
                      </tr>`;
      });
      $("#class_table tbody").html(htmlData);

    },
    error: function (response) {
      alert(response)
    }
  });

}

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
      $("#edit_class_id").append(data);
    }
  });
}

function add() {
  let class_id = $('#class_id').val();
  let subject = $('#subjectName').val();
  $.ajax({
    url: "./ajaxApis/insert.php",
    type: "POST",
    data: {
      subject,
      class_id,
      reqType
    },
    success: function (responce) {
      $('#class_id').val('');
      $('#subjectName').val('');
      loadTable();
    },
    error: function (response) {
      alert(response)
    }
  });
}

function delete_subject(id) {
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
  $('#add_subject').hide();
  $('#edit_subject').show();
  $('h5').html('Edit Subject');

  $.ajax({
    type: "POST",
    url: "./ajaxApis/edit.php",
    data: {
      id,
      reqType
    },
    success: function (data) {
      let arr = JSON.parse(data);
      $('#editSubjectName').val(arr.subject_name);
      $('#edit_subject_id').val(arr.id);
      $('#edit_class_id').html(`<option value='${arr.class_id}' selected>${arr.class_name}</option>`);
      loadData();

    },
    error: function (response) {
      alert(response)
    }
  });

}

function update() {
  let id = $('#edit_subject_id').val();
  let subject = $('#editSubjectName').val();
  let class_id = $('#edit_class_id').val()
  $.ajax({
    type: "POST",
    url: "./ajaxApis/update.php",
    data: {
      id,
      subject,
      class_id,
      reqType
    },
    success: function (responce) {
      loadTable();
      alert("The Item No. "+ responce +" is updated !!!");
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
