<?php

/**
 * Description of RolDAO
 *
 * @author USER
 */

require_once 'conexionDAO.php';

class RolDAO {
    
    function Enumerar() {
        $database = new conexionDAO();
        $db = $database->openConexion();
        try {
            $tsql = "SELECT * FROM vw_enum_rol";
            $stmt = $db->prepare($tsql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br>";
        }
    }
    
}
