<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <?php
        include_once '../../BL/AsignaturaBL.php';
        $id = $_GET['id'];
        $asignaturaBL = new AsignaturaBL();
        $tbData = $asignaturaBL->BuscarId($id);
        foreach ($tbData as $fila) {
            $idCarrera = $fila['IDCarrera'];
        ?>
        <form action="./Services/Serv_update.php" method="POST">
        <div class="card-header fs-2 bg-navy">
            <span class="badge badge-primary mr-1">
                <i class="fa-solid fa-i"></i>
                <i class="fa-solid fa-4"></i>
            </span>
            · Editar Asignatura
        </div>
        <div class="card-body row" style="gap: 20px">
            <div class="container col">
                <input type="hidden" class="form-control" name="id" value="<?php echo $fila['IDAsignatura'] ?>">
                <div class="row ml-0">
                    <div class="mb-3 col-sm-12">
                        <label for="carrera" class="form-label">Carrera:</label>
                        <input type="text" class="form-control" id="carrera" name="carrera" disabled
                               value="<?php echo $fila['Carrera'] ?>">
                    </div>
                </div>
            </div>
            <div class="container col">

                <div class="row ml-0">
                    <div class="col-sm-6">
                        <label for="bloque" class="form-label">Bloque:</label>
                        <select class="form-select" name="bloque">
                            <?php 
                            include_once '../../BL/BloqueAsignBL.php';

                            $bloqueBL = new BloqueAsignBL();
                            $tbBloque = $bloqueBL->EnumerarPorCarrera($idCarrera);

                            foreach ($tbBloque as $bloque) {
                                if ($bloque['IDBloque'] == $fila['IDBloque']) {?>
                            <option value="<?php echo $bloque['IDBloque'] ?>" selected><?php echo $bloque['Bloque'] ?> - Actual</option>
                            <?php } else { ?>
                            <option value="<?php echo $bloque['IDBloque'] ?>"><?php echo $bloque['Bloque'] ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="curso" class="form-label">Curso:</label>
                        <select class="form-select" name="curso">
                            <?php 
                            include_once '../../BL/CursoBL.php';

                            $cursoBL = new CursoBL();
                            $tbCurso = $cursoBL->EnumerarPorCarrera($idCarrera);

                            foreach ($tbCurso as $elem) {
                                if ($elem['IDCurso'] == $fila['IDCurso']) {?>
                            <option value="<?php echo $elem['IDCurso']?>" selected><?php echo $elem['Nombre']?> - Actual</option> ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $elem['IDCurso']?>"><?php echo $elem['Nombre']?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
                <div class="row ml-0">
                    <div class="col-sm-6">
                        <label for="docente" class="form-label">Docente:</label>
                        <select class="form-select" name="docente">
                            <?php 
                            include_once '../../BL/DocenteBL.php';

                            $docenteBL = new DocenteBL();
                            $tbDocente = $docenteBL->Enumerar();

                            foreach ($tbDocente as $elem) {
                                if ($elem['IDDocente'] == $fila['IDDocente']) {?>
                            <option value="<?php echo $elem['IDDocente']?>" selected><?php echo $elem['Docente']?> - Actual</option> ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $elem['IDDocente']?>"><?php echo $elem['Docente']?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="clase" class="form-label">Clase:</label>
                        <input type="text" class="form-control" id="clase" name="clase"
                               value="<?php echo $fila['Clase']?>">
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <div class="my-1 mx-1 text-end">
                    <button type="submit" class="btn btn-primary" name="enviar"
                        <?php if (count($tbBloque) == 0) { echo "disabled"; } ?>>
                        <span class="mr-2">
                            <i class="fa-solid fa-circle-check"></i>
                        </span>
                        Guardar
                    </button>
                </div>
            </div>
        <?php } ?>
        </form>
    </div>
</div>



