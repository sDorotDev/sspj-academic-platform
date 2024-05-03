<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/AsignaturaBL.php';

$asignatura = array(
    "bloque" => $_POST['bloque'],
    "curso" => $_POST['curso'],
    "docente" => $_POST['docente'],
    "clase" => $_POST['clase'],
    "id" => $_POST['id']
);

try {
    $bl = new AsignaturaBL();
    $bl->Actualizar($asignatura);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
