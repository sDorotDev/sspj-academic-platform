<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/BloqueAsignBL.php';

$id = $_GET['id'];

try {
    $bl = new BloqueAsignBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

