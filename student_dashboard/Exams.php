<?php
require_once("./includes/header.php");
require_once("./includes/sidebar.php");
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1 class="fw-bold display-4 mb-3">Exam Dashboard</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item">Student</li>
        <li class="breadcrumb-item active" aria-current="page">Exam</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row g-4">
      <div class="col-lg-10">
        <div class="row" id="examPanel">
          <!-- <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">No Exams Today</h5>
                <p>Enjoy your day off and take some time to relax. You've earned it!</p>

              </div>
            </div> -->
          <!-- End Default Card -->
          <!-- </div>
          <div class="col-lg-2"></div> -->
          <!-- Science Exam Card -->
          <!-- <div class="col-lg-4 col-md-6">
              <div class="card shadow-lg overflow-hidden">
                <div class="card-body ">
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold text-dark mb-0">Science</h5>
                    <span class="badge bg-success">Available</span>
                  </div>
                  <div class="exam-details">
                    <p class="mb-2"><i class="bi bi-calendar3 me-2"></i><strong>Date:</strong> <span
                        class="text-secondary">12th February 2025</span></p>
                    <p class="mb-2"><i class="bi bi-clock me-2"></i><strong>Time:</strong> <span
                        class="text-secondary">1:00 PM - 3:00 PM</span></p>
                    <p class="mb-4"><i class="bi bi-journal-text me-2"></i><strong>Description:</strong> Includes
                      physics,
                      chemistry, and biology topics.</p>
                  </div>
                  <a href="Exam_paper.php"class="btn btn-primary w-100 py-2 fw-semibold" >Start Exam</a>
                </div>
              </div>
            </div> -->
          <!-- End of Science card -->

          <!-- History Exam Card -->
          <!-- <div class="col-lg-4 col-md-6">
              <div class="card  shadow-lg overflow-hidden">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold text-dark mb-0">History</h5>
                    <span class="badge bg-success">Available</span>
                  </div>
                  <div class="exam-details">
                    <p class="mb-2"><i class="bi bi-calendar3 me-2"></i><strong>Date:</strong> <span
                        class="text-secondary">14th February 2025</span></p>
                    <p class="mb-2"><i class="bi bi-clock me-2"></i><strong>Time:</strong> <span
                        class="text-secondary">2:00 PM - 4:00 PM</span></p>
                    <p class="mb-4"><i class="bi bi-journal-text me-2"></i><strong>Description:</strong> Exam on world
                      history and civilizations.</p>
                  </div>
                  <button class="btn btn-primary w-100 py-2 fw-semibold">Start Exam</button>
                </div>
              </div>
            </div> -->
          <!-- End of History card -->

          <!-- Mathematics Exam Card -->
          <!-- <div class="col-lg-4 col-md-6">
              <div class="card shadow-lg overflow-hidden">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold text-dark mb-0">Mathematics</h5>
                    <span class="badge bg-warning text-dark">Upcoming</span>
                  </div>
                  <div class="exam-details">
                    <p class="mb-2"><i class="bi bi-calendar3 me-2"></i><strong>Date:</strong> <span
                        class="text-secondary">10th February 2025</span></p>
                    <p class="mb-2"><i class="bi bi-clock me-2"></i><strong>Time:</strong> <span
                        class="text-secondary">10:00 AM - 12:00 PM</span></p>
                    <p class="mb-4"><i class="bi bi-journal-text me-2"></i><strong>Description:</strong> Covers algebra,
                      calculus, and geometry topics.</p>
                  </div>
                  <button class="btn btn-primary w-100 py-2 fw-semibold" disabled>Start Exam</button>
                </div>
              </div>
            </div> -->
          <!-- End of Maths card -->
        </div>
      </div>
      <!-- End of left side coloumn -->

      <div class="col-lg-2">
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title"> Upcoming Exams</h5>
            <div id="upcomingExams" style="min-height: 200px;"></div>
          </div>
        </div>
      </div>
      <!-- End of Right side coloumn -->
    </div>
  </section>
</main> <!-- End #main -->
<?php require_once('./includes/footer.php'); ?>


<script>
  var reqType = "QUESTION";
  let append = false;
  $(document).ready(function() {
    loadData();
  });

  function loadData() {
    const date = new Date();
    var currentDate = date.toLocaleDateString('en-CA');
    var currentTime = date.toLocaleTimeString('en-US', {
      hour12: false
    });

    $.ajax({
      type: "POST",
      url: "./ajaxApis/load.php",
      data: {
        reqType: 'EXAM',
        class_id: <?= $classId; ?>
      },
      success: function(data) {
        let htmlData = '';
        if (data == 0) {
          htmlData = `
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title">No Exams Today</h5>
                  <p>Enjoy your day off and take some time to relax. You've earned it!</p>

                </div>
              </div>
              <!-- End Default Card -->
            </div>
            <div class="col-lg-2"></div>          
          `;
          $('#examPanel').html(htmlData);
        } else {
          let arr = JSON.parse(data);
          $(arr).each(function(index, val) {
            let timeParts = val.starting_time.split(":"); // Split the time string
            let date = new Date(); // Create a temporary date object
            // Set hours, minutes, and seconds from the time string
            date.setHours(parseInt(timeParts[0], 10));
            date.setMinutes(parseInt(timeParts[1], 10) + 10); // Add 10 minutes
            date.setSeconds(parseInt(timeParts[2], 10));

            let startTime = date.toTimeString().split(" ")[0];
            if (val.schedule_date == currentDate) {
              if (startTime > currentTime) {
                let res = formatTime(val.starting_time, val.alotted_time);
                htmlData = `
                  <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg overflow-hidden">
                      <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="card-title fw-bold text-dark mb-0">${val.name}</h5>
                          <span class="badge bg-success">Available</span>
                        </div>
                        <div class="exam-details">
                          <p class="mb-2"><i class="bi bi-calendar3 me-2"></i><strong>Date:</strong> <span
                              class="text-secondary">${formatDate(val.schedule_date)}</span></p>
                          <p class="mb-2"><i class="bi bi-clock me-2"></i><strong>Time:</strong> <span
                              class="text-secondary">${res.startTime}-${res.endTime}</span></p>
                          <p class="mb-4"><i class="bi bi-journal-text me-2"></i><strong>Description:</strong> <span class="text-secondary">${val.description}</span></p>
                        </div>
                        <a href="Exam_paper.php?exam_id=${val.id} " class="btn btn-primary w-100 py-2 fw-semibold" >Start Exam</a>
                      </div>
                    </div>
                  </div>
                `;
                $('#examPanel').append(htmlData);
              } else if (startTime <= currentTime) {
                let res = formatTime(val.starting_time, val.alotted_time);
                htmlData = `
                  <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg overflow-hidden">
                      <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h5 class="card-title fw-bold text-dark mb-0">${val.name}</h5>
                          <span class="badge bg-danger">Expired</span>
                        </div>
                        <div class="exam-details">
                          <p class="mb-2"><i class="bi bi-calendar3 me-2"></i><strong>Date:</strong> <span
                              class="text-secondary">${formatDate(val.schedule_date)}</span></p>
                          <p class="mb-2"><i class="bi bi-clock me-2"></i><strong>Time:</strong> <span
                              class="text-secondary">${res.startTime}-${res.endTime}</span></p>
                          <p class="mb-4"><i class="bi bi-journal-text me-2"></i><strong>Description:</strong><span class="text-secondary">${val.description}</span></p>
                        </div>
                        <button class="btn btn-primary w-100 py-2 fw-semibold" disabled>Start Exam</button>
                      </div>
                    </div>
                  </div>
                `;
                $('#examPanel').append(htmlData);
              }
            } else {
              let res = formatTime(val.starting_time, val.alotted_time);
              htmlData = `
                <div class="col-lg-4 col-md-6">
                  <div class="card shadow-lg overflow-hidden">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold text-dark mb-0">${val.name}</h5>
                        <span class="badge bg-warning text-dark">Upcoming</span>
                      </div>
                      <div class="exam-details">
                        <p class="mb-2"><i class="bi bi-calendar3 me-2"></i><strong>Date:</strong> <span
                            class="text-secondary">${formatDate(val.schedule_date)}</span></p>
                        <p class="mb-2"><i class="bi bi-clock me-2"></i><strong>Time:</strong> <span
                            class="text-secondary">${res.startTime}-${res.endTime}</span></p>
                        <p class="mb-4"><i class="bi bi-journal-text me-2"></i><strong>Description:</strong><span class="text-secondary"> ${val.description}</span></p>
                      </div>
                      <button class="btn btn-primary w-100 py-2 fw-semibold" disabled>Start Exam</button>
                    </div>
                  </div>
                </div> 
              `;
              $('#examPanel').append(htmlData);

            }
          });
        }
      }
    });
  }

  function formatDate(dateString) {
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    const date = new Date(dateString);
    const day = date.getDate();
    const month = months[date.getMonth()];
    const year = date.getFullYear();

    return `${day} ${month} ${year}`;
  }

  function formatTime(time, min) {
    // Create a Date object with the given time string
    let timeParts = time.split(":");
    let date = new Date();
    date.setHours(timeParts[0], timeParts[1], timeParts[2]);


    // Format to 12-hour time with AM/PM
    let options = {
      hour: 'numeric',
      minute: 'numeric',
      hour12: true
    };
    let startTime = date.toLocaleString('en-US', options);

    // Add minutes
    date.setMinutes(date.getMinutes() + parseInt(min, 10));
    let endTime = date.toLocaleString('en-US', options);

    return {
      startTime,
      endTime
    };
  }
</script>