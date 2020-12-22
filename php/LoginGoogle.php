<?php
session_start();
$email=$_REQUEST['email'];
$_SESSION['email']=$email;
?>
