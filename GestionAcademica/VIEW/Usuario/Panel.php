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
        $pageContent = "./Modules/lstUsuario.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'create':
        $pageContent = "./Modules/newUsuario.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'update':
        $id = $_GET['id'];
        $pageContent = "./Modules/updUsuario.php";
        include "../Intranet/Dashboard.php";
        break;
    case 'perfil':
        $pageContent = "./Modules/perfUsuario.php";
        include "../Intranet/Dashboard.php";
        break;
    default:
        $pageContent = '../Intranet/modules/errorPage.php';
        include "../Intranet/Dashboard.php";
        break;
}



