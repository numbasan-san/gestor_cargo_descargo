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

    if ( isset ( $_GET [ "id" ] ) ) {

        $registro = $service->GetById ( $_GET [ "id" ] );

    }

?>
<?php echo $layout->printHeader (); ?>
<?php if ( $registro == null ): ?>
    <h2>Transacción inexistente.</h2>
<?php else : ?>
    <!-- form action="edit.php" method="POST"></form -->

    <div class="row">
        <div class="col-md-4">
            <input type="hidden" name="id" value="<?= $registro->id ?>"></input>
            <p class="card-text"><b>Nombre: </b><?= $registro->nombre ?></p>
            <p class="card-text"><b>Cédula: </b><?= $registro->cedula ?></p>
            <p class="card-text"><?= $registro->fecha . " " . $registro->hora ?></p>
            <p class="card-text"><b>Tipo: </b><?= $registro->tipo ?></p>
            <p class="card-text"><b>Equipos: </b><?= $registro->equipos ?></p>
            <p class="card-text"><b>Seriales: </b><?= $registro->seriales ?></p>
                <hr  />
            <button class="btn btn-success">Exportar .doc</button>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <img src="" class="card-img" alt="RERORERORERORERORERORERORERORERO">
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>
<br  /><br  />
<?php echo $layout->printFooter (); ?>