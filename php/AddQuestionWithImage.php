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

            $target =addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));

            /*if (strlen($_FILES['imgInp']['tmp_name']) == 0) {
             //$('#imgInp').src='../images/perro.jpg';
              $target =addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
            }else{
              $target = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
            }

              //$target = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));

           */

              $sql="INSERT INTO preguntas(correo, tema, pregunta, correcta, incorrecta1, incorrecta2, incorrecta3, dificultad, imagen) VALUES
              ('$_POST[correo]','$_POST[tema]', '$_POST[pregunta]', '$_POST[correcta]' ,'$_POST[incorrecta1]' ,'$_POST[incorrecta2]', 
              '$_POST[incorrecta3]', '$_POST[dificultad]','$target')";



            if (!mysqli_query($link ,$sql))
            {
                echo"La pregunta no se ha podido añadir correctamente, intentalo mas tarde :(";
                die("");
            }else{
                echo "PREGUNTA AÑADIDA :)";
            }

            echo "<p> <a href='ShowQuestionsWithImage.php'> Ver preguntas </a>";
            mysqli_close($link);
            ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
