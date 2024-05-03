<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="VIEW/Intranet/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="VIEW/Intranet/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="VIEW/Intranet/dist/css/adminlte.min.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Gestión Academica</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia Sesión</p>
            <form id="quickForm" action="./Account.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="user">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                </div> 
            </form>       
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="VIEW/Intranet/plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Bootstrap 4 -->
<script src="VIEW/Intranet/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="VIEW/Intranet/dist/js/adminlte.min.js"></script>
</body>
</html>

