<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h2>
                <span class="badge badge-primary mr-3">
                    <i class="fa-solid fa-i"></i>
                    <i class="fa-solid fa-4"></i>
                </span>
                <span class="badge badge-info mr-1">
                    <i class="fa-solid fa-briefcase"></i>
                </span>
                · Carreras
            </h2>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="./Panel.php?case=create" 
                    class="btn btn-primary m-1">
                    <span class="mr-2">
                        <i class="fa-solid fa-plus text-white"></i>
                    </span>
                    Nueva Entrada
                </a>
            </ol>
        </div>
      </div>
    </div>
</div>  

<?php
include_once '../../BL/CarreraBL.php';
$carreraBL = new CarreraBL();
?>

<div class="container-fluid row">
    <div class="container col-sm-12 ">
        <div class="card card-default">
            <div class="card-body row col" style="gap: 15px;">
                <?php
                $tbMetrics = $carreraBL->Metricas();

                foreach($tbMetrics as $met) {
                    ?>
                <div class="info-box bg-info mb-0 col">
                    <span class="info-box-icon"><i class="fa-solid fa-newspaper"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Registros Totales</span>
                        <span class="info-box-number"><?php echo $met['Reg_Total']?></span>
                    </div>
                </div>
                <div class="info-box bg-success mb-0 col">
                    <span class="info-box-icon"><i class="fa-solid fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Registros Activos</span>
                        <span class="info-box-number"><?php echo $met['Reg_Activo']?></span>
                    </div>
                </div>
                <div class="info-box bg-danger mb-0 col">
                    <span class="info-box-icon"><i class="fa-solid fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Registros Inactivos</span>
                        <span class="info-box-number"><?php echo $met['Reg_Inactivo']?></span>
                    </div>
                </div>
                <div class="info-box bg-navy mb-0 col">
                    <span class="info-box-icon"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Última modificación</span>
                        <span class="info-box-number"><?php echo $met['Reg_Ult_Modf']?></span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid row">
    <div class="container col-sm-12">
        <div class="card card-default">
            <div class="card-body">
                <table id="tableData" class="table table-hover">
                    <thead class="thead-dark rounded">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Registro</th>
                            <th scope="col">Actualización</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $tbData = $carreraBL->Listar();

                        foreach($tbData as $fila) {
                            ?>
                        <tr>
                            <th scope="row"><?php echo $fila['IDCarrera'];?></th>
                            <td><?php echo $fila['Nombre']?></td>
                            <td><?php echo $fila['IDEstudCat']?></td>
                            <td><?php echo $fila['dt_Creacion']?></td>
                            <td><?php echo $fila['dt_Act']?></td>
                            <td>
                                <a id="editar" class="btn btn-info"
                                   href="./Panel.php?case=update&id=<?php echo $fila['IDCarrera']; ?>">
                                    <i class="fa-solid fa-pencil text-white"></i>
                                </a>
                                <a id="eliminar" class="btn btn-danger"
                                   href="./Services/Serv_delete.php?id=<?php echo $fila['IDCarrera']; ?>">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                        <?php   
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer row px-4 py-4">
                <div class="col-sm-12"id="func_buttons"></div>
            </div>
        </div>
    </div>
</div>

