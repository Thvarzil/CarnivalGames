<?php
session_start();
session_unset();
session_destroy();
session_start();

$_SESSION['logout']=TRUE;

header('Location: login.php');
die;