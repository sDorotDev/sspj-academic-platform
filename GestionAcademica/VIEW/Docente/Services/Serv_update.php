<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/DocenteBL.php';

$docente = array(
    "usuario" => $_POST["usuario"],
    "nombre" => $_POST["nombre"],
    "apaterno" => $_POST["apaterno"],
    "amaterno" => $_POST["amaterno"],
    "direccion" => $_POST["direccion"],
    "email" => $_POST["email"],
    "telefono" => $_POST["telefono"],
    "documento" => $_POST["documento"],
    "sexo" => $_POST["sexo"],
    "id" => $_POST["id"]
);

try {
    $bl = new DocenteBL();
    $bl->Actualizar($docente);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

