<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/UsuarioBL.php';
include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/ENTITY/Usuario.php';

$usuario = array(
    "username" => $_POST["username"],
    "password" => $_POST["password"],
    "correo" => $_POST["username"],
);

session_start();

try {
    $bl = new UsuarioBL();
    $data = $bl->Verificar($usuario);
    if (count($data)==0) {
        header('Location: http://localhost:8080/GestionAcademica/');
    } else {
        $user = new Usuario();
        $user->setIDUsuario($data[0]['IDUsuario']);
        $user->setUsername($data[0]['Username']);
        $user->setCorreo($data[0]['Correo']);
        $user->setIDRol($data[0]['IDRol']);
        
        $_SESSION['account'] = $user;
        
        header('Location: ./VIEW/Intranet/Sections.php');
    }
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

