<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";
    require_once 'phpword/PHPWord-master/src/PhpWord/Autoloader.php';
    phpword\PHPWord-master\src\PhpWord;

    $service = new ServiceFile();

    if(isset($_GET["id"])){
        $registro = $service->GetById($_GET["id"]);
    }
    
    $salida = array();
    exec("py month.py {$registro->fecha}", $salida);
    
    /* 
    for($i = 0; $i < count($salida); $i++){
        //if ($i == 1){
            echo $salida[$i]."<br>";
        //}
    }
    */
    $nombre = $registro->nombre;
    $day = $salida[0];
    $month = $salida[1];
    $year = $salida[2];
    $tipo_registro = $registro->tipo_registro;
    $tipo_equipo = $registro->tipo_equipo;
    $equipos = $registro->equipos;
    $seriales = $registro->seriales;

    $file_name = "$"."_cumento compromiso de politicas Aparatos ".$nombre;

    $template_word;

    
    echo "<script>alert('Done!')</script>";
    // echo "<script>window.location='../index.php'</script>";

    // header("Location: ../index.php");

?>