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
<div class="container-fluid">
    <div class="jumbotron" >
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

                $result = $con->query($query);

                if(!$result){
                    echo "Something went wrong...";

                }
                else{
                    echo "Your product was added";
                    /*
                    $query = "SELECT * FROM CSIS2440.Products WHERE 'ProductName' = $prodname";
                    $result = $con->query($query);
                    if($result->num_rows = 1){
                        $row = $result->fetch_assoc();
                        echo "<table><tr><th>Product Name</th><th>Product Description</th><th>Product Price</th><th>Product Image</th></tr>";
                        echo "<tr><td>".$row['ProductName']."</td><td>".$row['ProductDesc']."</td><td>$".$row['ProductCost']."</td><td><img class='resultimage' src=".$row['ProductImage']."></td></tr>";
                        echo "</table>";
                    }
                    else{
                        echo "Something went wrong fetching your product";
                    }
                    */
                }
                break;
            case "Update";
                $updated = False;
                $query .= "UPDATE CSIS2440.Products SET ";
                if($proddesc){
                    $query .= "ProductDesc='$proddesc' ";
                    $updated = true;
                }
                if($prodprice){
                    $query .= "ProductCost='$prodprice' ";
                    $updated = true;
                }
                if($prodimg){
                    $query .= "ProductImage='$prodimg' ";
                    $updated = true;
                }

                if($updated) {
                    $query .= "WHERE ProductName LIKE '%$prodname%' ";

                    $result = $con->query($query);

                    if (!$result) {
                        echo "Something went wrong...";
                    } else {
                        echo "Your product was updated.";
                    }
                }
                else{
                    echo "No information to update was entered";
                }
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

                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    echo "<table><tr><th>Product Name</th><th>Product Description</th><th>Product Price</th><th>Product Image</th></tr>";
                    foreach ($rows as $row){
                        echo "<tr><td>".$row['ProductName']."</td><td>".$row['ProductDesc']."</td><td>$".$row['ProductCost']."</td><td><img class='resultimage' style='width: 100px' src=".$row['ProductImage']."></td></tr>";
                    }
                }
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
