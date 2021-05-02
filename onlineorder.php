<?php
if(!isset($_SESSION['login'])){
    header("Location: ./login.php");
    die;
}
?>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
</body>
</html>