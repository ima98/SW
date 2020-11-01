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
        <input id="email" name="email" size="75" type="text"><br>

        <label for="tema">Contraseña :</label>
        <input id="password" name="password" size="75" type="password"><br>

        <br><br>
        <input type="submit" name="enviar" value="Enviar">

      </form>

    </div>

    <div>

      <?php

      include 'DbConfig.php';
      if (isset($_POST['email'])) {
          
          $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
          if(!$mysqli){
              die("Fallo al conectar con Mysql: ");
          }
          $email = $_REQUEST['email'];
          $pass = $_REQUEST['password'];

          $sql = "SELECT * FROM usuarios WHERE email=\"".$email."\" and password=\"".$pass."\";";
          //echo $sql;

          $resultado = mysqli_query($mysqli,$sql,MYSQLI_USE_RESULT);
         /* if(!$resultado){
              die("Error: ".mysqli_error($mysqli));
          }*/
          $row = mysqli_fetch_array($resultado);
          if($row[0]==$email && $row[3]==$pass){
              $_SESSION['email']=$email;
              echo "<script>
              alert('Inicio de sesión realizado correctamente. Pulsa aceptar para acceder a la pantalla principal.');
              window.location.href='Layout.php?email=$email';
              </script>";

          }else{
              echo "Datos incorrectos, te jodes. <br>";
              echo "<a href='javascript:history.back()'>Volver atrás</a>";
          }

      }


  ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>