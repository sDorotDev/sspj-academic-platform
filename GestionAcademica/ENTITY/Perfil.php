<?php

/**
 * Description of Perfil
 *
 * @author USER
 */

class Perfil {
    
    private $IDPerfil;
    private $Nombre;
    
    public function __construct() {
    }
    
    public function getIDPerfil() {
        return $this->IDPerfil;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function __toString() {
        return  "<div class='card-success'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>" . $this->IDPerfil . "-" . $this->Nombre . "</h3>" .
                "</div>" .
                "</div>";
    }
    
}
