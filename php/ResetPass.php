<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <h3>Cuenta del usuario</h3>
      <br>

      <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="POST">

        <label for="tema">Email :</label>
        <input id="email" name="email" size="75" type="text" required><br>


        <br><br>
        <input type="submit" name="enviar" value="Enviar">

      </form>

    </div>

    <div>

      <?php



      if (isset($_POST['enviar'])) {

      include 'DbConfig.php';

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli) {
          die("Fallo al conectar con Mysql: ");
        }
        $email = $_REQUEST['email'];
        

        $sql = "SELECT * FROM usuarios WHERE email=\"" . $email . "\";";
        //echo $sql;

        $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
        /* if(!$resultado){
              die("Error: ".mysqli_error($mysqli));
          }*/
        $row = mysqli_fetch_array($resultado);
        if ($row[0] == $email) {
          $codigo=rand(1000,9999);
          $_SESSION['emailTemp'] = $email;
          $_SESSION['codigo']=$codigo;

          $texto="enlace para cambiar la contraseña:'$email'  y el codigo: '$codigo'";

          

          mail($email, "cambio de contraseña", $texto);

          
        } else {
          echo "No existe ningún usuario con ese email<br>";
        }
      }


      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>