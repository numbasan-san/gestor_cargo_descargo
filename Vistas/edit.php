<?php

    require_once '../Layout/layout.php';
    require_once "../Funciones/serviceFile.php";
    require_once "../Helpers/utilities.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $layout = new Layout();
    $service = new ServiceFile(false, true);
    $registro = null;

    if(isset($_GET["id"])){
        $registro = $service->GetById($_GET["id"]);
    }

?>
<?php echo $layout->printHeader(); ?>
<?php if ($registro == null): ?>
    <h2>Transacción inexistente.</h2>
<?php else : ?>
    <h2>Modificar Transacción.</h2>
    <form action="../Funciones/edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $registro->id ?>"></input>
        <div class="mb-3">
            <label class="form-label" for="registro-nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" id="inp_nombre" value="<?= $registro->nombre ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="registro-tipo">Tipo de Equipo:</label>
            <input type="text" name="tipo_equipo" class="form-control" id="inp_tipo" value="<?= $registro->tipo_equipo ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="registro-tipo">Tipo de Registro:</label>
            <select class="form-select" aria-label="Default select example" name='tipo_registro'>
                <?php if ($registro->tipo_registro == "cargo"): ?>
                    <option value="cargo">Cargo</option>
                    <option value="descargo">Descargo</option>
                <?php else : ?>
                    <option value="descargo">Descargo</option>
                    <option value="cargo">Cargo</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="registro-equipos">Equipos:</label>
            <input type="text" name="equipos" class="form-control" id="inp_equipos" value="<?= $registro->equipos ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="registro-seriales">Seriales:</label>
            <input type="text" name="seriales" class="form-control" id="inp_seriales" value="<?= $registro->seriales ?>">
        </div>
        <a href="../index.php" type="button" class="btn btn-warning">Regresar</a>
        <button type="submit" class="btn btn-primary">Editar</button>
	</form>
<?php endif; ?>
<br  /><br  />
<?php echo $layout->printFooter(); ?>