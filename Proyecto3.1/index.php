<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/estilos.css">
 <title>Vuelos</title>
</head>
<body>
 <?php
 $nombreArchivo = "Vuelos.csv";
 $archivo = fopen($nombreArchivo, "r") or die("No se puede abrir el archivo: $nombreArchivo");
 $datos = array();
 ?>
 <div class="container">
 <h1 class="titulo">Flights</h1>
 <table class="table">
 <!-- Diseño de tabla-->
 <thead class="thead-dark">
 <!-- encabezado-->
 <tr>
 <!-- diseño del renglon de encabezado-->
 <th>id</th>
 <th>Origen</th>
 <th>Destinación</th>
 <th>Duración</th>
 </tr>
 </thead>
 <tbody>
 <?php
 while (($datos = fgetcsv($archivo, 0, ',', '"', '"')) !== false) {
 print("<tr>");
 foreach ($datos as $campo) {
 print("<td>");
 print("$campo");
 print("</td>");
 }
 print("</tr>");
 }
 ?>
 </tbody>
 </table> <!-- Termina tabla -->
 </div>
</body>
</html>
