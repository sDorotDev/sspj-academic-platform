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
        $pageContent = "./Modules/lstDocente.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'create':
        $pageContent = "./Modules/newDocente.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'update':
        $id = $_GET['id'];
        $pageContent = "./Modules/updDocente.php";
        include "../Intranet/Dashboard.php";
        break;
    default:
        $pageContent = '../Intranet/modules/errorPage.php';
        include "../Intranet/Dashboard.php";
        break;
}


