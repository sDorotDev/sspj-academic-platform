<?php

/**
 * Description of AlumnoDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class AlumnoDAO {
    
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_adm_alumno";
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
            $tsql = "SELECT * FROM vw_enum_alumno";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Crear($alumno) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_new_alumno (:usuario, :nombre, :apaterno, :amaterno, :direccion, :email, :telefono, :documento, :sexo, :ciclo, :bloque)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":usuario", $alumno["usuario"]);
            $stmt->bindParam(":nombre", $alumno["nombre"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":apaterno", $alumno["apaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":amaterno", $alumno["amaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":direccion", $alumno["direccion"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":email", $alumno["email"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":telefono", $alumno["telefono"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":documento", $alumno["documento"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":sexo", $alumno["sexo"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":ciclo", $alumno["ciclo"]);
            $stmt->bindParam(":bloque", $alumno["bloque"]);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Actualizar($alumno) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_upd_alumno (:usuario, :nombre, :apaterno, :amaterno, :direccion, :email, :telefono, :documento, :sexo, :ciclo, :bloque, :id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":usuario", $alumno["usuario"]);
            $stmt->bindParam(":nombre", $alumno["nombre"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":apaterno", $alumno["apaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":amaterno", $alumno["amaterno"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":direccion", $alumno["direccion"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":email", $alumno["email"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":telefono", $alumno["telefono"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":documento", $alumno["documento"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":sexo", $alumno["sexo"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":ciclo", $alumno["ciclo"]);
            $stmt->bindParam(":bloque", $alumno["bloque"]);        
            $stmt->bindParam(":id", $alumno["id"]);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
        
    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_del_alumno (:id)";
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
            $tsql = "CALL sp_by_alumno (:id)";
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
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_alumno";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
