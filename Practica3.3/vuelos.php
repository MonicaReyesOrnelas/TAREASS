<?php
//Este arreglo tiene la información a guardar en el archivo csv
$vuelos = array(
    array('id','Origen','Destino','Duración'),
    array('1','New York','London','415'),
    array('2','Shangai','Paris','760'),
    array('3','Istambul','Tokyo','700'),
    array('4','New York','Paris','435'),
    array('5','Moscow','Paris','245'),
    array('6','Lima','New York','455')
);
//Nombre del archivo en el servidor
$nombreArch = 'vuelos2.csv';
//Abrimos el archivo en modo escritura
$archivo = fopen($nombreArch, 'w') or die("No se puede abrir el archivo: $nombreArch");
//recorriendo el arreglo 2D
foreach ($vuelos as $vuelo) 
{
//escribiendo cada registro (vuelo) en el archivo CSV
    $resp = fputcsv($archivo, $vuelo, ',', '"', '"');
//si el resultado de intentar escribir es estrictamente igual a false…
    if ($resp === false) { die("Error al escribir en CSV"); }
}
//fin-foreach
//cerramos archivo
fclose($archivo) or die("No se puede cerrar el archivo: $nombreArch");
echo ("<h1> Revisa el archivo: $nombreArch </h1> ");