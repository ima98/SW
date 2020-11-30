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

	$queryestado = "SELECT * FROM usuarios WHERE email=\"" . $email . "\"";

	$estado = mysqli_query($link, $queryestado);

	$row = mysqli_fetch_array($estado);


	if ($row[5] == 'ACTIVO') {
		$query = mysqli_query($link, "update usuarios set estado='DESACTIVADO' where email=\"" . $email . "\"");
	} else {
		$query = mysqli_query($link, "update usuarios set estado='ACTIVO' where email=\"" . $email . "\"");
	}

	$estado->close();
	mysqli_close($link);
	echo "<script> window.location.href='../php/HandlingAccounts.php';</script>";
}
