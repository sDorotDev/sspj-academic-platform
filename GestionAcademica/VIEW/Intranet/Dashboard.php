<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Panel - InstituoG4</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- DataTables -->
  <link rel="stylesheet" href="../Intranet/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../Intranet/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../Intranet/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../Intranet/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Intranet/dist/css/adminlte.css">
  <!-- Theme Scroll -->
  <link rel="stylesheet" href="../Intranet/plugins/custom/styleScroll.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include $navbarContent; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include $sidebarContent; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid py-3 pl-3">
                <?php include $pageContent; ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="https://adminlte.io">Instituto G4</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
  $(document).ready(function () {
    $('#tableData').DataTable({
      "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
        "lengthMenu": "Mostrar _MENU_ entradas",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron registros coincidentes",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "buttons": {
          "copy": "Copiar",
          "csv": "CSV",
          "excel": "Excel",
          "pdf": "PDF",
          "print": "Imprimir"
        }
      },
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": true,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#func_buttons');
  });
</script>

<!-- jQuery -->
<script src="../Intranet/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../Intranet/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../Intranet/dist/js/adminlte.js"></script>
<script src="../Intranet/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../Intranet/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../Intranet/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../Intranet/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../Intranet/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../Intranet/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../Intranet/plugins/jszip/jszip.min.js"></script>
<script src="../Intranet/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../Intranet/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../Intranet/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../Intranet/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../Intranet/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../Intranet/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../Intranet/dist/js/pages/dashboard3.js"></script>
</body>
</html>


