<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <?php
        include_once '../../BL/UsuarioBL.php';
        $id = $_GET['id'];
        $usuarioBLBL = new UsuarioBL();
        $tbData = $usuarioBLBL->BuscarId($id);
        foreach ($tbData as $fila) {
        ?>
        <form action="./Services/Serv_update.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['IDUsuario'] ?>">
            <div class="card-header fs-2 bg-navy">
                <span class="badge badge-primary mr-1">
                    <i class="fa-solid fa-i"></i>
                    <i class="fa-solid fa-4"></i>
                </span>
                · Editar Usuario
            </div>
            <div class="card-body row" style="gap: 20px">
                <div class="container col">
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-12">
                            <label for="username" class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="nombre" name="username"
                                value="<?php echo $fila['Username'] ?>">
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-12">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="nombre" name="password"
                                   value="<?php echo $fila['Password'] ?>">
                        </div>
                    </div>
                </div>
                <div class="container col">
                    <div class="row ml-0">
                        <div class="col-sm-12">
                            <label for="rol" class="form-label">Categoria:</label>
                            <select class="mb-3  form-select" name="rol">
                                <?php
                                include_once '../../BL/RolBL.php';
                                $rolBL = new RolBL();
                                $tbCateg = $rolBL->Enumerar();

                                foreach($tbCateg as $cat) {
                                    if ($cat['IDRol'] == $fila['IDRol']) {?>
                                <option value="<?php echo $cat['IDRol']?>" selected><?php echo $cat['Nombre']?></option>
                                <?php } else { ?>
                                <option value="<?php echo $cat['IDRol']?>"><?php echo $cat['Nombre']?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-12">
                            <label for="correo" class="form-label">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                   value="<?php echo $fila['Correo'] ?>">
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
