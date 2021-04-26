<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leyendo un archivo</title>
</head>
<body>
    <?php
    $nombreArchivo = "archivoNuevo.txt";

    $archivo = fopen($nombreArchivo, "w")
        or die("Error al abrir el nuevo archivo");

    fwrite($archivo, "probando, probando, si, 1, 2, 3\n");
    fclose($archivo);
    $texto = readfile($nombreArchivo);
    echo "<div> $texto </div>";
    ?>