<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/UsuarioBL.php';

$id = $_GET['id'];

try {
    $bl = new UsuarioBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}