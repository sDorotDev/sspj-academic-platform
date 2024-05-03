<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/EstudioCategBL.php';

$categoria = array(
    "nombre" => $_POST["nombre"],
    "id" => $_POST["id"]
);

try {
    $bl = new EstudioCategBL();
    $bl->Actualizar($categoria);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
