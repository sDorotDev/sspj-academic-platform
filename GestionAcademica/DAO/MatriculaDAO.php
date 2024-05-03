<?php

/**
 * Description of MatriculaDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class MatriculaDAO {
   
    function Listar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT * FROM vw_adm_matricula";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function EnumerarInscritos($bloque) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_enum_matricula_alumno (:bloque)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":bloque", $bloque);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    } 

    function BuscarId($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_by_matricula (:id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }

    function Crear($matricula) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_new_matricula (:idBloque, :idAlumno)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":idBloque", $matricula["IDBloque"]);
            $stmt->bindParam(":idAlumno", $matricula["IDAlumno"]);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Actualizar($matricula) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_upd_matricula (:idBloque, :idAlumno, :idMatricula)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":idBloque", $matricula["IDBloque"]);
            $stmt->bindParam(":idAlumno", $matricula["IDAlumno"]);
            $stmt->bindParam(":idMatricula", $matricula["IDMatricula"]);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function Eliminar($id) {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "CALL sp_del_matricula (:id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
    function Metricas() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT COUNT(*) AS Reg_Total, SUM(Activo = 0) AS Reg_Inactivo, SUM(Activo = 1) AS Reg_Activo, MAX(dt_Act) AS Reg_Ult_Modf FROM tb_matricula";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
}
