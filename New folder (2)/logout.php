<?php
session_start();
if(isset($_SESSION['user_id']))
{
    unset($_SERVER['user_id']);


}
session_destroy();
header("Location: login.php");
die;