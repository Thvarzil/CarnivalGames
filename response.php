<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en-us">
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
        $productid = $_POST['products'];
        $username = ucwords(strtolower(htmlentities($_POST['name'])));
        $userlocation = $_POST['location'];
        $productinfo = explode("}", file_get_contents("./text/productinfo.txt"));
        //trim { from the beginning of eahc blurb
        for($i=0;$i<sizeof($productinfo);$i++){$productinfo[$i]=ltrim($productinfo[$i], "{");}
        $locations = explode(",", file_get_contents("./text/servicearea.txt"));
        $productnames = array('Chess', 'Board Games', 'Home Escape Rooms', 'Murder Parties', 'Educational Games');
    ?>
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
                    <?php
                    if (isset($_SESSION['login'])){
                        echo "<li class='nav-item'><a class='nav-link' href='destroy.php' >Log Out</a></li>";
                    }
                    else{
                        echo "<li class='nav-item'><a class='nav-link' href='login.php'>Log In</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="jumbotron" style="display: inline-block">
            <?php
            // put your code here
            //Checking if user's state is in area, init as false, turn positive if match
            $in_area = false;
            for($i=0;$i<sizeof($locations); $i++){
                if($userlocation==$locations[$i]){
                    $in_area=true;
                    break;
                }
            }
            //print information as dictated by user input
            print("<p>Hello,".$username.". The product you requested - ".$productnames[$productid]);
            if($in_area){
                print(" - is available in your selected state of ".$userlocation." We hope the following information is useful to you.</p><br>");
            }
            else{
                print(" - is not available in your selected state of ".$userlocation." We apologize for the inconvenience, and are working 
                        hard to expand to your area. We hope the following information is useful to you.</p><br>");
            }
            switch ($productid){
                case 0:
                    print("<img src='./img/chess1.jpg' class='gameimage' alt=''>");
                    break;
                case 1:
                    print("<img src='./img/boardgame1.jpg' class='gameimage' alt=''>");
                    break;
                case 2:
                    print("<img src='./img/escaperoom1.jpg' class='gameimage' alt=''>");
                    break;
                case 3:
                    print("<img src='./img/murderparty1.jpg' class='gameimage'  alt=''>");
                    break;
                case 4:
                    print("<img src='./img/educationgame1.jpg' class='gameimage' alt=''>");
                    break;
            }

            print($productinfo[$productid]);
            ?>
        </div>
    </container>

    </body>
</html>
