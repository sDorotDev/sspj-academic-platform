<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/AsignaturaBL.php';

$asignatura = array(
    "bloque" => $_POST['bloque'],
    "curso" => $_POST['curso'],
    "docente" => $_POST['docente'],
    "clase" => $_POST['clase']
);

try {
    $bl = new AsignaturaBL();
    $bl->Crear($asignatura);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
