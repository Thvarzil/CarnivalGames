<?php
session_start();
require_once "DataBaseConnection.php";

$login = $_POST['uname'];
$pass = hash('ripemd128', $_POST['pass']);


$sql = "SELECT * FROM CSIS2440.Users WHERE UserName='".$login."';";

$result = $con->query($sql);
$row = $result->fetch_assoc();
$realpass = $row['UserPass'];

if($result->num_rows==0){
    echo "Your username is invalid";
}
else if($realpass==$pass){
    session_unset();
    $_SESSION['login'] = $login;
    header("Location: onlineorder.php");
    die;
}
else{
    $_SESSION['log_status'] = FALSE;
    header("Location: login.php");
    die;
}
