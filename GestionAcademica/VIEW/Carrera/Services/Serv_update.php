<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/CarreraBL.php';

$carrera = array(
    "nombre" => $_POST["nombre"],
    "estudiocat" => $_POST["estudiocat"],
    "id" => $_POST["id"]
);

try {
    $bl = new CarreraBL();
    $bl->Actualizar($carrera);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}