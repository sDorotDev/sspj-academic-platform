<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/EstudioCategBL.php';

$id = $_GET['id'];

try {
    $bl = new EstudioCategBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}