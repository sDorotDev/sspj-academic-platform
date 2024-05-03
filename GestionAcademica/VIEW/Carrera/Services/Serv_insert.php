<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/CarreraBL.php';

$carrera = array(
    "nombre" => $_POST["nombre"],
    "estudiocat" => $_POST["estudiocat"]
);

try {
    $bl = new CarreraBL();
    $bl->Crear($carrera);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

