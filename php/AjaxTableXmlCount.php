<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
$email=$_REQUEST['email'];
    echo "<table style='width:800px; margin:0 auto;' border = ><tr><th>Preguntas totales</th><th>Preguntas propias</th></tr>";
    $xml = simplexml_load_file("../xml/Questions.xml");
    $contpropio=0;
    $conttotal=0;
    
    foreach ($xml->children() as $assessmentItem) {

        $att = $assessmentItem->attributes();
        if($att['author']==$email){
            $contpropio=$contpropio+1;
        }
        $conttotal=$conttotal+1;
    }
    echo "<td>";
    echo $conttotal;
    echo "</td>";
    echo "<td>";
    echo $contpropio;
    echo "</td>";


    echo "</table>";
    ?>
</body>

</html>