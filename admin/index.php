<?php
session_start();

include "../config.php";

if (isset($_POST['loginadmin'])) {
    $a = $_POST['email'];
    $b = $_POST['password'];
    // echo $a.$b;
    $sql = "SELECT * FROM `admin` WHERE `email` = '$a' AND `password` = '$b'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_num_rows($result);
    echo $row;
    if ($row == 1) {
        // session_register("myusername");
        $_SESSION['login_admin'] = $a;
        header("location: Dashboard.php");
    } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}

if (isset($_SESSION['login_admin'])) {
    header('location: Dashboard.php');
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />
    <link rel="stylesheet" href="./assets/fonts/phosphor/duotone/style.css" />
    <link rel="stylesheet" href="./assets/fonts/tabler-icons.min.css" />
    <link rel="stylesheet" href="./assets/fonts/feather.css" />
    <link rel="stylesheet" href="./assets/fonts/fontawesome.css" />
    <link rel="stylesheet" href="./assets/fonts/material.css" />
    <link rel="stylesheet" href="./assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="./assets/css/style-preset.css" />

</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="auth-header">
                                    <h2 class="text-secondary mt-5"><b>Hi, Welcome Back Admin</b></h2>
                                    <p class="f-16 mt-2">Enter your credentials to continue</p>
                                </div>
                            </div>
                        </div>
                        <h5 class="my-4 d-flex justify-content-center">Sign in with Email address</h5>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="Email address / Username" />
                                <label for="floatingInput">Email address / Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput1" name="password"
                                    placeholder="Password" />
                                <label for="floatingInput1">Password</label>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" name="loginadmin" class="btn btn-secondary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/plugins/popper.min.js"></script>
    <script src="./assets/js/plugins/simplebar.min.js"></script>
    <script src="./assets/js/plugins/bootstrap.min.js"></script>
    <script src="./assets/js/icon/custom-font.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/theme.js"></script>
    <script src="./assets/js/plugins/feather.min.js"></script>


    <script>
        layout_change('light');
    </script>

    <script>
        font_change('Roboto');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_caption_change('true');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change('preset-1');
    </script>


</body>

</html>