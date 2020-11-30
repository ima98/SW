<?php session_start();
session_destroy();
?>

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
            echo "<script>
                    alert('Hasta pronto amigo :)');
                    window.location.href='Layout.php';
                </script>";  
        ?>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>