<?php

/**
 * Description of EstudioCateg
 *
 * @author USER
 */

class EstudioCateg {
   
    private $IDEstudioCateg;
    private $Nombre;
    private $FechaRegistro;
    private $FechaActualizacion;
    
    public function __construct() {
    }
    
    public function getIDEstudioCateg() {
        return $this->IDEstudioCateg;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function getFechaActualizacion() {
        return $this->FechaActualizacion;
    }

    public function setIDEstudioCateg($IDEstudioCateg): void {
        $this->IDEstudioCateg = $IDEstudioCateg;
    }

    public function setNombre($Nombre): void {
        $this->Nombre = $Nombre;
    }

    public function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }

    public function setFechaActualizacion($FechaActualizacion): void {
        $this->FechaActualizacion = $FechaActualizacion;
    }

    public function __toString() {
        return  "<div class='card-secondary'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>" . $this->IDEstudioCateg . "-" . $this->Nombre . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>Registro: " . $this->FechaRegistro . "</p>" .
                "<p>Actualización: " . $this->FechaActualizacion . "</p>" .
                "</div>" .
                "</div>";
    }
    
}
