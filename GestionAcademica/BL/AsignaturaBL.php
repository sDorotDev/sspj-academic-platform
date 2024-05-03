<?php

/**
 * Description of AsignaturaBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/AsignaturaDAO.php';

class AsignaturaBL {
    
    function Listar() {
        $dao = new AsignaturaDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarPorBloque($idbloque) {
        $dao = new AsignaturaDAO();
        try {
            return $dao->EnumerarPorBloque($idbloque);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarPorAlumnoAct($idalumno) {
        $dao = new AsignaturaDAO();
        try {
            return $dao->EnumerarPorAlumnoAct($idalumno);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarPorAlumnoCon($idalumno) {
        $dao = new AsignaturaDAO();
        try {
            return $dao->EnumerarPorAlumnoConc($idalumno);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new AsignaturaDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($asignatura) {
        $dao = new AsignaturaDAO();
        try {
            return $dao->Crear($asignatura);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($asignatura) {
        $dao = new AsignaturaDAO();
        try {
            $dao->Actualizar($asignatura);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new AsignaturaDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new AsignaturaDAO();
        try {
            return $dao->Metricas();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
