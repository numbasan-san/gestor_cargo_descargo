<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once "serviceLog.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $service = new ServiceFile ();

    /* if (isset($_POST["nombre"]) || isset($_POST["cedula"]) || isset($_POST["tipo"]) || isset($_POST["equipos"]) || isset($_POST["seriales"])) { */
        $date = new DateTime();
		$fecha = date ("d") . "/" . date ("m") . "/". date ("Y") ;
		$hora = date ("H"). ":" . date ("i");
        $registro = new Registro (0, $_POST["nombre"], $fecha, $hora, $_POST["tipo_equipo"], $_POST["equipos"], $_POST["tipo_registro"], $_POST["seriales"]);
        $service->Add($registro);
        header("Location: ../index.php");
    // }

?>