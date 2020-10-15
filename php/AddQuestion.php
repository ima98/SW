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
            $link = mysqli_connect("localhost", "root", "", "quiz");
            $sql="INSERT INTO preguntas(correo, tema, pregunta, correcta, incorrecta1, incorrecta2, incorrecta3, dificultad) VALUES
            ('$_GET[correo]','$_GET[tema]', '$_GET[pregunta]', '$_GET[correcta]' ,'$_GET[incorrecta1]' ,'$_GET[incorrecta2]', 
            '$_GET[incorrecta3]', '$_GET[dificultad]')";
            if (!mysqli_query($link ,$sql))
            {
                die('Error: ' . mysqli_error($link));
            }
            echo "PREGUNTA AÑADIDA";
            echo "<p> <a href='ShowQuestions.php'> Ver preguntas </a>";
            mysqli_close($link);
            ?>

        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>
</html>
