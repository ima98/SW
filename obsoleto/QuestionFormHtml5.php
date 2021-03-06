<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

     <form id='fquestion' name='fquestion' action='AddQuestion.php'>
		<br><br>
			 <label for="correo">Dirección de correo:</label>
		  <input type="email" id="correo" name="correo" placeholder="name@ikasle.ehu.eus" required pattern="^([a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))|[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es)))$"><br><br>

		  <label for="tema">Tema :</label>
		  <input type="text" id="tema" name="tema" placeholder=" Tema de la pregunta" required><br><br>

		  <label for="pregunta">Enunciado de la pregunta :</label>
		  <input type="text" id="pregunta" name="pregunta" placeholder="             ¿ ... ?" minlength="10" maxlength="20" required><br><br>

		  <label for="correcta">1ª Opcion:</label>
		  <input type="text" id="correcta" name="correcta" placeholder=" Respuesta Correcta" required><br>

		  <label for="incorrecta1">2ª Opcion:</label>
		  <input type="text" id="incorrecta1" name="incorrecta1" placeholder=" Respuesta Incorrecta" required><br>

		  <label for="incorrecta2">3ª Opcion:</label>
		  <input type="text" id="incorrecta2" name="incorrecta2" placeholder=" Respuesta Incorrecta" required><br>

		  <label for="incorrecta3">4ª Opcion:</label>
		  <input type="text" id="incorrecta3" name="incorrecta3" placeholder=" Respuesta Incorrecta" required><br><br>
		  
		  <label for="dificultad">Dificultad de la pregunta</label>
		<select name="dificultad" id="dificultad" required>
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