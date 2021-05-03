<!DOCTYPE html>

<html>
<head>
    <title>Carnival Games - Newsletter Sign Up</title>
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
    <div class="jumbotron">
        <form id="form_11683" class="appnitro"  method="post" action="completed.php" onsubmit="return validate();">
            <div class="form_description">
                <h2>New Client</h2>
                <p>Sign up for our newsletter</p>
            </div>						
            <ul >

                <li id="li_1" >
                    <label class="description" for="fname">First Name
                    </label>
                    <div>
                        <input id="fname" name="fname" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_2" >
                    <label class="description" for="lname">Last Name
                    </label>
                    <div>
                        <input id="lname" name="lname" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_3" >
                    <label class="description" for="email">E-mail
                    </label>
                    <div>
                        <input id="email" name="email" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_5" >
                    <label class="description" for="pword">Password
                    </label>
                    <div>
                        <input id="pword" name="pword" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>	
                <li id="li_4" >
                    <label class="description" for="phone">Phone </label>
                    <span>
                        <input id="phone_1" name="phone_1" class="element text" size="3" maxlength="3" value="" type="text"> -
                        <label for="phone_1">(###)</label>
                    </span>
                    <span>
                        <input id="phone_2" name="phone_2" class="element text" size="3" maxlength="3" value="" type="text"> -
                        <label for="phone_2">###</label>
                    </span>
                    <span>
                        <input id="phone_3" name="phone_3" class="element text" size="4" maxlength="4" value="" type="text">
                        <label for="phone_3">####</label>
                    </span>
                </li>
                <li id="li_6" >
                    <label class="description" for="address">Street Address</label>
                    <div>
                        <input id="address" name="address" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_7" >
                    <label class="description" for="city">City</label>
                    <div>
                        <input id="city" name="city" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_10" >
                    <label class="description" for="state">State </label>
                    <div>
                        <select class="element select medium" id="state" name="state"> 
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NV">Nevada</option>
                            <option value="NM">New Mexico</option>
                            <option value="OR">Oregon</option>
                            <option value="UT">Utah</option>
                            <option value="WA">Washington</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div> 
                </li>		
                <li id="li_8" >
                    <label class="description" for="zip">Zip Code</label>
                    <div>
                        <input id="zip" name="zip" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_9" >
                    <label class="description" for="bday">Birthday</label>
                    <span>
                        <input id="bday_1" name="month" class="element text" size="2" maxlength="2" value="" type="text"> /
                        <label for="bday_1">MM</label>
                    </span>
                    <span>
                        <input id="bday_2" name="day" class="element text" size="2" maxlength="2" value="" type="text"> /
                        <label for="bday_2">DD</label>
                    </span>
                    <span>
                        <input id="bday_3" name="year" class="element text" size="4" maxlength="4" value="" type="text">
                        <label for="bday_3">YYYY</label>
                    </span>
                </li>
                <li id="li_10">
                    <label class="description" for="new">New User?</label>
                    <input type="checkbox" name="new" id="new" value="new">
                </li>
                <li class="buttons">
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                </li>
            </ul>
        </form>

    </div>
    </body>
</html>
