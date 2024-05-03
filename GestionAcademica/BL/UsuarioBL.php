<?php

/**
 * Description of UsuarioBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/UsuarioDAO.php';

class UsuarioBL {
    
    function Listar() {
        $dao = new UsuarioDAO();
        try {
            return $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Verificar($usuario) {
        $dao = new UsuarioDAO();
        try {
            return $dao->Verificar($usuario);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarSinAlumno() {
        $dao = new UsuarioDAO();
        try {
            return $dao->EnumerarSinAlumno();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function EnumerarSinDocente() {
        $dao = new UsuarioDAO();
        try {
            return $dao->EnumerarSinDocente();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function BuscarId($id) {
        $dao = new UsuarioDAO();
        try {
            return $dao->BuscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Crear($usuario) {
        $dao = new UsuarioDAO();
        try {
            $dao->Crear($usuario);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Actualizar($usuario) {
        $dao = new UsuarioDAO();
        try {
            $dao->Actualizar($usuario);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Eliminar($id) {
        $dao = new UsuarioDAO();
        try {
            $dao->Eliminar($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function Metricas() {
        $dao = new UsuarioDAO();
        try {
            return $dao->Metricas();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
