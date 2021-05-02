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
        <?php
        // put your code here
        ?>
        <!--
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Carnival Games</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productinfo.php">Product Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clientform.php">Newsletter Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productform.php">Product Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Order Online</a>
                </li>
            </ul>

        </nav>
        -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">Carnival Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Newsletter Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Order Online</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron container-fluid">
            <div class="row">
                <div class="col" style="border-right: black 1px">
                    <h2>Login:</h2>
                    <form>
                        <div class="row">
                            <label for="uname">Username:</label>
                            <input type="text" name="uname" id="uname">
                        </div>
                        <div class="row">
                            <label for="pass">Password:</label>
                            <input type="password" name="pass" id="pass">
                        </div>
                    </form>
                </div>
                <div class="col" style="border-left: black 1px">
                    <h2>New User Registration</h2>
                    <form>
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
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
