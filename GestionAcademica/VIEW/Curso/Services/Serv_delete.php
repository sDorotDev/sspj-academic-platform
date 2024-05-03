<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/CursoBL.php';

$id = $_GET["id"];

try {
    $bl = new CursoBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
