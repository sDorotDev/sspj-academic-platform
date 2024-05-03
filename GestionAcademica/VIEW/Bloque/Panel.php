<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/ENTITY/Usuario.php';

// Parámetros
$case = $_GET['case'];
session_start();

// Contenido genérico
$navbarContent = '../Intranet/modules/menutop.php';
$sidebarContent = '../Intranet/modules/menuaside.php';

// Filtro
switch ($case) {
    case 'list':
        $pageContent = "./Modules/lstBloque.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'create':
        $pageContent = "./Modules/newBloque.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'update':
        $id = $_GET['id'];
        $pageContent = "./Modules/updBloque.php";
        include "../Intranet/Dashboard.php";
        break;
    default:
        echo "Caso no válido";
        break;
}

