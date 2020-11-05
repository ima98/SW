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
			 include 'DbConfig.php';
			$link = mysqli_connect($server,$user,$pass,$basededatos);

			$query = mysqli_query($link, "SELECT * FROM preguntas" );

				echo"
				<table style='border: 1px solid black;
  border-collapse: collapse; font-family: arial, sans-serif;
  width: 100%;'><tr>
				<th>Correo</th> 
				<th>Pregunta</th>
				<th>Respuesta</th>
				</tr>
				";

				while ($row = mysqli_fetch_array($query)) {
					echo "<tr>
					<td>" . $row[1]. "</td>
					<td> " . $row[3]. "</td>
					<td>" . $row[4]. "</td>
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
