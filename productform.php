<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container-fluid">
    <div class="jumbotron">
        <h1>Product Form</h1>
    </div>

    <div class="jumbotron">
        <form method="post" action="results.php" class="form-horizontal">
            <div class="form-group">
                <label for="prodname">Product Name:</label>
                <input name="prodname" type="text">
                <label for="prodprice">Product Price: $</label>
                <input name="prodprice" type="number" min="0">
                <label for="proddesc">Product Description:</label>
                <textarea name="proddesc" rows="5" cols="50"></textarea>
                <label for="prodimg">Product Image:</label>
                <input name="prodimg" type="text">
                <label for="prodaction">Action:</label>
                <select name="prodaction">
                    <option value="Add">Add</option>
                    <option value="Search">Search</option>
                    <option value="Update">Update</option>
                </select>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

</div>
</body>
</html>
