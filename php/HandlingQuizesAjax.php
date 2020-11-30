<?php session_start(); 

if (!isset($_SESSION["email"])){
	echo "<script>
	 alert('PARA ACCEDER, ANTES DEBES LOGEARTE O REGISTRARTE');
	window.location.href='Layout.php';
	</script>";  

}else{

		if($_SESSION["email"]=='admin@ehu.es'){
				echo "<script>
                      alert('NO TE PASES DE LISTO ADMIN');
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

		<div  id="numpreg">  </div>


		<div>
			<form method='POST' id='fquestion' name='fquestion' action='<?php echo $_SERVER['PHP_SELF'] ?>' enctype='multipart/form-data'>
				<br><br>
				<label for="correo">Dirección de correo:</label>
				<input type="email" id="correo" name="correo"  value="<?php echo $_SESSION["email"] ?>" readonly required pattern="^([a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))|[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es)))$"><br><br>


				

				<label for="tema">Tema :</label>
				<input type="text" id="tema" name="tema" placeholder=" Tema de la pregunta" required><br><br>

				<label for="pregunta">Enunciado de la pregunta :</label>
				<input type="text" id="pregunta" name="pregunta" placeholder="             ¿ ... ?" required minlength="10" maxlength="100"><br><br>

				<label for="correcta">1ª Opcion:</label>
				<input type="text" id="correcta" name="correcta" placeholder=" Respuesta Correcta" required><br>

				<label for="incorrecta1">2ª Opcion:</label>
				<input type="text" id="incorrecta1" name="incorrecta1" placeholder=" Respuesta Incorrecta" required><br>

				<label for="incorrecta2">3ª Opcion:</label>
				<input type="text" id="incorrecta2" name="incorrecta2" placeholder=" Respuesta Incorrecta" required><br>

				<label for="incorrecta3">4ª Opcion:</label>
				<input type="text" id="incorrecta3" name="incorrecta3" placeholder=" Respuesta Incorrecta" required><br><br>

				<label for="dificultad">Dificultad de la pregunta</label>
				<select name="dificultad" id="dificultad">
					<option value="1">Baja</option>
					<option value="2">Media</option>
					<option value="3">Alta</option>
				</select>
				<br><br>

				<input type='file' id="imgInp" name="imgInp" /><br> <img id="blah" src="" style="width: 100px; height: 100px;" alt="Your Image" /><br>

				<input type="button" value="Enviar pregunta" id="submit" name="enviar"onclick="mostramemedioxmlaunquesea()">

				<input type="button" value="Ver preguntas" id="verp" name="verp" onclick="mostramemedioxmlaunquesea()">

				<input type="reset" value="Resetear el formulario">

		</div>

		</form>

		<div id="resultado"> </div>

	</section>

</body>

</html>