<?php

/**
 * Description of Rol
 *
 * @author USER
 */

class Rol {
   
    private $IDRol;
    private $Nombre;
    
    public function __construct() {
    }
    
    public function getIDPerfil() {
        return $this->IDRol;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function __toString() {
        return  "<div class='card-success'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>" . $this->IDRol . "-" . $this->Nombre . "</h3>" .
                "</div>" .
                "</div>";
    }
    
}
