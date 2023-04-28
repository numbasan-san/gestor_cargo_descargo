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

    /*
    */
        header("Content-Type: application/vnd.msword");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("content-disposition: attachment;filename=".$file_name.".docx");

    $html  = <<<EOF
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    <body>
        <main style="margin-left: 15%; margin-right: 15%;" class="container">
            <div class="col-md-9" style="width: 85%; margin-top: 5%; margin-left: auto; margin-right: auto;">
                <div style="margin-left: 95%;">
                    <img style="position: absolute; height: 100px; width: 100px; z-index: -1;" src="gcs-logo.jfif" alt="RERORERORERO">
                </div>
                <center>
                    <p style="color: rgb(154, 205, 179) !important;"><b>Uso interno</b></p>
                    <h2><b>ANEXO 04 - CARGO EQUIPOS ELECTRÓNICOS</b></h2>
                </center>
                    <br  /><br  />
                <p style="text-align: justify;">
                    Quien suscribe, La Sra.: {$nombre}, Dominicano, mayor de edad, portador de la cédula de identidad y electoral No.:__________________________, domiciliado y residente en __________________________, de esta Ciudad de Santo Domingo, por medio del presente documento DECLARO, haber recibido de él/la Sr(a).:__________________________, portador de la cédula de identidad y electoral No.:__________________________, quien actúa como representante de la empresa GCS Systems, lo siguiente:
                </p>
                    <br  />
                <center>
                    <table style="word-break: break-all !important; white-space: nowrap !important; width: 150px !important; border: 1px solid; border-collapse: collapse;">
                        <thead style="border: 1px solid; height: 15px; padding: 02px !important;">
                            <td style="border: 1px solid; background-color: rgb(204, 217, 255) !important; text-align: center; height: 15px; padding: 02px !important;"><b>DESCRIPCIÓN</b></td>
                            <td style="border: 1px solid; background-color: rgb(204, 217, 255) !important; text-align: center; height: 15px; padding: 02px !important;"><b>DETALLES</b></td>
                        </thead style="border: 1px solid;">
                        <tr>
                            <td style="border: 1px solid; background-color: rgb(110, 173, 255) !important; text-align: center; height: 15px; padding: 02px !important;" ><b>EQUIPO</b></td>
                            <td style="border: 1px solid; height: 15px; padding: 02px !important;"><p><b>{$tipo_equipo}</b></p></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; background-color: rgb(110, 173, 255) !important; text-align: center; height: 15px; padding: 02px !important;"><b>TIPO DE EQUIPO</b></td>
                            <td style="border: 1px solid; height: 15px; padding: 02px !important;"><p style="width: 250px !important;"><b>{$tipo_equipo}</b></p></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; background-color: rgb(110, 173, 255) !important; text-align: center; height: 15px; padding: 02px !important;"><b>MARCA</b></td>
                            <td style="border: 1px solid; height: 15px; padding: 02px !important;"><p>{$equipos}</p></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; background-color: rgb(110, 173, 255) !important; text-align: center; height: 15px; padding: 02px !important;"><b>SERIAL</b></td>
                            <td style="border: 1px solid; height: 15px; padding: 02px !important;"><p>{$seriales}</p></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; background-color: rgb(110, 173, 255) !important; text-align: center; height: 15px; padding: 02px !important;"><b>NÚMERO TELEFÓNICO</b></td>
                            <td style="border: 1px solid; height: 15px; padding: 02px !important;"><p>qwertyu</p></td>
                        </tr>
                    </table>
                </center>
                    <br  />
                <p style="text-align: justify;">
                    Propiedad de la empresa GCS Systems LTD, los suscritos en el presente Recibo de Descargo, firman al pie del presente documento, en señal de aprobación de este.
                        <br  /><br  />
                    Al firmar este documento me comprometo a cumplir con los lineamientos establecidos en la POLÍTICA SERVICIOS TECNOLÓGICOS RCS-SEG-03-PL; así como con todas las políticas de Seguridad de la información y ciberseguridad de GCS Systems con sus procesos internos establecidos y divulgados.
                        <br  /><br  />
                    Hecho en dos (2) originales, una para cada parte firmante, en la Ciudad de Santo Domingo, Distrito Nacional, Capital de la República dominicana, a los {$day} días del mes de {$month} del año 2023.
                </p>
                    <br  /><br  /><br  />
                <div style="display: flex; flex-direction: row; flex-wrap: wrap; text-align: center;">
                    <div style="width: 50%;">
                        <p>
                            ________________________________
                            <br  />
                            Nombre y Firma
                            <br  />
                            <b>DECLARANTE</b>
                        </p>
                    </div>
                    <div style="width: 50%;">
                        <p>
                            ________________________________
                            <br  />
                            Nombre y Firma
                            <br  />
                            <b>REPRESENTANTE</b>
                        </p>
                    </div>
                </div>
                    <br  /><br  /><br  />
                    <br  /><br  /><br  />
                <div style="display: flex; flex-direction: row; flex-wrap: wrap;">
                    <div style="width: 33.3%; text-align: center;">
                        <p style="color: rgb(128, 167, 206) !important;">
                            <b>Código: RCS-SEG-03-PL</b>
                        </p>
                    </div>
                    <div style="width: 33.3%; align-items: center; text-align: center;">
                        <p style="color: rgb(154, 205, 179) !important;">
                            <b>Uso Interno</b>
                        </p>
                    </div>
                    <div style="width: 33.3%; align-items: center; text-align: center;">
                        <p style="color: rgb(128, 167, 206) !important;">
                            <b>V01</b>
                        </p>
                    </div>
                </div>
            </div>
            <br  /><br  /><br  />
        </div>
    </body>
</html>
EOF;

    echo $html;

    
    echo "<script>alert('Done!')</script>";
    // echo "<script>window.location='../index.php'</script>";

    // header("Location: ../index.php");

?>