<?php

/**
 * Description of Curso
 *
 * @author USER
 */

class Curso {
    
    private $IDCurso;
    private $Nombre;
    private $Creditos;
    private $IDEstudioCat;
    private $FechaRegistro;
    private $FechaActualizacion;
    
    public function __construct() {
    }

    public function getIDCurso() {
        return $this->IDCurso;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getCreditos() {
        return $this->Creditos;
    }

    public function getIDEstudioCat() {
        return $this->IDEstudioCat;
    }

    public function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function getFechaActualizacion() {
        return $this->FechaActualizacion;
    }

    public function setIDCurso($IDCurso): void {
        $this->IDCurso = $IDCurso;
    }

    public function setNombre($Nombre): void {
        $this->Nombre = $Nombre;
    }

    public function setCreditos($Creditos): void {
        $this->Creditos = $Creditos;
    }

    public function setIDEstudioCat($IDEstudioCat): void {
        $this->IDEstudioCat = $IDEstudioCat;
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
                "<h3 class='card-title'>" . $this->IDCurso . "-" . $this->Nombre . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>Identificador Categoria: " . $this->IDEstudioCat . "</p>" .
                "<p>Créditos: " . $this->Creditos . "</p>" .
                "<p>Registro: " . $this->FechaRegistro . "</p>" .
                "<p>Actualización: " . $this->FechaActualizacion . "</p>" .
                "</div>" .
                "</div>";
    }
    
}
