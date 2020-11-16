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
        echo "<td>" . $att['author'] . "</td>";

        foreach ($assessmentItem->children() as $group) {

            if ($group->getName() == 'itemBody') {
                echo "<td>$group->p</td>";
            }
            if ($group->getName() == 'correctResponse') {
                echo "<td>$group->response</td>";
            }
        }
    }

    echo "</table>";
    ?>
</body>

</html>