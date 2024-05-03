<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/MatriculaBL.php';

$matricula = array(
    "IDAlumno" => $_POST["alumno"],
    "IDBloque" => $_POST["bloque"]
   
);

try {
    $bl = new MatriculaBL();
    $bl->Crear($matricula);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
