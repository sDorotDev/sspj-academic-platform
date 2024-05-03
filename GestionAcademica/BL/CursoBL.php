<?php

/**
 * Description of CursoBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/CursoDAO.php';

class CursoBL {
    
    function Listar() {
        $dao = new CursoDAO();
        try {
            return $dao->Listar();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Enumerar() {
        $dao = new CursoDAO();
        try {
            return $dao->Enumerar();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarPorCategoria($id) {
        $dao = new CursoDAO();
        try {
            return $dao->EnumerarPorCategoria($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarPorCarrera($id) {
        $dao = new CursoDAO();
        try {
            return $dao->EnumerarPorCarrera($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
 
    function BuscarId($id) {
        $dao = new CursoDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Crear($curso) {
        $dao = new CursoDAO();
        try {
            $dao->Crear($curso);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($curso) {
        $dao = new CursoDAO();
        try {
            $dao->Actualizar($curso);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new CursoDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new CursoDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
