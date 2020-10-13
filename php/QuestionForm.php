<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/ValidateFieldsQuestion.js"></script>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

	<form id='fquestion' name='fquestion' action='AddQuestion.php' >
		<!-- onsubmit="return mainM()" -->
		<br><br>
			 <label for="correo">Dirección de correo:</label>
		  <input type="text" id="correo" name="correo" placeholder="name@ikasle.ehu.eus"><br><br>
  
		  <label for="tema">Tema :</label>
		  <input type="text" id="tema" name="tema" placeholder=" Tema de la pregunta"><br><br>

		  <label for="tema">Enunciado de la pregunta :</label>
		  <input type="text" id="pregunta" name="pregunta" placeholder="             ¿ ... ?"><br><br>

		  <label for="correcta">1ª Opcion:</label>
		  <input type="text" id="correcta" name="primera opcion" placeholder=" Respuesta Correcta"><br>

		  <label for="incorrecta1">2ª Opcion:</label>
		  <input type="text" id="incorrecta1" name="segunda opcion" placeholder=" Respuesta Incorrecta"><br>

		  <label for="incorrecta2">3ª Opcion:</label>
		  <input type="text" id="incorrecta2" name="tercera opcion" placeholder=" Respuesta Incorrecta"><br>

		  <label for="incorrecta3">4ª Opcion:</label>
		  <input type="text" id="incorrecta3" name="cuarta opcion" placeholder=" Respuesta Incorrecta"><br><br>
		  
		  <label for="dificultad">Dificultad de la pregunta</label>
		<select name="dificultad" id="dificultad">
		  <option value="1">Baja</option>
		  <option value="2">Media</option>
		  <option value="3">Alta</option>
		</select>
		<br><br>

		<input type="submit" value= "Enviar pregunta" id="submit" name="enviar"><br>

	</form>




    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
