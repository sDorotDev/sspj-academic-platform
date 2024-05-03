<?php

/**
 * Description of ConexionDAO
 *
 * @author USER
 */

class ConexionDAO {
    
    private $servidor = "mysql:host=localhost;port=3307;dbname=db_institutog4";
    private $username = "root";
    private $password = "";
    
    public function openConexion() {
        
        try {
            $mbd = new PDO($this->servidor, $this->username, $this->password);
            $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $mbd;
        } catch (Exception $exc) {
            echo "Error: \n" . $exc->getMessage() . "<br>";
        }
        
    }
}
