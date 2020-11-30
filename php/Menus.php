<div id='page-wrap'>
  <header class='main' id='h1'>
    <span id="registro" class="right"><a href="SignUp.php">Registro</a></span>
    <span id="login" class="right"><a href="Login.php">LogIn</a></span>
    <span id="logout" class="right" style="display:none;"><a href="LogOut.php">LogOut</a></span>

  </header>
  <nav class='main' id='n1' role='navigation'>

    <span><a href='Layout.php'>Inicio</a></span>
    <span id='preguntas' style='display:none'><a href='HandlingQuizesAjax.php'>Insertar Preguntas</a></span>
    <span id='usuarios' style='display:none'><a href='HandlingAccounts.php'>Gestionar Usuarios</a></span>
    <span><a href='Credits.php'>Creditos</a></span>





  </nav>

  <script src='../js/jquery-3.4.1.min.js'></script>

  <?php
  if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    if ($_SESSION['email'] == "admin@ehu.es") {

      echo "<script>

      $('#registro').hide();
      $('#login').hide();
      $('#logout').show();
      $('#usuarios').show();
      $('#h1').append('<p>$email </p>');
      $('#h1').append('<img width=\'50\' height=\'60\' src=\'data:image/*;base64," . getImagenDeBD($email) . "\' alt=\'Imagen\'/>');
    </script>";
    } else {


      echo "<script type='text/javascript'>
            
            $('#preguntas').show();
            $('#registro').hide();
            $('#login').hide();
            $('#logout').show();
            
            $('#h1').append('<p>$email </p>');
            $('#h1').append('<img width=\'50\' height=\'60\' src=\'data:image/*;base64," . getImagenDeBD($email) . "\' alt=\'Imagen\'/>');
        

        </script>";
    }
  } else {
    $email = "";
    echo "<script> function cierreSesion(){
            $('#registro').show();
            $('#login').show();
            $('#logout').hide();
            $('#preguntas').hide();
            $('#usuarios').hide();

        }</script>";
  }
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