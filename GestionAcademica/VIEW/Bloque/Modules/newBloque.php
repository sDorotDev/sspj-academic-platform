<div class="container col-sm-12 mt-2">
    <div class="card card-default">
        <form action="./Services/Serv_insert.php" method="POST">
            <div class="card-header fs-2 bg-navy">
                <span class="badge badge-primary mr-1">
                    <i class="fa-solid fa-i"></i>
                    <i class="fa-solid fa-4"></i>
                </span>
                · Nuevo Bloque 
            </div>
            <div class="card-body row" style="gap: 20px">
                <div class="container col">
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-6">
                            <label for="carrera" class="form-label">Carrera:</label>
                            <select class="form-select" name="carrera">
                                <?php
                                include_once '../../BL/CarreraBL.php';
                                $carreraBL = new CarreraBL();
                                $tbCateg = $carreraBL->Enumerar();

                                foreach($tbCateg as $cat) {?>
                                <option value="<?php echo $cat['IDCarrera']?>"><?php echo $cat['Nombre']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="seccion" class="form-label">Sección:</label>
                            <input type="text" class="form-control" id="seccion" name="seccion"
                                   placeholder="Ciclo - Bloque - Modulo">
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-6">
                            <label for="ciclo" class="form-label">Ciclo:</label>
                            <input type="text" class="form-control" id="ciclo" name="ciclo">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="bloque" class="form-label">Bloque:</label>
                            <input type="text" class="form-control" id="bloque" name="bloque">
                        </div>
                    </div>
                </div>
                <div class="container col">
                    <div class="row ml-0">
                        <div class="col-sm-12">
                            <label for="turno" class="form-label">Turno:</label>
                            <select class="mb-3 form-select" name="turno">
                                <option value="Mañana">Mañana</option>
                                <option value="Noche">Noche</option>
                            </select>
                        </div>
                    </div>
                    <div class="row ml-0">
                        <div class="mb-3 col-sm-6">
                            <label for="inicio" class="form-label">Fecha de Inicio:</label>
                            <input type="date" class="form-control" id="inicio" name="inicio">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="cierre" class="form-label">Fecha de Cierre:</label>
                            <input type="date" class="form-control" id="cierre" name="cierre">
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
    </div>
</div>
