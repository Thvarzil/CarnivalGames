<?php
session_start();
session_unset();

$_SESSION['logout']=TRUE;

header('Location: login.php');
die;