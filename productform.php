<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    Add in Boostrap CSS to help with Navbar, grid placement, and general style consistency    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
    <!--    Establish custom favicon for flair    -->
    <link rel="icon" href="./img/favicon.png">
</head>
<body>
<div class="container-fluid">
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
    <div class="jumbotron" style="width: 100%; align-content: center">
        <h2>Product Form</h2>
    </div>

    <div class="jumbotron" style="width: 100%; align-content: center">
        <form method="post" action="results.php" class="">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label for="prodname">Product Name:</label></td>
                        <td width="10"></td>
                        <td><input name="prodname" type="text"></td>
                    </tr>
                    <tr>
                        <td><label for="prodprice">Product Price: $</label></td>
                        <td></td>
                        <td><input name="prodprice" type="number" min="0"></td>
                    </tr>
                    <tr>
                        <td><label for="prodcat">Product Category:</label></td>
                        <td></td>
                        <td><input name="prodcat" type="number" min="0"></td>
                    </tr>
                    <tr>
                        <td><label for="proddesc">Product Description:</label></td>
                        <td></td>
                        <td><textarea name="proddesc" rows="5" cols="50"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="prodimg">Product Image:</label></td>
                        <td></td>
                        <td><input name="prodimg" type="text"></td>
                    </tr>
                    <tr>
                        <td><label for="prodaction">Action:</label></td>
                        <td></td>
                        <td><select name="prodaction">
                                <option value="Add">Add</option>
                                <option value="Search">Search</option>
                                <option value="Update">Update</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                        <input type="submit" value="Submit" id="submit">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

</div>
</body>
</html>
