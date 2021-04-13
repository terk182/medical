<?php include('config/constants.php'); ?>
<?php
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if (isset($_SESSION['no-login-message'])) {
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
if (isset($_SESSION['no-login-message'])) {
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
if (isset($_SESSION['OperatorID'])) {
    echo $_SESSION['OperatorID'];
    unset($_SESSION['OperatorID']);
}
if (isset($_SESSION['Class'])) {
    echo $_SESSION['Class'];
    unset($_SESSION['Class']);
}
if (isset($_SESSION['active'])) {
    echo $_SESSION['active'];
    unset($_SESSION['active']);
}
if (isset($_SESSION['OperatorName'])) {
    echo $_SESSION['OperatorName'];
    unset($_SESSION['OperatorName']);
}

$ip_get = "";


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">

            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">




                <form action="" method="POST" class="text-center">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="OperatorID" type="text" name="OperatorID" placeholder="OperatorID" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="Password" type="Password" name="Password" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="Login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $OperatorID = $_POST['OperatorID'];
    $Password =  $_POST['Password'];

    if ((strlen($OperatorID) == 5) and (strlen($Password) >= 8)) {
        $sql = "SELECT * FROM `npt`.`operator` WHERE OperatorID = '$OperatorID' AND Password = '$Password' AND active ='Y' GROUP BY id DESC LIMIT 1 "; //
        $db_select = mysqli_select_db($conn, 'npt');
        $res = mysqli_query($conn, $sql);



        if ($res === FALSE) {
            header("Location:" . SITEURL . 'login.php');
        } else {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $OperatorName = $row['OperatorName'];
                $Class_op = $row['Class'];
                $active = $row['active'];

                $_SESSION['login'] = "<div class = 'success'>Login Successful.</div>";

                $_SESSION['OperatorID'] =  $OperatorID;
                $_SESSION['Password'] =  $Password;
                $_SESSION['Class'] =  $Class_op;
                $_SESSION['active'] =  $active;
                $_SESSION['OperatorName'] = $OperatorName;


                $_SESSION['login'] = "<div class = 'success'>Login Successful.</div>";
                audit_t($OperatorName, $OperatorID, "", "LOGIN_WEB", "LOGIN", 'login use ' . $ip_get, "","npt");
                header("Location:" . SITEURL);
            } else {
                $_SESSION['login'] = "<div class = 'error text-center'>Username or Password did not match.</div>";
                audit_t($OperatorName, $OperatorID, "", "LOGIN_WEB", "LOGIN_FAIL", 'login use ' . $ip_get, "","npt");
                header("Location:" . SITEURL . 'login.php');
            }
        }
    } else {
        audit_t($OperatorName, $OperatorID, "", "LOGIN_WEB", "LOGIN_FAIL", $ip_get, "","npt");
        header("Location:" . SITEURL . 'login.php');
    }
}



?>