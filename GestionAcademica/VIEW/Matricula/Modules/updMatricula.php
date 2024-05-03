<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <?php
        include_once '../../BL/MatriculaBL.php';
        $id = $_GET['id'];
        $matriculabl = new matriculaBL();
        $tbData = $matriculabl->BuscarId($id);

        foreach ($tbData as $fila) {
            $idCarrera = $fila['IDCarrera'];?>
        <form action="./Services/Serv_update.php" method="POST">
        <div class="card-header fs-2 bg-navy">
            <span class="badge badge-primary mr-1">
                <i class="fa-solid fa-i"></i>
                <i class="fa-solid fa-4"></i>
            </span>
            · Editar Matricula
        </div>
        <div class="card-body row" style="gap: 20px">
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['IDMatricula'] ?>">
            <div class="container col">
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
                        <label for="alumno" class="form-label">Alumno:</label>
                        <select class="form-select" name="alumno">
                            <?php
                            include_once '../../BL/AlumnoBL.php';
                            $alumnoBL = new AlumnoBL();
                            $tbAlumno = $alumnoBL->Enumerar();

                            foreach ($tbAlumno as $alumno) {
                            if ($alumno['IDAlumno'] == $fila['IDAlumno']) {?>
                            <option value="<?php echo $alumno['IDAlumno'] ?>" selected><?php echo $alumno['Alumno'] ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $alumno['IDAlumno']?>"><?php echo $alumno['Alumno'] ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="bloque" class="form-label">Bloque:</label>
                        <select class="form-select" name="bloque">
                            <?php
                            include_once '../../BL/BloqueAsignBL.php';
                            $bloqueBL = new BloqueAsignBL();
                            $tbBloque = $bloqueBL->EnumerarPorCarrera($idCarrera);

                            foreach($tbBloque as $elem) {
                            if ($elem['IDBloque'] == $fila['IDBloque']) {?>
                            <option value="<?php echo $elem['IDBloque'] ?>" selected><?php echo $elem['Bloque'] ?> - Actual</option>
                            <?php } else { ?>
                            <option value="<?php echo $elem['IDBloque'] ?>"><?php echo $elem['Bloque'] ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <div class="my-1 mx-1 text-end">
                    <button type="submit" class="btn btn-primary" name="enviar"
                        <span class="mr-2">
                            <i class="fa-solid fa-circle-check"></i>
                        </span>
                        Guardar
                    </button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>