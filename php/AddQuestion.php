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
            ('$_POST[correo]','$_POST[tema]', '$_POST[pregunta]', '$_POST[correcta]' ,'$_POST[incorrecta1]' ,'$_POST[incorrecta2]', 
            '$_POST[incorrecta3]', '$_POST[dificultad]')";
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
