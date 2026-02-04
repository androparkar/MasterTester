<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
$email = $loginUserDetails['email'];
$phone = $loginUserDetails['phone'];
$address = $loginUserDetails['address'];
$about = $loginUserDetails['about_comment'];
?>
<style>
    .is-invalid {
        border: 2px solid red;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>My Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Teacher</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2><?= $fullName; ?></h2>
                        <h3>Teacher</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic"><?= $about; ?></p>
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $fullName; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $address; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">+91 <?= $phone; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $email; ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile" id="profileImage">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tech_prof_name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="tech_prof_name" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tech_prof_about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="tech_prof_about" style="height: 100px"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tech_prof_address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="tech_prof_address" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tech_prof_phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="tech_prof_phone" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tech_prof_email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="tech_prof_email" value="">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="hidden" id="tech_prof_id">
                                        <button type="button" class="btn btn-primary" onclick="update();">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="currentPassword">
                                            <span id="wrongPasswordMessage" class="text-danger mt-1" style="display: none;">! Wrong Password</span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                            <span id="passwordMismatchError" class="text-danger mt-1" style="display: none;">! New Passwords Mis-match</span>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="checkPassword();">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include_once('includes/footer.php'); ?>
<script>
    $(document).ready(function() {
        edit();
    });


    function edit() {
        $.ajax({
            type: "POST",
            url: "./ajaxApis/edit.php",
            data: {
                id: <?= $userId; ?>,
                reqType: "TEACHER"
            },
            success: function(data) {
                arr = JSON.parse(data);
                $('#tech_prof_name').val(arr.name);
                $('#tech_prof_email').val(arr.email);
                $('#tech_prof_phone').val(arr.phone);
                $('#tech_prof_address').val(arr.address);
                $('#tech_prof_about').val(arr.about_comment);
                $('#tech_prof_id').val(arr.id);
            },
            error: function(response) {
                alert(response)
            }
        });
    }

    function update() {
        let data = {
            name: $('#tech_prof_name').val(),
            email: $('#tech_prof_email').val(),
            phone_num: $('#tech_prof_phone').val(),
            address: $('#tech_prof_address').val(),
            about: $('#tech_prof_about').val(),
            id: $('#tech_prof_id').val(),
            type: Array()
        }

        $.ajax({
            type: "POST",
            url: "./ajaxApis/update.php",
            data: {
                data,
                reqType: 'TEACHER'
            },
            success: function() {
                alert("Successfully updated !!!");
                location.reload();
            },
            error: function(response) {
                alert(response)
            }
        });

    }

    function checkPassword() {
        let currentPassword = $('#currentPassword').val();
        $.ajax({
            type: "POST",
            url: "./ajaxApis/edit.php",
            data: {
                id: <?= $userId; ?>,
                reqType: 'PASSWORD'
            },
            success: function(response) {
                let arr = JSON.parse(response);
                let key = arr.password;
                if (key == currentPassword) {
                    updatePassword();
                } else {
                    $('#currentPassword').addClass('is-invalid');
                    $('#wrongPasswordMessage').show();
                }
            },
            error: function(response) {
                alert(response);
            }
        });

    }

    function updatePassword() {
        let currentPassword = $('#currentPassword').val();
        let newPassword = $('#newPassword').val();
        let renewPassword = $('#renewPassword').val();
        if (newPassword == renewPassword) {
            $.ajax({
                type: "POST",
                url: "./ajaxApis/update.php",
                data: {
                    id: <?= $userId; ?>,
                    currentPassword,
                    newPassword,
                    reqType: 'PASSWORD'
                },
                success: function(response) {
                    alert("Password Changed Successfully");
                    location.reload();
                },
                error: function(response) {
                    alert(response)
                }
            });
        } else {
            $('#newPassword, #renewPassword').addClass('is-invalid');
            $('#passwordMismatchError').show();
        }
    }
</script>