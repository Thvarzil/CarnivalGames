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

<container>
    <!--    Bootstrap Horizontal Navbar structure    -->
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
    <!--User input form for product information-->
    <div class="jumbotron">
        <form method="post" action="response.php">
            <div class="form-group">
                <label for="products">Our Products</label>
                <select id="products" name="products">
                    <option value="--">--</option>
                    <option value=0>Chess</option>
                    <option value=1>Board Games</option>
                    <option value=2>Home Escape Room</option>
                    <option value=3>Murder Parties</option>
                    <option value=4>Educational Games</option>
                </select>
                <label for="location">Your Location</label>
                <select id="location" name="location">
                    <option value="--">--</option>
                    <?php
                    $locations = array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ',
                        'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT',
                        'VA', 'WA', 'WV', 'WI', 'WY');
                    for ($i = 0; $i < sizeof($locations); $i++) {
                        print("<option value=" . $locations[$i] . ">" . $locations[$i] . "</option>");
                    }
                    ?>
                </select>
                <lable for="name">Your Name</lable>
                <input id="name" name="name" type=text>
                <input type="submit" name="Submit" value="Submit">

            </div>

        </form>
    </div>
</container>
<?php
// put your code here
?>
</body>
</html>
