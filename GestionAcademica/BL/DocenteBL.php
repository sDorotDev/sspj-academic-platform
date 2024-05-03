<?php

/**
 * Description of DocenteBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/DocenteDAO.php';

class DocenteBL {
    
    function Listar() {
        $dao = new DocenteDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
   
    function Enumerar() {
        $dao = new DocenteDAO();
        try {
            return $dao->Enumerar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new DocenteDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($docente) {
        $dao = new DocenteDAO();
        try {
            $dao->Crear($docente);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($docente) {
        $dao = new DocenteDAO();
        try {
            $dao->Actualizar($docente);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new DocenteDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new DocenteDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
