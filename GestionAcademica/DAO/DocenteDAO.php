<?php

/**
 * Description of DocenteDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class DocenteDAO {
    
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_adm_docente";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Enumerar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_enum_docente";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Crear($docente) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_new_docente (:usuario, :nombre, :apaterno, :amaterno, :direccion, :email, :telefono, :documento, :sexo)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":usuario", $docente["usuario"]);
            $stmt->bindParam(":nombre", $docente["nombre"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":apaterno", $docente["apaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":amaterno", $docente["amaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":direccion", $docente["direccion"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":email", $docente["email"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":telefono", $docente["telefono"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":documento", $docente["documento"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":sexo", $docente["sexo"], PDO::PARAM_STR_CHAR);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Actualizar($docente) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_upd_docente (:usuario, :nombre, :apaterno, :amaterno, :direccion, :email, :telefono, :documento, :sexo, :id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":usuario", $docente["usuario"]);
            $stmt->bindParam(":nombre", $docente["nombre"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":apaterno", $docente["apaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":amaterno", $docente["amaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":direccion", $docente["direccion"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":email", $docente["email"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":telefono", $docente["telefono"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":documento", $docente["documento"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":sexo", $docente["sexo"], PDO::PARAM_STR_CHAR);       
            $stmt->bindParam(":id", $docente["id"]);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
        
    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_del_docente (:id)";
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
            $tsql = "CALL sp_by_docente (:id)";
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
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_docente";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
