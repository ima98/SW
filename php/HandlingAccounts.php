<?php session_start();

if (!isset($_SESSION["email"])) {



			echo "<script>
                      alert('PARA ACCEDER, ANTES DEBES LOGEARTE O REGISTRARTE');
                      window.location.href='Layout.php';
                      </script>";
}else{

		if($_SESSION["email"]!='admin@ehu.es'){
				echo "<script>
                      alert('A DONDE VAS? ');
                      alert('ESTUDIA PARA SER ADMIN');
                      window.location.href='Layout.php';
                      </script>";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<script src="../js/jquery-3.4.1.min.js"></script>

	<script src="../js/ShowImageInForm.js"></script>

	<script src="../js/ShowQuestionsAjax.js"></script>

	<script src="../js/AddQuestionAjax.js"></script>
	<script src="../js/CountQuestion.js"></script>


	<?php include '../html/Head.html' ?>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">

		<?php
		include 'DbConfig.php';
		$link = mysqli_connect($server, $user, $pass, $basededatos);

		$query = mysqli_query($link, "SELECT * FROM usuarios where EMAIL!='admin@ehu.es'");

		echo "
				<table style='border: 1px solid black; border-collapse: collapse; font-family: arial, sans-serif; width: 100%;'>
				<tr>
				<th>Correo</th> 
				<th>Contraseña</th>
				<th>Imagen</th>
				<th>Estado</th>
				<th>Cambiar estado</th>
				<th>Borrar usuario</th>
				</tr>
				";

		while ($row = mysqli_fetch_array($query)) {
			echo "<tr>
					<td>" . $row[0] . "</td>
					<td> " . $row[3] . "</td>
					<td> <img height='100px'  src='data:image/;base64," . getImagenDeBD($row[0]) . "'/></td>
					<td>" . $row[5] . "</td>
					<td><input type='button' value = 'Cambiar Estado' onclick= CambiarEstado('" . $row[0] . "')></td>
					<td><input type='button' value = 'Borrar usuario' onclick= BorrarUsuario('" . $row[0] . "')></td>
					<td> </td>
					</tr>";
		}

		echo '</table>';
		$query->close();
		mysqli_close($link);
		?>

		<script type="text/javascript">
			function CambiarEstado(email) {
				var conf = confirm("¿Deseas cambiar el estado?");
				if (conf) {
					window.location.href = "../php/ChangeUserState.php?email=" + email;
				}
			}
			function BorrarUsuario(email) {
				var conf = confirm("¿Deseas borrar el usuario?");
				if (conf) {
					window.location.href = "../php/RemoveUser.php?email=" + email;
				}
			}


		</script>



	</section>


</body>

</html>