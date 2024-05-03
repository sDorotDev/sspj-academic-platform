<?php

/**
 * Description of UsuarioDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class UsuarioDAO {
    
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_adm_usuario";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarSinAlumno() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_enum_usuario_sin_alumno";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarSinDocente() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_enum_usuario_sin_docente";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Verificar($usuario) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_cred_usuario(:username,:password,:correo)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":username", $usuario["username"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":password", $usuario["password"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":correo", $usuario["correo"], PDO::PARAM_STR_CHAR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Crear($usuario) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        
        try {
            $tsql = "CALL sp_new_usuario (:rol,:username,:password,:correo)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":rol", $usuario["rol"]);
            $stmt->bindParam(":username", $usuario["username"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":password", $usuario["password"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":correo", $usuario["correo"], PDO::PARAM_STR_CHAR);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Actualizar($usuario) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_upd_usuario (:rol,:username,:password,:correo,:id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":rol", $usuario["rol"]);
            $stmt->bindParam(":username", $usuario["username"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":password", $usuario["password"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":correo", $usuario["correo"], PDO::PARAM_STR_CHAR);            $stmt->bindParam(":id", $usuario["id"]);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
        
    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_del_usuario (:id)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function BuscarId($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_by_usuario (:id)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Metricas() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_usuario";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
