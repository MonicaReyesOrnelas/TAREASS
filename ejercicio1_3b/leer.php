<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leyendo linea a linea</title>
</head>
<body>
    <?php
    $miArchivo = fopen("miDiccionario.txt", "r")
        or die("No se puede abrir el archivo!");

    while (!feof($miArchivo)) {
       echo fgets($miArchivo) . "<br>";
    }

    fclose($miArchivo);
    ?>

</body>
</html>