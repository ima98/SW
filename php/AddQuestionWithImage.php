<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
  <?php include 'DbConfig.php' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php

      $link = mysqli_connect($server, $user, $pass, $basededatos);


      if (!comprobar($_POST['correo'], $_POST['tema'], $_POST['pregunta'], $_POST['correcta'], $_POST['incorrecta1'], $_POST['incorrecta2'], $_POST['incorrecta3'])) {
        die("");
      }


      if ($_FILES['imgInp']['name'] == "") {
        $image = "../images/índice.jpg";
      } else {
        $image = $_FILES['imgInp']['tmp_name'];
      }

      $contenido_imagen = addslashes(file_get_contents($image));



      $sql = "INSERT INTO preguntas(correo, tema, pregunta, correcta, incorrecta1, incorrecta2, incorrecta3, dificultad, imagen) VALUES
              ('$_POST[correo]','$_POST[tema]', '$_POST[pregunta]', '$_POST[correcta]' ,'$_POST[incorrecta1]' ,'$_POST[incorrecta2]', 
              '$_POST[incorrecta3]', '$_POST[dificultad]','$contenido_imagen')";



      if (!mysqli_query($link, $sql)) {
        echo "La pregunta no se ha podido añadir correctamente, intentalo mas tarde :(";
        die("");
      } else {

        $xml = simplexml_load_file('../xml/Questions.xml');

        if($xml!=false){
          $pregunta = $xml->addChild('assessmentItem');
          $pregunta->addAttribute('subject', $_POST['tema']);
          $pregunta->addAttribute('author', $_POST['correo']);
          $itembody = $pregunta->addChild('itemBody');
          $itembody->addChild('p', $_POST['pregunta']);
          $correcta = $pregunta->addChild('correctResponse');
          $correcta->addChild('response', $_POST['correcta']);
          $incorrecta = $pregunta->addChild('incorrectResponses');
          $incorrecta->addChild('response', $_POST['incorrecta1']);
          $incorrecta->addChild('response', $_POST['incorrecta2']);
          $incorrecta->addChild('response', $_POST['incorrecta3']);
          $xml->asXML('../xml/Questions.xml');
        
        }else{
        echo "PREGUNTA NO SE HA PODIDO AÑADIR AL XML :(";
        }
       
        echo "PREGUNTA AÑADIDA AL XML :)";
        echo "PREGUNTA AÑADIDA AL MYSQL:)";
      }

      echo "<p> <a href='ShowQuestionsWithImage.php?email=" . $email . "'> Ver preguntas </a>";
      mysqli_close($link);




      /*if (strlen($_FILES['imgInp']['tmp_name']) == 0) {
             //$('#imgInp').src='../images/perro.jpg';
              $target =addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
            }else{
              $target = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));
            }

              //$target = addslashes(file_get_contents($_FILES['imgInp']['tmp_name']));

           */
      function comprobar($correo, $tema, $pregunta, $correcta, $incorrecta1, $incorrecta2, $incorrecta3)
      {



        $boo = True;

        if (preg_match("/.{10,}$/", $pregunta) == 0) {
          echo "Error, la longitud de la pregunta tiene que ser al menos 10. <br>";
          $boo = False;
          return false;
        }

        if (preg_match("/(((^[a-zA-Z]+)([0-9]{3})@ikasle.ehu.(eus|es))|((^[a-zA-Z]+).?([a-zA-Z]*)@ehu.(eus|es)))$/", $correo) == 0) {

          //preg_match("/^([a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es)))|([a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es)))$/", $correo) == 0

          echo "Error, formato email no es el correcto. <br>";
          $boo = False;
          return false;
        }
        //([a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es)))|([a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es)))
        if (strlen($correcta) == 0  || strlen($incorrecta1) == 0 || strlen($incorrecta2) == 0 || strlen($incorrecta3) == 0 || strlen($tema) == 0) {
          echo "Error, hay campos vacios. <br>";
          $boo = False;
          return false;
        }

        return true;
      }



      ?>




    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>