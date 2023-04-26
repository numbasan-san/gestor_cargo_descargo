<?php

    require_once '../Layout/layout.php';
    require_once "../Helpers/utilities.php";
    require_once "../Funciones/serviceFile.php";
    require_once '../Class/registro.php';
    require_once "../FileHandler/JsonFH.php";

    $utilities = new Utilities();
    $service = new ServiceFile(false, true);
    $layout = new Layout();

    $registros = $service->GetList();

    echo count($registros);
    /*
    if(($tipo_regist) == $_GET("tipo_registro")){
        
    }
    */

?>
<?php echo $layout->printHeader(); ?>
<div class="row">
        <div class="col-md-10">
            <label class="form-label" for="registro-tipo">Clasificar por:</label>
            <a href="sort_out.php?tipo_registro=descargo" class="btn btn-success">Descargo</a>
            <a href="sort_out.php?tipo_registro=cargo" class="btn btn-primary">Cargo</a>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modal-nueva-transaccion">Nuevo Registro</button>
        </div>
    </div>
        <hr  />
    <?php if(count($registros) == 0): ?>
        <h2>No hay cargo o descargo alguno registrado.</h2>
    <?php else : ?>
        <table class="table table-bordered table-hover">
            <tr>
                <td><p class="card-text"><b>Nombre</b></p></td>
                <td><p class="card-text"><b>Fecha/Hora</b></p></td>
                <td><p class="card-text"><b>Tipo</b></p></td>
                <td><p class="card-text"><b>Aparatos</b></p></td>
                <td><p class="card-text"></p></td>
            </tr>
            <?php foreach($registros as $registro): ?>
                    <tr>
                        <td><p class="card-text"><?= $registro->nombre ?></p></td>
                        <td><p class="card-text"><?= $registro->fecha . " " . $registro->hora ?></p></td>
                        <td><p class="card-text"><?= $registro->tipo_registro ?></p></td>
                        <td><p class="card-text"><?= $registro->equipos ?></p></td>
                        <td><a href="Vistas/more_info.php?id=<?= $registro->id ?>" class="link">Más...</a></td>
                    </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<div class="modal" id="modal-nueva-transaccion" tabindex="-1" aria-labelledby="modal-transacciones-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-transacciones-label">Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Funciones/add.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="registro-nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" id="inp_nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="registro-tipo">Tipo de Equipo:</label>
                        <input type="text" name="tipo_equipo" class="form-control" id="inp_tipo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="registro-tipo">Tipo de Registro:</label>
                        <select class="form-select" aria-label="Default select example" name='tipo_registro' required>
                            <option value=''>Elija uno</option>
                            <option value="cargo">Cargo</option>
                            <option value="descargo">Descargo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="registro-equipos">Equipos:</label>
                        <input type="text" name="equipos" class="form-control" id="inp_equipos" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="registro-seriales">Seriales:</label>
                        <input type="text" name="seriales" class="form-control" id="inp_seriales" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br  /><br  />
<?php echo $layout->printFooter (); ?>