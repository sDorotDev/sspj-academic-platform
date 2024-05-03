<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-1">IG4 · Alumno</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="./Panel.php?case=create" 
                    class="btn btn-primary m-1">
                    <i class="fa-solid fa-plus text-white"></i>
                </a>
            </ol>
        </div>
      </div>
    </div>
</div>  

<div class="container">
    <div class="container row">
        <table id="tablaAlumnos" class="table table-hover col-sm-12">
            <thead class="thead-dark rounded">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Ciclo</th>
                    <th scope="col">Bloque</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php
                include_once '../../BL/AlumnoBL.php';
                $alumnoBL = new AlumnoBL();
                $tbData = $alumnoBL->Listar();

                foreach($tbData as $fila) {
                    ?>
                <tr>
                    <th scope="row"><?php echo $fila['IDAlumno'];?></th>
                    <td><?php echo $fila['Nombres'] . ' ' . $fila['AP_Paterno'] . ' ' . $fila['AP_Materno']?></td>
                    <td><?php echo $fila['Direccion']?></td>
                    <td><?php echo $fila['Email']?></td>
                    <td><?php echo $fila['Telefono']?></td>
                    <td><?php echo $fila['DocumentoIdent']?></td>
                    <td><?php echo $fila['Sexo']?></td>
                    <td><?php echo $fila['CicloActual']?></td>
                    <td><?php echo $fila['BloqueActual']?></td>
                    <td>
                        <a id="editar" class="btn btn-info"
                           href="./Panel.php?case=update&id=<?php echo $fila['IDAlumno']; ?>">
                            <i class="fa-solid fa-pencil text-white"></i>
                        </a>
                        <a id="eliminar" class="btn btn-danger"
                           href="./Services/Serv_delete.php?id=<?php echo $fila['IDAlumno']; ?>">
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
</div>
