<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

        <?php
         echo "<table border='2'>
         <tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th><th>Respuesta incorrecta</th>
         <th>Tema</th></tr>";
        $xml = simplexml_load_file("../xml/Questions.xml");

         foreach ($xml->children() as $assessmentItem) {

          echo "<tr>";
          $att = $assessmentItem->attributes(); 
          echo "<td>". $att['author']."</td>";

          foreach ($assessmentItem->children() as $group) {

              if ($group->getName() == 'itemBody') {
                  echo "<td>$group->p</td>";
              }
                if ($group->getName() == 'correctResponse') {
                  echo "<td>$group->response</td>";
              }
              
              if ($group->getName() == 'incorrectResponses') {
                echo "<td><ul>";
                foreach($group->children() as $inco){
                  
                  echo "<li>" ;
                  echo $inco;
                  echo "</li>";
                  
                }
                echo "</td></ul>";
                
            }
        

          } 
          echo "<td>". $att['subject']."</td>";

        echo "</tr>";
      }
      echo "</table>";
        ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>