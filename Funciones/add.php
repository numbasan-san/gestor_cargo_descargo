<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once "log_file.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $service = new ServiceFile();
    $log = new LogFile();

    $id = $service->data_lenght();
    $nombre = $_POST["nombre"];
    $tipo_registro = $_POST["tipo_registro"];
    $tipo_equipo = $_POST["tipo_equipo"];
    $equipos = $_POST["equipos"];
    $seriales = $_POST["seriales"];

    $date = new DateTime();
    $fecha = date ("d") . "/" . date ("m") . "/". date ("Y") ;
    $hora = date ("H"). ":" . date ("i");
    $registro = new Registro (
        0, 
        $nombre, 
        $fecha, 
        $hora, 
        $tipo_registro, 
        $tipo_equipo, 
        $equipos, 
        $seriales
    );
    $service->Add($registro);
    
    // $log->Add("Un nuevo registro con los siguientes datos: {$id}, {$tipo_registro}, {$tipo_equipo}, {$equipos}, {$seriales} fue agregado el {$fecha} a las {$hora}.");
    header("Location: ../index.php");

?>