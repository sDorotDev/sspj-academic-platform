<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/MatriculaBL.php';

$id = $_GET["id"];

try {
   $bl = new MatriculaBL();
    $bl->Eliminar($id);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
