<?php
$nombreArchivo = "territory_names.csv";
$archivo = fopen($nombreArchivo,"r") or die("No se puede abrir el archivo: $nombre
Archivo");;
$datos = array();
while(( $datos = fgetcsv($archivo, 0, ',', '"', '"')) !== False){
 print_r ( $datos);
 print("<br>");

}