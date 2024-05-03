<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/UsuarioBL.php';

$usuario = array(
    "username" => $_POST["username"],
    "password" => $_POST["password"],
    "correo" => $_POST["correo"],
    "rol" => $_POST["rol"],
    "id" => $_POST["id"]
);

try {
    $bl = new UsuarioBL();
    $bl->Actualizar($usuario);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
