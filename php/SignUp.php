<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<?php include '../html/Head.html' ?>
	<?php include 'DbConfig.php' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/ShowImageInForm.js"></script>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
			<form method='POST' id='fquestion' enctype="multipart/form-data" name='fquestion' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
				<br><br>
				<input type="radio" id="alumno" name="rol" value="alumno" checked="checked">
				<label for="Alumno">Alumno</label><br>
				<input type="radio" id="profesor" name="rol" value="profesor">
				<label for="Profesor">Profesor</label><br>

				<label for="correo">Dirección de correo:</label>
				<input type="text" id="correo" name="correo" placeholder="name123@ikasle.ehu.eus" maxlength="70"><br><br>


				<label for="nombre">Nombre y Apellidos:</label>
				<input type="text" id="nombre" name="nombre"><br><br>


				<label for="contraseña">Contraseña:</label>
				<input type="password" id="contraseña" name="contraseña"><br><br>

				<label for="repcontraseña">Repetir contraseña:</label>
				<input type="password" id="repcontraseña" name="repcontraseña"><br><br>

				<input type='file' id="imgInp" name="imgInp" /><br> <img id="blah" src="" style="width: 100px; height: 100px;" alt="Your Image" /><br>

				<br><br>

				<input type="submit" value="Resgistrarse" id="submit" name="enviar"><br>
			</form>
		</div>
	</section>

	<?php include '../html/Footer.html' ?>
</body>

</html>
<?php

if (isset($_POST['enviar'])) {
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$contraseña = $_POST['contraseña'];
	$repcontraseña = $_POST['repcontraseña'];

	if (comprobar($correo, 	$nombre, 	$contraseña, $repcontraseña)) {

		$link = mysqli_connect($server, $user, $pass, $basededatos);

		if ($_FILES['imgInp']['name'] == "") {
			$image = "../images/índice.jpg";
		} else {
			$image = $_FILES['imgInp']['tmp_name'];
		}

		$contenido_imagen = base64_encode(file_get_contents($image));

		$sql = "INSERT INTO usuarios (email, tipo, nomyape, password, foto) VALUES(	'$correo', '$_POST[rol]', '$nombre', '$contraseña', '$contenido_imagen')";
		echo $sql;
		if (!mysqli_query($link, $sql)) {
			echo "<script>
						alert('No se ha podido añadir al usuario.');
						</script>";
			die("");
		} else {
			echo "<script>
							alert('Usuario añadido.');
							window.location.href='Login.php';
              </script>";
		}

		mysqli_close($link);
	} else {
		echo "no comprobado";
		die("");
	}
}
function comprobar($correo, 	$nombre, 	$contraseña, $repcontraseña)
{

	if ($contraseña != $repcontraseña) {
		echo "Error, las contraseñas no coinciden. <br>";
		return false;
	}

	if (!preg_match('/\s/', $nombre)) {
		echo "Nombre y apellidos tienen que ser 2 palabras";
		return false;
	}

	if (!preg_match("/(((^[a-zA-Z]+)([0-9]{3})@ikasle.ehu.(eus|es))|((^[a-zA-Z]+).?([a-zA-Z]*)@ehu.(eus|es)))$/", $correo)) {
		echo "Error, formato email no es el correcto. <br>";
		return false;
	}

	if (strlen($nombre) == 0  || strlen($correo) == 0 || strlen($contraseña) == 0 || strlen($repcontraseña) == 0) {
		echo "Error, hay campos vacios. <br>";
		return false;
	}
	if (strlen($contraseña) < 6) {
		echo "Error, la contraseña deben ser 6 carácteres MINIMO. <br>";
		return false;
	}

	return true;
}
?>