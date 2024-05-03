<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <?php
        include_once '../../BL/CarreraBL.php';
        $id = $_GET['id'];
        $carreraBL = new CarreraBL();
        $tbData = $carreraBL->BuscarId($id);
        foreach ($tbData as $fila) {
        ?>
        <form action="./Services/Serv_update.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['IDCarrera'] ?>">
            <div class="card-header fs-2 bg-navy">
                <span class="badge badge-primary mr-1">
                    <i class="fa-solid fa-i"></i>
                    <i class="fa-solid fa-4"></i>
                </span>
                · Editar Carrera
            </div>
            <div class="card-body row" style="gap: 20px">
                <div class="container col">
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-12">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   value="<?php echo $fila['Nombre'] ?>">
                        </div>
                    </div>
                </div>
                <div class="container col">
                    <div class="row ml-0">
                        <div class="col-sm-12">
                            <label for="estudiocat" class="form-label">Categoria:</label>
                            <select class="form-select" name="estudiocat">
                                <?php
                                include_once '../../BL/EstudioCategBL.php';
                                $categoriaBL = new EstudioCategBL();
                                $tbCateg = $categoriaBL->Enumerar();

                                foreach($tbCateg as $cat) {
                                    if ($cat['IDEstudCat'] == $fila['IDEstudCat']) {?>
                                <option value="<?php echo $cat['IDEstudCat']?>" selected><?php echo $cat['Nombre']?></option>
                                <?php } else { ?>
                                <option value="<?php echo $cat['IDEstudCat']?>"><?php echo $cat['Nombre']?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="my-1 mx-1 text-end">
                    <button type="submit" class="btn btn-primary" name="enviar">
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