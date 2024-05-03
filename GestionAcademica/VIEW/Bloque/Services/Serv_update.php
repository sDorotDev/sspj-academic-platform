<?php

include $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/BL/BloqueAsignBL.php';

$bloque = array(
    "carrera" => $_POST["carrera"],
    "seccion" => $_POST["seccion"],
    "ciclo" => $_POST["ciclo"],
    "bloque" => $_POST["bloque"],
    "turno" => $_POST["turno"],
    "concluido" => $_POST["concluido"],
    "inicio" => $_POST["inicio"],
    "cierre" => $_POST["cierre"],
    "id" => $_POST["id"]
);

try {
    $bl = new BloqueAsignBL();
    $bl->Actualizar($bloque);
    header('Location: ../Panel.php?case=list');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

