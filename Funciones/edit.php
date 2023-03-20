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
        $service->Edit($registro);
        header("Location: ../index.php");        
    }

?>
<?php echo $layout->printHeader(); ?>
<?php if ($transaccion == null): ?>
    <h2>Transacción inexistente.</h2>
<?php else : ?>
    <h2>Modificar Transacción.</h2>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $transaccion->id ?>"></input>
	    <div class="mb-3">
		    <label for="transaccion-monto" class="form-label">Monto:</label>
            <input type="text" value="<?= $transaccion->monto ?>" class="form-control" name="monto">
		</div>
        <div class="mb-3">
            <label class="form-label" for="transaccion-motivo">Motivo:</label>
            <input type="text" value="<?= $transaccion->motivo ?>" class="form-control" name="motivo">
        </div>
        <a href="../index.php" type="button" class="btn btn-warning">Regresar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
	</form>
<?php endif; ?>
<br  /><br  />
<?php echo $layout->printFooter(); ?>