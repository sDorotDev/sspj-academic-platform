<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/EstudioCategBL.php';

$categoria = array(
    "nombre" => $_POST["nombre"]
);

try {
    $bl = new EstudioCategBL();
    $bl->Crear($categoria);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
