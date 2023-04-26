<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "../Funciones/serviceFile.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $layout = new Layout();
    $service = new ServiceFile(false, true);
    $registro = null;

    if(isset($_GET["id"])){
        $registro = $service->GetById($_GET["id"]);
    }

?>

<?php echo $layout->printHeader() ?>

<?php if($registro == null): ?>
    <h2>Registro inexistente.</h2>
<?php else : ?>
    <div class="row">
        <div class="col-md-4">
            <input type="hidden" name="id" value="<?= $registro->id ?>"></input>
            <p class="card-text"><b>Nombre: </b><?= $registro->nombre ?>.</p>
            <p class="card-text"><b>Fecha/Hora</b>: <?= $registro->fecha . " " . $registro->hora ?>.</p>
            <p class="card-text"><b>Tipo: </b><?= $registro->tipo_registro ?>.</p>
            <p class="card-text"><b>Tipo de Equipo: </b><?= $registro->tipo_equipo ?>.</p>
            <p class="card-text"><b>Equipos: </b><?= $registro->equipos ?>.</p>
            <p class="card-text"><b>Seriales: </b><?= $registro->seriales ?>.</p>
                <hr  />
            <a href="word_print.php?id=<?= $registro->id ?>" class="btn btn-success">Exportar .docx</a>
            <a href="delete.php?id=<?= $registro->id ?>" class="btn btn-danger">Eliminar</a>
            <a href="edit.php?id=<?= $registro->id ?>" class="btn btn-warning">Editar</a>
                
        </div>
        <div class="col-md-8">
            <center>
                <embed src="docs/sample_output.pdf" type="application/pdf" withd="200px" height="450px" />
            </center>            
        </div>
    </div>
<?php endif; ?>

<br  /><br  />

<?php echo $layout->printFooter (); ?>
