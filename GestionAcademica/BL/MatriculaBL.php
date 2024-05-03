<?php

/**
 * Description of MatriculaBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/MatriculaDAO.php';

class MatriculaBL {
    
    function Listar() {
        $dao = new MatriculaDAO();
        try {
            return $dao->Listar();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarInscritos($bloque) {
        $dao = new MatriculaDAO();
        try {
            return $dao->EnumerarInscritos($bloque);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
 
    function BuscarId($id) {
        $dao = new MatriculaDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Crear($matricula) {
        $dao = new MatriculaDAO();
        try {
            $dao->Crear($matricula);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    function Actualizar($matricula) {
        $dao = new MatriculaDAO();
        try {
            $dao->Actualizar($matricula);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new MatriculaDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new MatriculaDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
}
