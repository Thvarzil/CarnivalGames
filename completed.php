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
        <meta charset="UTF-8">
        <title>Client Completed Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--    Add in Boostrap CSS to help with Navbar, grid placement, and general style consistency    -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <!--    Establish custom favicon for flair    -->
        <link rel="icon" href="./img/favicon.png">
    </head>
    <body>
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
