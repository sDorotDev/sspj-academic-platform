<?php

/**
 * Description of AsignaturaDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class AsignaturaDAO {
    
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_adm_asignatura";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarPorBloque($idbloque) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_enum_asignatura_bloque (:idbloque)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":idbloque", $idbloque);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarPorAlumnoAct($idalumno) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_enum_asignatura_alumno_act (:idalumno)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":idalumno", $idalumno);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarPorAlumnoConc($idalumno) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_enum_asignatura_alumno_con (:idalumno)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":idalumno", $idalumno);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Crear($asignatura) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_new_asignatura (:bloque, :curso, :docente, :clase)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":bloque", $asignatura["bloque"]);
            $stmt->bindParam(":curso", $asignatura["curso"]);
            $stmt->bindParam(":docente", $asignatura["docente"]);
            $stmt->bindParam(":clase", $asignatura["clase"], PDO::PARAM_STR_CHAR);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Actualizar($asignatura) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_upd_asignatura (:bloque, :curso, :docente, :clase, :id)";
            $stmt = $db->prepare($tsql);
            $stmt->bindParam(":bloque", $asignatura["bloque"]);
            $stmt->bindParam(":curso", $asignatura["curso"]);
            $stmt->bindParam(":docente", $asignatura["docente"]);
            $stmt->bindParam(":clase", $asignatura["clase"], PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":id", $asignatura["id"]);
            $stmt->execute();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
        
    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "CALL sp_del_asignatura (:id)";
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
            $tsql = "CALL sp_by_asignatura (:id)";
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
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_asignatura";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
