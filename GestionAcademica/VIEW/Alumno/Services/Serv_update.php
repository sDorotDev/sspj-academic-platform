<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/AlumnoBL.php';

$alumno = array(
    "usuario" => $_POST["usuario"],
    "nombre" => $_POST["nombre"],
    "apaterno" => $_POST["apaterno"],
    "amaterno" => $_POST["amaterno"],
    "direccion" => $_POST["direccion"],
    "email" => $_POST["email"],
    "telefono" => $_POST["telefono"],
    "documento" => $_POST["documento"],
    "sexo" => $_POST["sexo"],
    "ciclo" => $_POST["ciclo"],
    "bloque" => $_POST["bloque"],
    "id" => $_POST["id"]
);

try {
    $bl = new AlumnoBL();
    $bl->Actualizar($alumno);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

