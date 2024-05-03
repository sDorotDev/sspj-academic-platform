<aside class="main-sidebar sidebar-dark-primary side-bar-custom elevation-4" style="background-color: #0C1E33">
    <!-- Brand Logo -->
    <a href="../Intranet/Sections.php" class="brand-link">
        <span class="brand-text font-weight-light px-2"><i class="fa-solid fa-i nav-icon fas"></i><i class="fa-solid fa-4 pr-2"></i> Institute G4</span>
    </a>
    <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/ENTITY/Usuario.php';
        
        $user = $_SESSION['account'];
        $username = $user->getUsername();
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="../Usuario/Panel.php?case=perfil" class="d-block"><i class="fa-solid fa-user text-white pr-2 nav-icon fas"></i> <?php echo $username ?> </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">ADMINISTRACIÓN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Mallas Curriculares<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../Carrera/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Carrera</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../Curso/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Cursos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../EstudioCateg/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Categoria Estudio</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Perfiles<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../Usuario/Panel.php?case=list" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Usuarios<span class="right badge badge-danger">New</span></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../Docente/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Docentes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../Alumno/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Alumnos</p>
                        </a>
                    </li>  
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Asignaciones<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../Bloque/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Bloques</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../Asignatura/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Asignaturas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../Matricula/Panel.php?case=list" class="nav-link">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Matriculas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">SESIÓN</li>
            <li class="nav-item">
                <a href="/GestionAcademica/VIEW/Intranet/modules/Actions/CloseSession.php" class="nav-link">
                <i class="fa-solid fa-door-open nav-icon"></i>
                <p>Cerrar Sesión</p>
                </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>