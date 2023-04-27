<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $service = new ServiceFile();

    if(isset($_GET["id"])){
        $registro = $service->GetById($_GET["id"]);
    }

    $nombre = str_replace(' ', '_', $registro->nombre);
    $tipo_equipo = str_replace(' ', '_', $registro->tipo_equipo);
    $tipo_registro = str_replace(' ', '_', $registro->tipo_registro);
    $equipos = str_replace(' ', '_', $registro->equipos);
    $seriales = str_replace(' ', '_', $registro->seriales);

    $salida = array();
    exec("py word_generator.py {$nombre} {$registro->fecha}  {$tipo_registro} {$tipo_equipo} {$equipos} {$seriales}", $salida);
    
    /* 
    */
    for($i = 0; $i < count($salida); $i++){
        //if ($i == 1){
            echo $salida[$i]."<br>";
        //}
    }

    // exec("py sys_args.py {$registro->id} {$registro->nombre} {$registro->fecha} {$registro->hora} {$registro->tipo_registro} {$registro->tipo_equipo} {$registro->equipos} {$registro->seriales}", $salida);
    
    header("Location: ../index.php");

?>