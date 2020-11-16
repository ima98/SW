<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php

        echo "<table border = ><tr><th>Email</th><th>Enunciado</th><th>Respuesta Correcta</th></tr>";

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

        }


              echo "</table>";




        /*foreach($xml->children() as $assessmentItemm){

            $autoor = $assessmentItem['author'];
            $enunciado = $assessmentItem->itemBody->p;
            $correcta = $assessmentItem->correctResponse->value;
            //$cont=$cont+1;

            
            echo "<tr>
                    <td>$author</td>
                    <td>$enunciado</td>
                    <td>$correcta</td>
                  </tr>";
      
        }
       
       */
    ?>
</body>
</html>