<?php

/**
 * Description of BloqueAsignBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/BloqueAsignDAO.php';

class BloqueAsignBL {
    
    function Listar() {
        $dao = new BloqueAsignDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Enumerar() {
        $dao = new BloqueAsignDAO();
        try {
            return $dao->Enumerar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarPorCarrera($id) {
        $dao = new BloqueAsignDAO();
        try {
            return $dao->EnumerarPorCarrera($id);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new BloqueAsignDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($bloque) {
        $dao = new BloqueAsignDAO();
        try {
            return $dao->Crear($bloque);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($bloque) {
        $dao = new BloqueAsignDAO();
        try {
            $dao->Actualizar($bloque);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new BloqueAsignDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new BloqueAsignDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
