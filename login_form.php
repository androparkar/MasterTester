<?php
include_once("./includes/login.php");
include_once("./includes/signup.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Master Tester - Login</title>

    <!-- my Icon kit -->
    <script src="https://kit.fontawesome.com/a22ef0060c.js" crossorigin="anonymous"></script>
    
    <!-- Favicons -->
    <link href="assets/img/favicon.jpg" rel="icon">

    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style_login.css" />
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="./includes/login.php" class="sign-in-form" method="POST">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" name="email_login" id="email_login" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password_login" id="password_login" />
                    </div>
                    <input type="submit" value="login" class="btn solid" name="login" />
                </form><!-- End of login -->
                <form action="./includes/signup.php" class="sign-up-form" method="POST">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username_signup" id="username_signup" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email_signup" id="email_signup" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password_signup" id="password_signup" required />
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <select name="access" id="access" required>
                            <option selected>Choose any</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Student">Student</option>
                        </select>
                    </div>
                    <input type="submit" class="btn" value="Sign up" name="signup" />
                </form><!-- End of signup -->
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>
                        create a account first.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="assets/img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        login at here.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="assets/img/register.svg" class="image" alt="logo" />
            </div>
        </div>
    </div>

    <script src="./assets/vendor/app_login.js"></script>
</body>

</html>