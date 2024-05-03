<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <div class="card-header fs-2 bg-navy">
            <span class="badge badge-primary mr-1">
                <i class="fa-solid fa-i"></i>
                <i class="fa-solid fa-4"></i>
            </span>
            · Agregar Asignatura
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
                    <div class="col-sm-6">
                        <label for="curso" class="form-label">Curso:</label>
                        <select class="form-select" name="curso">
                            <?php 
                            include_once '../../BL/CursoBL.php';

                            $cursoBL = new CursoBL();
                            $tbCurso = $cursoBL->EnumerarPorCarrera($idCarrera);

                            foreach($tbCurso as $elem) {?>
                            <option value="<?php echo $elem['IDCurso']?>"><?php echo $elem['Nombre']?></option>
                            <?php } ?>
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

                            foreach($tbDocente as $elem) {?>
                            <option value="<?php echo $elem['IDDocente']?>"><?php echo $elem['Docente']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="clase" class="form-label">Clase:</label>
                        <input type="text" class="form-control" id="clase" name="clase">
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

