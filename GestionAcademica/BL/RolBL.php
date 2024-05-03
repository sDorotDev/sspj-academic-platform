<?php

/**
 * Description of RolBL
 *
 * @author USER
 */

require $_SERVER['DOCUMENT_ROOT'] . '/GestionAcademica/DAO/RolDAO.php';

class RolBL {
    
    function Enumerar() {
        $dao = new RolDAO();
        try {
            return $dao->Enumerar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
}
