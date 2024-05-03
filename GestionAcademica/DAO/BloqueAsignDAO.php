<?php

/**
 * Description of BloqueAsignDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class BloqueAsignDAO {
    
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_adm_bloque";
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
            $tsql = "SELECT * FROM vw_enum_bloque";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarPorCarrera($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_enum_bloque_carrera (:id)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Crear($bloque) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        
        try {
            $tsql = "CALL sp_new_bloque (:carrera, :seccion, :ciclo, :bloque, :turno, :inicio, :cierre)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":carrera", $bloque["carrera"]);
            $stmt->bindParam(":seccion", $bloque["seccion"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":ciclo", $bloque["ciclo"]);
            $stmt->bindParam(":bloque", $bloque["bloque"]);
            $stmt->bindParam(":turno", $bloque["turno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":inicio", $bloque["inicio"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":cierre", $bloque["cierre"], PDO::PARAM_STR_CHAR);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Actualizar($bloque) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        
        try {
            $tsql = "CALL sp_upd_bloque (:carrera, :seccion, :ciclo, :bloque, :turno, :concluido, :inicio, :cierre, :id)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":carrera", $bloque["carrera"]);
            $stmt->bindParam(":seccion", $bloque["seccion"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":ciclo", $bloque["ciclo"]);
            $stmt->bindParam(":bloque", $bloque["bloque"]);
            $stmt->bindParam(":turno", $bloque["turno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":concluido", $bloque["concluido"]);
            $stmt->bindParam(":inicio", $bloque["inicio"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":cierre", $bloque["cierre"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":id", $bloque["id"]);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
        
    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_del_bloque (:id)";
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
            $tsql = "CALL sp_by_bloque (:id)";
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
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_bloqueasign";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
