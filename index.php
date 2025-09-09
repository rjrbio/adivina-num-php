<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina numero</title>
</head>

<body>
    <h1>Adivina el número</h1>
    <p>Adivina el número que estoy pensando, está entre el 1 y el 100.</p>
    <p>Tienes 5 oportunidades.</p>

    <?php
    $muestraFormulario = true;
    if (!isset($_POST["numInt"])) { // PRIMERA CARGA DE PAGINA
        $misterin = rand(1, 100);
        $oportunidades = 5;
    } else {  // SEGUNDA Y SUCESIVAS CARGAS
        $numInt = $_POST["numInt"];
        $misterin = $_POST["misterin"];
        $oportunidades = $_POST["oportunidades"];
        $oportunidades--;

        if ($numInt == $misterin) {
            echo "🙌Acertaste! Has ganado la moto del Jonatan";
            $muestraFormulario = false;
        }
        if (($oportunidades == 0) && ($numInt != $misterin)) {
            echo "<p>Fin del juego.💀</p>";
            echo "<p>El número era $misterin .</p>";
            $muestraFormulario = false;
        }

        if (($misterin < $numInt) && ($oportunidades > 0)){
            echo "El número es menor que $numInt";
            echo "<p>Te quedan $oportunidades oportunidades.</p>";
        }
        if (($misterin > $numInt) && ($oportunidades > 0)) {
            echo "El número es mayor que $numInt";
            echo "<p>Te quedan $oportunidades oportunidades.</p>";
        }
    }
    ?>

    <?php
    if ($muestraFormulario) {
        ?>
        <form action="index.php" method="post">
            <br><label for="numInt">Introduce un número:</label>
            <input type="number" name="numInt" id="numInt" min="1" max="100" autofocus>
            <input type="hidden" name="misterin" value="<?= $misterin ?>">
            <input type="hidden" name="oportunidades" value="<?= $oportunidades ?>">
            <input type="submit" value="Probar">
        </form>
    <?php
    } else {
    ?>
        <br><a href="index.php"><button>Vuelve a jugar</button></a>
    <?php
    }
    ?>
    <br>
</body>

</html>