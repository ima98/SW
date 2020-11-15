<?php

if (isset($_GET['email']) && strval($_GET['email']) != "") {
  $email = strval($_GET['email']);
  echo "<script type='text/javascript'>
  function inicioSesion() {

    $('#insertar').show();
    $('#logout').show();
    $('#show').show();
     $('#showXML').show();
    $('#registro').hide();
    $('#login').hide();

    $('#h1').append('<p>$email </p>');
    $('#h1').append('<img width=\'50\' height=\'60\' src=\'data:image/*;base64," . getImagenDeBD($email) . "\' alt=\'Imagen\'/>');
  }
  
</script>";
  echo "<script>window.onload = inicioSesion; </script>";
} else {
  $email = "";
}
?>


<div id='page-wrap'>
  <header class='main' id='h1'>
    <span id="registro" class="right"><a href="SignUp.php">Registro</a></span>
    <span id="login" class="right"><a href="Login.php">Login</a></span>
    <span id="logout" class="right" style="display:none;"><a href="LogOut.php">Logout</a></span>

  </header>
  <nav class='main' id='n1' role='navigation'>

    <?php echo "<span><a href='Layout.php?email=" . $email . "'>Inicio</a></span>";
    echo "<span id='insertar' style='display:none'><a href='QuestionFormWithImage.php?email=" . $email . "'>Insertar Pregunta </a></span>";
    echo " <span id='show' style='display:none'><a href='ShowQuestionsWithImage.php?email=" . $email . "'>Ver Preguntas</a></span>";
    echo " <span id='showXML' style='display:none'><a href='ShowXmlQuestions.php?email=" . $email . "'>Ver Preguntas XML</a></span>";
    echo "<span><a href='Credits.php?email=" . $email . "'>Creditos</a></span>"

    ?>



  </nav>

  <script src='../js/jquery-3.4.1.min.js'></script>
  <!-- <?php //echo $email;  ?></p>'); -->
  <?php

  function getImagenDeBD($email)
  {
    include 'DbConfig.php';
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    $sql = "SELECT foto FROM usuarios WHERE email=\"" . $email . "\";";
    $resul = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
    $img = mysqli_fetch_array($resul);
    return $img['foto'];
  }
  ?>