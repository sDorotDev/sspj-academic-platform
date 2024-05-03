<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <?php
        include_once '../../BL/EstudioCategBL.php';
        $id = $_GET['id'];
        $categoria = new EstudioCategBL();
        $tbData = $categoria->BuscarId($id);
        foreach ($tbData as $fila) {
        ?>
        <form action="./Services/Serv_update.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['IDEstudCat'] ?>">
            <div class="card-header fs-2 bg-navy">
                <span class="badge badge-primary mr-1">
                    <i class="fa-solid fa-i"></i>
                    <i class="fa-solid fa-4"></i>
                </span>
                · Editar Categoria de Estudio
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
                <div class="container col"></div>
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