<?php

/**
 * Description of BloqueAsing
 *
 * @author USER
 */

class BloqueAsign {
    
    private $IDBloque;
    private $IDCarrera;
    private $Ciclo;
    private $Bloque;
    private $Turno;
    private $Concluido;
    
    public function __construct() {
    }

    public function getIDBloque() {
        return $this->IDBloque;
    }

    public function getIDCarrera() {
        return $this->IDCarrera;
    }

    public function getCiclo() {
        return $this->Ciclo;
    }

    public function getBloque() {
        return $this->Bloque;
    }

    public function getTurno() {
        return $this->Turno;
    }

    public function setIDBloque($IDBloque): void {
        $this->IDBloque = $IDBloque;
    }

    public function setIDCarrera($IDCarrera): void {
        $this->IDCarrera = $IDCarrera;
    }

    public function setCiclo($Ciclo): void {
        $this->Ciclo = $Ciclo;
    }

    public function setBloque($Bloque): void {
        $this->Bloque = $Bloque;
    }

    public function setTurno($Turno): void {
        $this->Turno = $Turno;
    }

    public function getConcluido() {
        return $this->Concluido;
    }

    public function setConcluido($Concluido): void {
        $this->Concluido = $Concluido;
    }
    
    public function __toString() {
        return  "<div class='card-success'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>Bloque " . $this->IDBloque . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>ID Carrera: " . $this->IDCarrera . "</p>" .
                "<p>Ciclo: " . $this->Ciclo . "</p>" .
                "<p>Bloque: " . $this->Bloque . "</p>" .
                "<p>Turno: " . $this->Turno . "</p>" .
                "<p>Concluido: " . $this->Concluido . "</p>" .
                "</div>" .
                "</div>";
    }
    
}
