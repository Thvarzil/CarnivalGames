<?php
session_start();
require_once "DataBaseConnection.php";
$active_user = $_SESSION['login'];

//check if logged in. If not, redirect to login page
if($active_user==""){
    header("Location: ./login.php");
    die;
}
//otherwise, fetch user data
else{
    $sql = "SELECT * FROM CSIS2440.Users WHERE UserName='".$active_user."'";

    $result = $con->query($sql);

    $user_data = $result->fetch_assoc();
}

$product_id = $_POST['Select_Product'];
$action = $_POST['action'];
switch ($action){
    case 'Add':
        $_SESSION['cart'][$product_id]++;
        echo $product_id;
        break;
    case 'Remove':
        $_SESSION['cart'][$product_id]--;
        if($_SESSION['cart'][$product_id]<=0){
            unset($_SESSION['cart'][$product_id]);
        }
        break;
    case 'Empty':
        unset($_SESSION['cart']);
        break;
}
print_r($_SESSION);

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

    <script>
        function productInfo(key) {
            //creates the datafile with query string
            var data_file = "CartInfo.php?info=" + key;
            //this is making the http request
            var http_request = new XMLHttpRequest();
            try {
                // Opera 8.0+, Firefox, Chrome, Safari
                http_request = new XMLHttpRequest();
            } catch (e) {
                // Internet Explorer Browsers
                try {
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            http_request.onreadystatechange = function () {
                if (http_request.readyState == 4)
                {
                    var text = http_request.responseText;

                    //this is adding the elements to the HTML in the page
                    document.getElementById("productInformation").innerHTML = text;
                }
            }
            http_request.open("GET", data_file, true);
            http_request.send();
        }
    </script>
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
<div class="jumbotron">
    <div id="greeting">
        <?php
            echo "<h2>Hello, ".$user_data['FirstName'].". Please select from our products to add to your cart</h2>"
        ?>
    </div>
    <form action="onlineorder.php" method="Post">
        <div >
            <p><span class="text">Please Select a product:</span>
                <select id="Select_Product" name="Select_Product" class="select">
                    <?php
                    $search = "SELECT ProductName, idProducts FROM CSIS2440.Products ORDER BY ProductName";
                    $return = $con->query($search);

                    if(!$return){
                        $message = "Whole Query: ".$search;
                        echo $message;
                        die("Invalid Query: ".$search);
                    }
                    while($row = mysqli_fetch_array($return)){
                        if($row['idProducts']==$product_id){
                            echo "<option value='".$row['idProducts']."' selected='selected'>".$row["ProductName"]."</option>";
                        }
                        else{
                            echo "<option value='".$row['idProducts']."'>".$row["ProductName"]."</option>";
                        }
                    }
                    ?>
                </select></p>
            <table>
                <tr>
                    <td>
                        <input id="button_Add" type="submit" value="Add" name="action" class="button"/>
                    </td>
                    <td>
                        <input name="action" type="submit" class="button" id="button_Remove" value="Remove"/>
                    </td>
                    <td>
                        <input name="action" type="submit" class="button" id="button_empty" value="Empty"/>
                    </td>
                    <td>
                        <input name="action" type="button" class="button" id="button_Info" value="Info" onclick="productInfo(document.getElementById('Select_Product').value)"/>
                    </td>
                </tr>
            </table>

        </div>
    </form>

    <div id="productInformation"></div>
    <?php
    if($_SESSION['cart']){
        echo "<table border='1' padding='3' width='640px'><tr><th>Name</th><th>Quantity</th><th>Price</th><th width='80px'>Line Cost</th></tr>";
        foreach($_SESSION['cart'] as $product_id => $quantity){
            $sql = "SELECT ProductName, ProductCost FROM CSIS2440.Products WHERE idProducts='".$product_id."'";
            $result = $con->query($sql);
            if(mysqli_num_rows($result)>0){
                list($name,$price) = mysqli_fetch_row($result);
                $linecost = $price * $quantity;
                $total+=$linecost;
                echo "<tr><td align='left' width='450px'>$name</td><td align='center' width='75px'>$quantity</td><td align='center' width='75px'>".money_format('%(#8n',$price)."</td><td align='center'>".money_format('%(#8n',$linecost)."</td></tr>";
            }
        }
        echo "<tr><td></td><td></td><td>Total</td><td>".money_format('%(#8n',$total)."</td></tr></table>";
    }
    else{
        echo "You have nothing in your shopping cart.";
    }
    ?>
</div>

</body>
</html>