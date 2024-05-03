<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <div class="card-header fs-2 bg-navy">
            <span class="badge badge-primary mr-1">
                <i class="fa-solid fa-i"></i>
                <i class="fa-solid fa-4"></i>
            </span>
            · Nueva Matricula
        </div>
        <div class="card-body row" style="gap: 20px">
            <div class="container col">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>?case=create" method="POST">
                <div class="row ml-0">
                    <div class="mb-3 col-sm-12">
                        <label for="carrera" class="form-label">Carrera:</label>
                        <select class="form-select" name="carrera" onchange="this.form.submit()">
                            <?php
                            include_once '../../BL/CarreraBL.php';

                            $carreraBL = new CarreraBL();
                            $tbCateg = $carreraBL->Enumerar();

                            foreach($tbCateg as $cat) {?>
                            <option value="<?php echo $cat['IDCarrera']?>" 
                                <?php if(isset($_POST['carrera']) && $_POST['carrera'] == $cat['IDCarrera']) echo 'selected'; ?>>
                                <?php echo $cat['Nombre']?>
                            </option> <?php } ?>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <?php
            if(isset($_POST['carrera'])) {
                $idCarrera = $_POST['carrera'];
            ?>
            <div class="container col">
                <form action="./Services/Serv_insert.php" method="POST">
                <div class="row ml-0">
                    <div class="col-sm-6">
                        <label for="alumno" class="form-label">Alumno:</label>
                        <select class="form-select" name="alumno">
                            <?php
                            include_once '../../BL/AlumnoBL.php';
                            $alumnoBL = new AlumnoBL();
                            $tbAlumno = $alumnoBL->Enumerar();

                            foreach($tbAlumno as $alumno) {?>
                            <option value="<?php echo $alumno['IDAlumno']?>"><?php echo $alumno['Alumno'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="bloque" class="form-label">Bloque:</label>
                        <select class="form-select" name="bloque">
                            <?php 
                            include_once '../../BL/BloqueAsignBL.php';

                            $bloqueBL = new BloqueAsignBL();
                            $tbBloque = $bloqueBL->EnumerarPorCarrera($idCarrera);

                            foreach($tbBloque as $elem) {?>
                            <option value="<?php echo $elem['IDBloque']?>"><?php echo $elem['Bloque']?></option>
                            <?php } ?>
                        </select>
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
                </form>
            </div>
        <?php } ?>
    </div>
</div>


