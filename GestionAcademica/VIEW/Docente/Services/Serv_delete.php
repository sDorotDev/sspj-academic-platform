<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/DocenteBL.php';

$id = $_GET['id'];

try {
    $bl = new DocenteBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

