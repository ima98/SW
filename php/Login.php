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
      <h3>Introduce tus datos</h3>
      <br>

      <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="POST">

        <label for="tema">Email :</label>
        <input id="email" name="email" size="75" type="text" required><br>

        <label for="tema">Contraseña :</label>
        <input id="password" name="password" size="75" type="password" required><br>

        <br><br>
        <input type="submit" name="enviar" value="Enviar">

      </form>

    </div>

    <div>

      <?php

      include 'DbConfig.php';
      if (isset($_POST['email'])) {

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli) {
          die("Fallo al conectar con Mysql: ");
        }
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        $pass=crypt($pass,'_S4..some');

        $sql = "SELECT * FROM usuarios WHERE email=\"" . $email . "\" and password=\"" . $pass . "\";";
        //echo $sql;

        $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
        /* if(!$resultado){
              die("Error: ".mysqli_error($mysqli));
          }*/
        $row = mysqli_fetch_array($resultado);
        if ($row[0] == $email && $row[3] == $pass) {

          if($row[5]=='ACTIVO'){

            $_SESSION['email']=$email;

            if($row[0]=='admin@ehu.es'){
               echo "<script>
                alert('BIENVENIDO ADMIN :()');
                window.location.href='Layout.php';
                </script>";
            }
               echo "<script>
                alert('BIENVENIDO :)');
                window.location.href='Layout.php';
                </script>";
         
            }else{
              echo "<script>
        	     alert('LO SENTIMOS, $row[0] ESTA BLOQUEADO');
  	           window.location.href='Layout.php';
        	     </script>";  
          }
         
        } else {
          echo "Datos incorrectos :( <br>";
        }
      }


      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>