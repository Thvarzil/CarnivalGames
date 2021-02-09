<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Craft Cookie Cottage</title>
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
    $locations = explode("\n", file_get_contents("./text/servicearea.txt"));
?>

<form method = "post" action = "ResultPage.php">
    <div class="form-group">
        <label for="products">Our Products</label>
        <select id="products" name="ship">
            <option value="--">--</option>

        </select >
        <label for="location">Your Location</label>
        <select id="location" name="departure">
            <option value="--">--</option>
            <?php
            for($i=0;$i<sizeof($locations);$i++){
                print("<option value=".$i.">".$locations[$i]."</option>");
            }
            ?>
        </select>
        <lable for="name">Destination planet</lable>
        <select id="name" name="arrival">
            <option value="--">--</option>

        </select>
        <input type="submit" name="Create" value="Get the Estimate">

    </div>
</form>
<?php
// put your code here
?>
</body>
</html>
