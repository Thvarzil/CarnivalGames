<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en-us">
    <head>
        <title>Craft Cookie Cottage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--    Add in Boostrap CSS to help with Navbar, grid placement, and general style consistency    -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Craft Cookie Cottage</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./productform.php">Product Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Order Online</a>
                </li>
            </ul>

        </nav>

        <div class="jumbotron">
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
