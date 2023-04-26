<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $layout = new Layout();
    $service = new ServiceFile();
    // $log = new LogFile();
    $registro = null;

    if(isset($_GET["id"])){
        $registro = $service->GetById($_GET["id"]);
    }

    if (
        isset($_POST["id"]) &&
        isset($_POST["nombre"]) &&
        isset($_POST["tipo_registro"]) &&
        isset($_POST["tipo_equipo"]) &&
        isset($_POST["equipos"]) &&
        isset($_POST["seriales"])
    ) {
        $fecha = date ("d") . "/" . date ("m") . "/". date ("Y") ;
        $hora = date ("H"). ":" . date ("i");
        $registro = new Registro (
            $_POST["id"], 
            $_POST["nombre"], 
            $fecha, 
            $hora, 
            $_POST["tipo_registro"], 
            $_POST["tipo_equipo"], 
            $_POST["equipos"], 
            $_POST["seriales"]
        );
        $id = $_POST['id'];
        $service->Edit($registro);
        // $log->Add("El registro con el ID {$id} fue modificado el {$fecha} a las {$hora}.");
        header("Location: ../index.php");        
    }

?>