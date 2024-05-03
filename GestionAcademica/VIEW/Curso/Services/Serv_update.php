<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/CursoBL.php';

$curso = array(
    "nombre" => $_POST["nombre"],
    "creditos" => $_POST["creditos"],
    "estudiocat" => $_POST["estudiocat"],
    "id" => $_POST["id"]
);

try {
    $bl = new CursoBL();
    $bl->Actualizar($curso);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

