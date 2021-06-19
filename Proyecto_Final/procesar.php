<?php
//funciona para procesar  el archivo  de datos crudos
//la funcion retorna un arreglo  asociativo con el histograma
function  crear_histograma($path_arch)
{
    //abrimos el archivo en modo lectura
    $handle = fopen($path_arch, 'r');

    //creamos arreglo
    $histograma = array(
        'cero' => 0,
        'uno' => 0,
        'dos' => 0,
        'tres' => 0,
        'cuatro' => 0,
        'cinco'=> 0
    );

    //se leen los datos  del archivo 
    //renglon por renglon para sacar el histograma
    while(!feof($handle)) {

        /*usamos la funcion  trim para eliminar  los espacios en blanco 
        del inicio y el final de la cadena  u otro tipo  de caracteres como:

        " " (ASCII 32(0x20)), espacio simple.
        "\t" (ASCII 9(0x09)), tabulacion.
         "\n" (ASCII 10(0x0A)), salto de linea.
         "\r" (ASCII 13(0x0D)), retorno de carro
         "\0" (ASCII 0(0x00)), el byte NUL 
        "\x0B"  (ASCII 11(0x0B)), tabulacion vertical.
        */
        $temp = trim(fgets($handle));

        //poblamos el histograma
        if($temp =='0'){
            $histograma['cero'] += 1;
        } elseif($temp == '1') {
           $histograma['uno'] += 1;
        } elseif($temp == '2') {  
            $histograma['dos'] += 1;
        } elseif($temp == '3') {
            $histograma['tres'] += 1;
        } elseif($temp == '4') {
            $histograma['cuatro'] += 1; 
        } elseif($temp == '5') {
            $histograma['cinco'] += 1;
        }   
    }
    fclose($handle);
    return $histograma;
}
//funcion para procesar a json el histograma
//se crea la version del histograma en un archivo json 
//retorna el histograma en formato json 
function crear_json($path_arch_json,  $arreglo_histo)
{
    $handle  = fopen($path_arch_json, 'w' );

    //se crea el json 
    $histo_json = json_encode($arreglo_histo);

    //se escribe el json en el archivo
    fwrite($handle, $histo_json);
    
    fclose($handle);
    return $histo_json;
}   
