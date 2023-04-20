<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once "serviceLog.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $service = new ServiceFile ();
    $registro = null;

    $salida = array(); //contendrá cada linea salida desde la aplicación en Python
    
    if(isset($_GET["id"])){
        $registro = $service->GetById($_GET["id"]);
    }
    exec("py sys_args.py {$registro->id} {$registro->nombre} {$registro->fecha} {$registro->hora} {$registro->tipo_registro} {$registro->tipo_equipo} {$registro->equipos} {$registro->seriales}", $salida); 

    echo "{$salida}";

?>