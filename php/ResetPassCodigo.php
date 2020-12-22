<?php session_start(); 

if (!isset($_SESSION["emailTemp"])){
	echo "<script>
	 alert('PRIMERO SOLICITA UN CAMBIO DE CONTRASEÑA');
	window.location.href='Layout.php';
	</script>";  

}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<script src="../js/jquery-3.4.1.min.js"></script>

	<script src="../js/ShowImageInForm.js"></script>

	<!-- <script src="../js/ValidateFieldsQuestion.js"></script> -->

	<?php include '../html/Head.html' ?>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
			<?php echo "<form method='POST' id='fquestion' name='fquestion' action=<?php echo $_SERVER['PHP_SELF'] ?>' enctype='multipart/form-data'>"; ?>
			<br><br>
			
			<input type="email" id="correo" name="correo" value="$_SESSION['emailTemp']"><br><br>

			

			<label for="contra1">Nueva contraseña:</label>
			<input type="text" id="contra1" name="contra1" required><br>


			<label for="contra2">Repetir contraseña:</label>
			<input type="text" id="contra2" name="contra2" required><br>


			<label for="codigo">Codigo enviado en el email:</label>
			<input type="text" id="codigo" name="codigo" required><br>

			
			<input type="submit" value="Cambiar contraseña" id="submit" name="cambiar"><br>

		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<?php
if (isset($_POST['enviar'])) {

	$codigo = $_POST['codigo'];
	$contra1=$_POST['contra1'];
	$contra2=$_POST['contra2'];
	$contra=crypt($contra1, '_S4..some');
	if($contra1==$contra2){
		if($_SESSION["codigo"]==$codigo){
			include 'DbConfig.php';
			$link = mysqli_connect($server, $user, $pass, $basededatos);
			$query = mysqli_query($link, "update usuarios set password='$contra' where email=\"" . $email . "\"");
			$estado->close();
			mysqli_close($link);

			$_SESSION['email'] = $_SESSION['emailTemp'];

			//session_unregister('emailTemp');
			unset($_SESSION['emailTemp']);
			unset($_SESSION['codigo']);

			echo "<script>
	 		alert('Contraseña cambiada correctamente');
			window.location.href='Layout.php';
			</script>";
		}else{
			echo "<script>
						alert('Código incorrecto.');
						</script>";
			die("");
		}
	}else{
		echo "<script>
						alert('Las contraseñas no coinciden.');
						</script>";
			die("");
	}


	

}
?>
	
</body>

</html>