<!DOCTYPE html>
<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone_1'] . "-" . $_POST['phone_2'] . "-" . $_POST['phone_3'];
$usename = $_POST['email'];
$pword = $_POST['pword'];
$address = $_POST['address'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$birthday = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

require_once "DataBaseConnection.php";
?>
<html>
    <head>
        <title>Client Completed Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--    Add in Boostrap CSS to help with Navbar, grid placement, and general style consistency    -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <!--    Establish custom favicon for flair    -->
        <script type="text/javascript" src="validate.js"></script>
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
        <?php
        $insert = "Insert into Clients(`fname`, `lname`, `phone`, `address`, `city`, `state`, `zip`, "
                . "`birthday`, `email`, `thepassword`, `createdate`) "
                . "values ('" . $fname . "', '" . $lname . "', '" . $phone . "', '" . $address . "', '" . $city . "', '"
                . $state . "', '" . $zip . "', '" . $birthday . "', '" . $usename . "', '" . hash("ripemd128", $pword)
                . "', CURRENT_DATE())";
        //echo $insert;
        if ($conndb->query($insert) === TRUE) {
            $search = "select * from Clients where email ='" . $usename .  "'";
            //$message = "Whole query ".$search;
            //echo $message;
            $return = $conndb->query($search);
            //print_r($return);

            echo "<table><tr><th>Firstname</th><th>Lastname</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Phone</th></tr>";
            while ($row = $return->fetch_assoc()) {
                echo "<tr><td> " . $row['fname'] . "</td>";
                echo "<td> " . $row['lname'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td> " . $row['city'] . "</td>";
                echo "<td> " . $row['state'] . "</td>";
                echo "<td> " . $row['zip'] . "</td>";
                echo "<td> " . $row['phone'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Error updating record: " . $conndb->error;
        }
        $conndb->close();
        ?>
    </body>
</html>
