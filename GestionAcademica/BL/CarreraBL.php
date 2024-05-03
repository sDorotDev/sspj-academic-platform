<?php

/**
 * Description of CarreraBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/CarreraDAO.php';

class CarreraBL {
    
    function Listar() {
        $dao = new CarreraDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Enumerar() {
        $dao = new CarreraDAO();
        try {
            return $dao->Enumerar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new CarreraDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($carrera) {
        $dao = new CarreraDAO();
        try {
            return $dao->Crear($carrera);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($carrera) {
        $dao = new CarreraDAO();
        try {
            $dao->Actualizar($carrera);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new CarreraDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new CarreraDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
