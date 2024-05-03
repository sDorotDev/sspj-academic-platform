<?php

/**
 * Description of EstudioCategBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/EstudioCatDAO.php';

class EstudioCategBL {
    
    function Listar() {
        $dao = new EstudioCatDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Enumerar() {
        $dao = new EstudioCatDAO();
        try {
            return $dao->Enumerar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new EstudioCatDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($categoria) {
        $dao = new EstudioCatDAO();
        try {
            return $dao->Crear($categoria);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($categoria) {
        $dao = new EstudioCatDAO();
        try {
            $dao->Actualizar($categoria);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new EstudioCatDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new EstudioCatDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
