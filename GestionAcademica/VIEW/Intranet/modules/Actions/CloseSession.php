<?php

try {
    $_SESSION = array();
    session_destroy();
    header('Location: http://localhost:8080/GestionAcademica/');
} catch (Exception $ex) {
    echo $exc->getMessage();
}

