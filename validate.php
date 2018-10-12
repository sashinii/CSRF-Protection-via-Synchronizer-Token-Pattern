<?php
/**
 * Created by PhpStorm.
 * User - Sashini 
 * Date : 9/10/2018 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSRF Protection  - STP - Pro Validation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
</head>
<body>
<style>

    body {

        background-color: turquoise;
    }

</style>
<!-- navbar start -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">#CSRF Protection</a>
        </div>
        <ul class="nav navbar-nav">
            <?php
            if (!isset($_COOKIE['session_cookie'])) {
                echo "<li class='active'><a href='profile.php'>Profile</a></li>";
            }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (!isset($_COOKIE['session_cookie'])) {
                echo "<li><a href='login.php'><span class='glyphicon glyphicons-log-in'></span> Login </a></li>";
            }
            ?><?php
            if (isset($_COOKIE['session_cookie'])) {
                echo "<li><a href='logout.php'><span class='glyphicon glyphicons-log-out'></span> Logout</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>
<!-- navbar end -->

<div class="container">
    <div class="row" align="center" style="padding-top: 100px;">
        <div class="col-12">

            <div class="card">
                <h5 class="card-header">Profile Details</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">


                            <?php
                            if(isset($_COOKIE['session_cookie']))
                            {


                                session_start();
                                if ($_POST['csrf_Token'] == $_SESSION['CSRF_Token'])
                                {
                                    $fname=$_POST['name'];
                                    $university=$_POST['university'];
                                    $degree=$_POST['degree'];
                                    $year=$_POST['year'];

                                    echo "<div class='alert alert-primary' role='alert'>".$fname."</div>";
                                    echo "<div class='alert alert-secondary' role='alert'>".$university."</div>";
                                    echo "<div class='alert alert-success' role='alert'>".$degree."</div>";
                                    echo "<div class='alert alert-info' role='alert'>".$year."</div>";

                                }
                                else
                                {
                                    echo "<script>alert('WARNING :: CSRF Found !!!')</script>";
                                }

                            }
                            ?>


                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

</body>
</html>