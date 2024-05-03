<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/CarreraBL.php';

$id = $_GET['id'];

try {
    $bl = new CarreraBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}