<?php
session_start();

if (!isset($_SESSION["email"])) {

	echo "<script>
                      alert('Tienes que estar registrado');
                      window.location.href='Layout.php';
                      </script>";
} else if ($_SESSION["email"] != 'admin@ehu.es') {
	echo "<script>
	alert('No eres admin');
	window.location.href='Layout.php';
	</script>";
} else {
	include 'DbConfig.php';
	$email=$_REQUEST['email'];
	
	$link = mysqli_connect($server, $user, $pass, $basededatos);

	$sql="DELETE from usuarios where email='".$email."';";

	$estado = mysqli_query($link, $sql);

	mysqli_close($link);
	
	echo "<script> window.location.href='../php/HandlingAccounts.php';</script>";
}
