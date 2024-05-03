<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/AlumnoBL.php';

$id = $_GET['id'];

try {
    $bl = new AlumnoBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
