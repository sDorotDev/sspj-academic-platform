<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/ENTITY/Usuario.php';

session_start();

$user = $_SESSION['account'];
$access = $user->getIDRol();


switch ($access) {
    case 1:
        include "./Portal.php";
        break;
    case 2:
        include "./Portal.php";
        break;
    case 3:
        $navbarContent = './modules/menutop.php';
        $sidebarContent = './modules/menuaside.php';
        $pageContent = "./modules/contentwrapper.php";
        include "./Dashboard.php";
        break;
    default:
        header('Location: ../../index.php');
        break;
}
