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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!--    Establish custom favicon for flair    -->
    <link rel="icon" href="./img/favicon.png">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Carnival Games</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./productinfo.php">Product Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./productform.php">Product Form</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Order Online</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
    <div class="jumbotron">
        <?php
        require_once 'DataBaseConnection.php';
        // put your code here
        $prodimg = $_POST['prodimg'];
        $prodaction = $_POST['prodaction'];
        $proddesc = $_POST['proddesc'];
        $prodprice = $_POST['prodprice'];
        $prodname = $_POST['prodname'];
        $prodcat = $_POST['prodcat'];
        $query = "";

        switch ($prodaction) {
            case "Add":
                $query .= "INSERT INTO CSIS2440.Products (`ProductName`,`ProductCatagory`,`ProductImage`,`ProductCost`,`ProductDesc`) VALUES ('$prodname','$prodcat','$prodimg','$prodprice','$proddesc')";
                break;
            case "Update";
                $query .= "UPDATE CSIS2440.Products SET `ProductImage`='$prodimg', `ProductCost`='$prodimg',`ProductDesc`='$proddesc'";
                break;
            case "Search":
                $query .= "SELECT * FROM CSIS2440.Products WHERE `ProductName` LIKE '%$prodname%'";

                //echo $query;
                $result = $con->query($query);
                if (!$result) {
                    $message = "Whole query " . $query;
                    echo $message;
                    die('Invalid query: ' . mysqli_error($con));
                }
                else{
                    $count = $result->num_rows;
                    if($count>0){
                        $row = $result->fetch_assoc();
                        echo $row['ProductName'];
                    }

                }
                /*

                */

                /*echo "<table>";
                foreach ($result as $row){
                    echo "<tr><td>".$row['ProductName']."</td></tr>";
                }
                echo "</table>";*/
                break;
            default:
                echo "something went wrong";
                break;
        }



        if(!$result){
            $message = "Whole Query: ".$query;
            echo $message;
            die('<br>Invalid Query: '.mysqli_error());
        }

        ?>
    </div>
</div>
</body>
</html>
