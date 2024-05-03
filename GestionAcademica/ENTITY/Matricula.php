<?php

/**
 * Description of Matricula
 *
 * @author USER
 */

class Matricula {
    
    private $IDMatricula;
    private $IDCarrera;
    private $IDAlumno;
    private $IDBloque;
    private $FechaRegistro;
    
    public function __construct() {
    }

    public function getIDMatricula() {
        return $this->IDMatricula;
    }

    public function getIDAlumno() {
        return $this->IDAlumno;
    }

    public function getIDBloque() {
        return $this->IDBloque;
    }

    public function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function setIDMatricula($IDMatricula): void {
        $this->IDMatricula = $IDMatricula;
    }

    public function setIDAlumno($IDAlumno): void {
        $this->IDAlumno = $IDAlumno;
    }

    public function setIDBloque($IDBloque): void {
        $this->IDBloque = $IDBloque;
    }

    public function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }
    
    public function getIDCarrera() {
        return $this->IDCarrera;
    }

    public function setIDCarrera($IDCarrera): void {
        $this->IDCarrera = $IDCarrera;
    }
    
    public function __toString() {
        return  "<div class='card-success'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>" . $this->IDMatricula . "-" . $this->IDBloque . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>ID Carrera: " . $this->IDCarrera . "</p>" .
                "<p>ID Alumno: " . $this->IDAlumno . "</p>" .
                "<p>Bloque: " . $this->IDBloque . "</p>" .
                "<p>Registro: " . $this->FechaRegistro . "</p>" .
                "</div>" .
                "</div>";
    }
    
}
