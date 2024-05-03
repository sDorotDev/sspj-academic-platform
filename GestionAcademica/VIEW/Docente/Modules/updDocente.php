<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <?php
        include_once '../../BL/DocenteBL.php';
        $id = $_GET['id'];
        $docenteBL = new DocenteBL();
        $tbData = $docenteBL->BuscarId($id);
        foreach ($tbData as $fila) {
        ?>
        <form action="./Services/Serv_update.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="<?php echo $fila['IDDocente'] ?>">
            <div class="card-header fs-2 bg-navy">
                <span class="badge badge-primary mr-1">
                    <i class="fa-solid fa-i"></i>
                    <i class="fa-solid fa-4"></i>
                </span>
                · Editar Docente
            </div>
            <div class="card-body row" style="gap: 20px">
                <div class="container col">
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-12">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   value="<?php echo $fila['Nombres'] ?>">
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-6">
                            <label for="apaterno" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apaterno" name="apaterno"
                                   value="<?php echo $fila['AP_Paterno'] ?>">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="amaterno" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" id="amaterno" name="amaterno"
                                   value="<?php echo $fila['AP_Materno'] ?>">
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-6">
                            <label for="direccion" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                   value="<?php echo $fila['Direccion'] ?>">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?php echo $fila['Email'] ?>">
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-6">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                   value="<?php echo $fila['Telefono'] ?>">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="documento" class="form-label">Documento:</label>
                            <input type="text" class="form-control" id="documento" name="documento"
                                   value="<?php echo $fila['DocumentoIdent'] ?>">
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="form-check col-sm-2" style="margin-left: 12px">
                            <input class="form-check-input" type="radio" name="sexo" id="opcion1" value="Femenino" 
                                <?php if ($fila['Sexo']=='Femenino') { echo "checked"; } ?>>
                            <label class="form-check-label" for="opcion1">Femenino</label>
                        </div>
                        <div class="form-check col-sm-2" style="margin-left: 12px">
                            <input class="form-check-input" type="radio" name="sexo" id="opcion2" value="Masculino" 
                                <?php if ($fila['Sexo']=='Masculino') { echo "checked"; } ?>>
                            <label class="form-check-label" for="opcion2">Masculino</label>
                        </div>
                    </div>
                </div>
                <div class="container col">
                    <div class="row ml-0">
                        <div class="col-sm-12">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <select class="form-select" name="usuario">
                                <option value="<?php echo $fila['IDCuenta']?>"><?php echo $fila['Username']?> - Actual</option>
                                <?php
                                include_once '../../BL/UsuarioBL.php';
                                $usuarioBL = new UsuarioBL();
                                $tbCateg = $usuarioBL->EnumerarSinDocente();

                                foreach($tbCateg as $cat) {?>
                                <option value="<?php echo $cat['IDUsuario']?>"><?php echo $cat['Username']?></option>
                                <?php } ?>
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

