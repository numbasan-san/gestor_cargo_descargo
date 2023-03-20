<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once "serviceLog.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";
    require_once "../FileHandler/SerializationFH.php";

    $service = new ServiceFile ();
    $logvice = new ServiceLog ();

    if (isset($_POST["nombre"]) || isset($_POST["cedula"]) || isset($_POST["tipo"]) || isset($_POST["equipos"]) || isset($_POST["seriales"])) {
        $date = new DateTime();
		$fecha = date ("d") . "/" . date ("m") . "/". date ("Y") ;
		$hora = date ("H"). ":" . date ("i");
        $registro = new Registro (0, $_POST["nombre"], $_POST["cedula"], $fecha, $hora, $_POST["tipo"], $_POST["equipos"], $_POST["seriales"]);
        $service->Add($registro);
        header("Location: ../index.php");
    }

?>