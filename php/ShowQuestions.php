<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
			<?php
			$link = mysqli_connect("localhost", "root", "", "quiz");

			$query = mysqli_query($link, "SELECT * FROM preguntas" );
			//or die(mysqli_error($link));
			

			//if($query) {
				echo"
				<table style='border: 1px solid black;
  border-collapse: collapse; font-family: arial, sans-serif;
  width: 100%;'><tr>
				<th>Correo</th> 
				<th>Tema</th>
				<th>Pregunta</th>
				<th>Opcion 1</th>
				<th>Opcion 2</th>
				<th>Opcion 3</th>
				<th>Opcion 4</th>
				<th>Dificultad</th>
				</tr>
				";

				while ($row = mysqli_fetch_array($query)) {
					/*echo "<tr>
					<td>" . $row["correo"]. "</td>
					<td>" . $row["tema"]. "</td>
					<td> " . $row["pregunta"]. "</td>
					<td>" . $row["correcta"]. "</td>
					<td>" . $row["incorrecta1"]. "</td>
					<td>" . $row["incorrecta2"]. "</td>
					<td>" . $row["incorrecta3"]. "</td>
					<td>" . $row["dificultad"]. "</td>
					</tr>";
					*/

					echo "<tr>
					<td>" . $row[0]. "</td>
					<td>" . $row[1]. "</td>
					<td> " . $row[2]. "</td>
					<td>" . $row[3]. "</td>
					<td>" . $row[4]. "</td>
					<td>" . $row[5]. "</td>
					<td>" . $row[6]. "</td>
					<td>" . $row[7]. "</td>
					</tr>";
					
				}

				echo '</table>';
				$query->close();
				mysqli_close($link);
			?>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>
