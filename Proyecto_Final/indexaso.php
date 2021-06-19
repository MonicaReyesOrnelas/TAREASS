<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./bootstrap.min.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <link rel="stylesheet" href="./es.css">
    
</head>

<body>
    <div clas="container">
        <header class="encabezado">
            <h2>Numero de televisores/pantallas que hay en cada vivienda en una determinada ciudad </h1>
            <span class="subt">El estudio abarca a 25000 hogares </span>
        </header>

        <?php
        require_once('./procesar.php');

        //sabemos que el archivo con los datos crudos es 'datosCrudos.txt'
        $archivo = './datosCrudos.txt';


        //creamos el histograma en un arreglo listo para usarse
        $arrHisto = crear_histograma($archivo);

        //se crea el archivo json y nada mas 
        $miJson = crear_json('./json/histograma.json', $arrHisto);

        //preparamos dos arreglos para separar las etiquetas de los valores
        //en dos listas diferentes 
        $lista_labels = array();
        $lista_valores = array();

        //recorremos para sacar los datos por separado (por conveniencia)
        //tambien sabemos que solo son  6 datos 
        foreach ($arrHisto as $horas => $temp) {
            $lista_labels[] = $horas;
            $lista_valores[] = $temp;
        }
        ?>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover marco_histo">
                    <thead class="thead">
                        <tr>
                            <th>Familias con 0 pantallas</th>
                            <th>Familias con 1 pantalla</th>
                            <th>Familias con 2 pantallas</th>
                            <th>Familias con 3 pantallas</th>
                            <th>Familias con 4 pantallas</th>
                            <th>Familias con 5 pantallas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $lista_valores[0]; ?></th>
                            <th><?php echo $lista_valores[1]; ?></th>
                            <th><?php echo $lista_valores[2]; ?></th>
                            <th><?php echo $lista_valores[3]; ?></th>
                            <th><?php echo $lista_valores[4]; ?></th>
                            <th><?php echo $lista_valores[5]; ?></th>
                        </tr>
                    </tbody>
                    <caption class="marco_histo"></caption>
                </table>
            </div>


        </div>
       

        <div class="encabezado cla">
            <h1>Grafica de Barra - Grafica de Pastel - Grafica Lineal</h1>
        </div>

        <div class="padre">
            <div class="ct-charts ct-octave cla"></div>
           
            <div class="ct-charts2 ct-octave"></div>
            <div class="ct-charts1 ct-octave"></div>
        </div>
        
       
        

        <div class="graficas">
            <script>
                // Configuracion de datos
                var datos = {
                    labels: [
                        '<?php echo $lista_labels[0]; ?> pantallas',
                        '<?php echo $lista_labels[1]; ?> pantalla',
                        '<?php echo $lista_labels[2]; ?> pantallas',
                        '<?php echo $lista_labels[3]; ?> pantallas',
                        '<?php echo $lista_labels[4]; ?> pantallas',
                        '<?php echo $lista_labels[5]; ?>pantallas',

                    ],
                    series: [

                        <?php echo $lista_valores[0]; ?>,
                        <?php echo $lista_valores[1]; ?>,
                        <?php echo $lista_valores[2]; ?>,
                        <?php echo $lista_valores[3]; ?>,
                        <?php echo $lista_valores[4]; ?>,
                        <?php echo $lista_valores[5]; ?>,
                    ]
                };
                // Configuracion de opciones
                var opciones = {
                    width: 620,
                    height: 540,
                    //fullWidth: true,
                    distributeSeries: true,
                    //showArea: true,
                    seriesBarDistance: 30,
                    showLine: false,
                    showPoint: false,
                    chartPadding: {
                        right: 35,
                        left: 10,
                        bottom: 20
                    },
                    axisX: {
                        // En el eje x, 'start' significa arriba y 'end' significa abajo
                        position: 'end',
                    },
                    axisY: {
                        type: Chartist.FixedScaleAxis,
                        ticks: [0, 500, 1000, 2000, 3000, 4000, 5000, 6000],
                        //low: 20,
                        high: 7000
                    }

                };
                var opcionesResponsive = [
                    ['screen and (min-width: 641px) and (max-width: 700px)', {
                        //seriesBarDistance:10,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value;
                            }
                        }

                    }],
                    ['screen and (max-width: 640px)', {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0];
                            }
                        }
                    }]

                ];

                new Chartist.Bar('.ct-charts', datos, opciones, opcionesResponsive);
                new Chartist.Line('.ct-charts2', {
                    labels: [
                        '<?php echo $lista_labels[0]; ?> pantallas',
                        '<?php echo $lista_labels[1]; ?> pantalla',
                        '<?php echo $lista_labels[2]; ?> pantallas',
                        '<?php echo $lista_labels[3]; ?> pantallas',
                        '<?php echo $lista_labels[4]; ?> pantallas',
                        '<?php echo $lista_labels[5]; ?>pantallas',
                    ],
                    series: [
                        [
                            <?php echo $lista_valores[0]; ?>,
                            <?php echo $lista_valores[1]; ?>,
                            <?php echo $lista_valores[2]; ?>,
                            <?php echo $lista_valores[3]; ?>,
                            <?php echo $lista_valores[4]; ?>,
                            <?php echo $lista_valores[5]; ?>
                        ]
                    ]
                }, {
                    width: 620,
                    height: 440
                });
                
                 new Chartist.Pie('.ct-charts1', {
                    series: [
                        
                            <?php echo $lista_valores[0]; ?>,
                            <?php echo $lista_valores[1]; ?>,
                            <?php echo $lista_valores[2]; ?>,
                            <?php echo $lista_valores[3]; ?>,
                            <?php echo $lista_valores[4]; ?>,
                            <?php echo $lista_valores[5]; ?>
                        
                    ]
                }, {
                    width: 620,
                    height: 440,
                    stroke: 'blue'
                });
                
            </script>
        </div>
    </div>

</body>

</html>