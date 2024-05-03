<?php

/**
 * Description of Asignatura
 *
 * @author USER
 */

class Asignatura {
    
    private $IDAsignatura;
    private $IDBloque;
    private $IDCurso;
    private $IDDocente;
    private $FechaInicio;
    private $FechaCierre;
    private $FechaRegistro;
    private $FechaActualizacion;
    
    public function __construct() {
    }

    public function getIDAsignatura() {
        return $this->IDAsignatura;
    }

    public function getIDBloque() {
        return $this->IDBloque;
    }

    public function getIDCurso() {
        return $this->IDCurso;
    }

    public function getIDDocente() {
        return $this->IDDocente;
    }

    public function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function getFechaActualizacion() {
        return $this->FechaActualizacion;
    }

    public function setIDAsignatura($IDAsignatura): void {
        $this->IDAsignatura = $IDAsignatura;
    }

    public function setIDBloque($IDBloque): void {
        $this->IDBloque = $IDBloque;
    }

    public function setIDCurso($IDCurso): void {
        $this->IDCurso = $IDCurso;
    }

    public function setIDDocente($IDDocente): void {
        $this->IDDocente = $IDDocente;
    }

    public function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }

    public function setFechaActualizacion($FechaActualizacion): void {
        $this->FechaActualizacion = $FechaActualizacion;
    }

    public function getFechaInicio() {
        return $this->FechaInicio;
    }

    public function getFechaCierre() {
        return $this->FechaCierre;
    }

    public function setFechaInicio($FechaInicio): void {
        $this->FechaInicio = $FechaInicio;
    }

    public function setFechaCierre($FechaCierre): void {
        $this->FechaCierre = $FechaCierre;
    }
    
    public function __toString() {
        return  "<div class='card-success'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>Carrera " . $this->IDAsignatura . "-" . $this->IDBloque . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>ID Bloque: " . $this->IDBloque . "</p>" .
                "<p>ID Curso: " . $this->IDCurso . "</p>" .
                "<p>ID Docente: " . $this->IDDocente . "</p>" .
                "<p>Inicio: " . $this->FechaInicio . "</p>" .
                "<p>Cierre: " . $this->FechaCierre . "</p>" .
                "<p>Registro: " . $this->FechaRegistro . "</p>" .
                "<p>Actualización: " . $this->FechaActualizacion . "</p>" .
                "</div>" .
                "</div>";
    }
    
}
