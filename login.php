<?php
session_start();
require_once "DataBaseConnection.php";
if($_POST['fname']!="") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $newuname = $_POST['newuname'];
    $newpass = hash('ripemd128', $_POST['newpass']);
    $sql = "INSERT INTO CSIS2440.Users (UserName, UserPass, FirstName, LastName, Email) VALUES ('" . $newuname . "','" . $newpass . "','" . $fname . "','" . $lname . "','" . $email . "')";
    $success = $con->query($sql);
    if ($success == FALSE) {
        $failmess = "Whole query " . $success . "<br>";
        echo $failmess;
        print('Invalid query: ' . mysqli_error($con) . "<br>");
        unset($_POST);

    } else {
        $_SESSION['login'] = $newuname;
        header('Location: ./onlineorder.php');
        //echo "<a href='onlineorder.php'>Redirect</a>";
        echo $_SESSION['login'];
        unset($_POST);
        die;
    }
}
else if(!isset($_SESSION['log_status'])){
    $_SESSION['log_status']=TRUE;
}
else if($_SESSION['logout']){
    echo "<script>alert('You have been logged out!')</script>";
    $_SESSION['logout'] = FALSE;
}
else if(!$_SESSION['log_status']){
    echo "<script>alert('Your username and password combination did not match our records.')</script>";
    $_SESSION['log_status'] = TRUE;
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Carnival Games</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    Add in Boostrap CSS to help with Navbar, grid placement, and general style consistency    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!--    Establish custom favicon for flair    -->
    <link rel="icon" href="./img/favicon.png">
</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Carnival Games</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productinfo.php">Product Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clientform.php">Newsletter Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productform.php">Inventory Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="onlineorder.php">Order Online</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron container-fluid">
            <div class="row">
                <div class="col" style="border-right: black 1px">
                    <h2>Login:</h2>
                    <form method="post" action="logincheck.php">
                        <div class="row">
                            <label for="uname">Username:</label>
                            <input type="text" name="uname" id="uname">
                        </div>
                        <div class="row">
                            <label for="pass">Password:</label>
                            <input type="password" name="pass" id="pass">
                        </div>
                        <input type="submit" value="Log In">
                    </form>
                </div>
                <div class="col" style="border-left: black 1px">
                    <h2>New User Registration</h2>
                    <form method="post" action="login.php">
                        <div class="row">
                            <label for="fname">First Name:</label>
                            <input type="text" name="fname" id="fname">
                        </div>
                        <div class="row">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" id="lname">
                        </div>
                        <div class="row">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="row">
                            <label for="newuname">Username:</label>
                            <input type="text" name="newuname" id="newuname">
                        </div>
                        <div class="row">
                            <label for="newpass">Password:</label>
                            <input type="password" name="newpass" id="newpass">
                        </div>
                        <input type="submit" value="Register">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
