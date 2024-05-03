<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/AsignaturaBL.php';

$id = $_GET['id'];

try {
    $bl = new AsignaturaBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}