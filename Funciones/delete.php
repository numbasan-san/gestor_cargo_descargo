<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "serviceFile.php";
    require_once "serviceLog.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";
    require_once "../FileHandler/SerializationFH.php";

    $layout = new Layout ();
    $service = new ServiceFile ();
    $logvice = new ServiceLog ();
    $registro = null;

    if (isset($_POST["nombre"]) || isset($_POST["cedula"]) || isset($_POST["tipo"]) || isset($_POST["equipos"]) || isset($_POST["seriales"])) {
        $registro = $service->GetById ( $_GET [ "id" ] );
    }

    if (isset($_POST["nombre"]) || isset($_POST["cedula"]) || isset($_POST["tipo"]) || isset($_POST["equipos"]) || isset($_POST["seriales"])) {
        $date = new DateTime();
		$fecha = date("d") . "/" . date("m") . "/". date("Y") ;
		$hora = date("H"). ":" . date("i");
        $registro = new Registro (0, $_POST["nombre"], $_POST["cedula"], $fecha, $hora, $_POST["tipo"], $_POST["equipos"], $_POST["seriales"]);
        $service->Delete($registro);
        header("Location: ../index.php");        
    }

?>

<?php echo $layout->printHeader(); ?>
<?php if ($transaccion == null): ?>
    <h2>Transacción inexistente.</h2>
<?php else : ?>
    <h2>¿Quiere eliminar la transaccion?</h2>
        <hr  />
    <form action="delete.php" method="POST">
	    <div class="mb-3">
            <label for="">ID:</label>
            <input type="text" class="form-control" value="<?= $transaccion->id ?>" name="id" readonly>
	    </div>
	    <div class="mb-3">
            <label for="">Fecha/Hora:</label>
            <input type="text" class="form-control" value="<?= $transaccion->fecha . " " . $transaccion->hora ?>" name="fecha" readonly>
	    </div>
	    <div class="mb-3">
            <label for="">Monto:</label>
            <input type="text" class="form-control" value="<?= $transaccion->monto ?>" name="monto" readonly>
	    </div>
	    <div class="mb-3">
            <label for="">Motivo:</label>
            <input type="text" class="form-control" value="<?= $transaccion->motivo ?>" name="motivo" readonly>
	    </div>
            <br  />
        <a href="../index.php" type="button" class="btn btn-warning">Regresar</a>
        <button type="submit" class="btn btn-primary">Eliminar</button>
	</form>
<?php endif; ?>
<br  /><br  />
<?php echo $layout->printFooter (); ?>