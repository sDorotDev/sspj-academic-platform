<?php

/**
 * Description of EstudioCatDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class EstudioCatDAO {
    
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_adm_estudiocat";
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
            $tsql = "SELECT * FROM vw_enum_estudiocat";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Crear($categoria) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        
        try {
            $tsql = "CALL sp_new_categoria (:nombre)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":nombre", $categoria["nombre"], PDO::PARAM_STR_CHAR);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Actualizar($categoria) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_upd_categoria (:nombre, :id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":nombre", $categoria["nombre"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":id", $categoria["id"]);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
        
    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_del_categoria (:id)";
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
            $tsql = "CALL sp_by_categoria (:id)";
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
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_estudiocateg";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
