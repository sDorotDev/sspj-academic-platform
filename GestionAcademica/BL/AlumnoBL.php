<?php

/**
 * Description of AlumnoBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/AlumnoDAO.php';

class AlumnoBL {
   
    function Listar() {
        $dao = new AlumnoDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
   
    function Enumerar() {
        $dao = new AlumnoDAO();
        try {
            return $dao->Enumerar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new AlumnoDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($alumno) {
        $dao = new AlumnoDAO();
        try {
            $dao->Crear($alumno);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($alumno) {
        $dao = new AlumnoDAO();
        try {
            $dao->Actualizar($alumno);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new AlumnoDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new AlumnoDAO();
        try {
            return $dao->Metricas();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
