<?php

/**
 * Description of Alumno
 *
 * @author USER
 */

class Alumno {
   
    private $IDAlumno;
    private $IDCuenta;
    private $Nombres;
    private $APPaterno;
    private $APMaterno;
    private $Direccion;
    private $Email;
    private $Telefono;
    private $DocumentoIdentidad;
    private $Sexo;
    private $CicloActual;
    private $BloqueActual;
    private $FechaRegistro;
    private $FechaActualizacion;
    
    public function __construct() {
    }
    
    public function getIDAlumno() {
        return $this->IDAlumno;
    }

    public function getIDCuenta() {
        return $this->IDCuenta;
    }

    public function getNombres() {
        return $this->Nombres;
    }

    public function getAPPaterno() {
        return $this->APPaterno;
    }

    public function getAPMaterno() {
        return $this->APMaterno;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function getTelefono() {
        return $this->Telefono;
    }

    public function getDocumentoIdentidad() {
        return $this->DocumentoIdentidad;
    }

    public function getSexo() {
        return $this->Sexo;
    }

    public function getCicloActual() {
        return $this->CicloActual;
    }

    public function getBloqueActual() {
        return $this->BloqueActual;
    }

    public function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function getFechaActualizacion() {
        return $this->FechaActualizacion;
    }

    public function setIDAlumno($IDAlumno): void {
        $this->IDAlumno = $IDAlumno;
    }

    public function setIDCuenta($IDCuenta): void {
        $this->IDCuenta = $IDCuenta;
    }

    public function setNombres($Nombres): void {
        $this->Nombres = $Nombres;
    }

    public function setAPPaterno($APPaterno): void {
        $this->APPaterno = $APPaterno;
    }

    public function setAPMaterno($APMaterno): void {
        $this->APMaterno = $APMaterno;
    }

    public function setDireccion($Direccion): void {
        $this->Direccion = $Direccion;
    }

    public function setTelefono($Telefono): void {
        $this->Telefono = $Telefono;
    }

    public function setDocumentoIdentidad($DocumentoIdentidad): void {
        $this->DocumentoIdentidad = $DocumentoIdentidad;
    }

    public function setSexo($Sexo): void {
        $this->Sexo = $Sexo;
    }

    public function setCicloActual($CicloActual): void {
        $this->CicloActual = $CicloActual;
    }

    public function setBloqueActual($BloqueActual): void {
        $this->BloqueActual = $BloqueActual;
    }

    public function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }

    public function setFechaActualizacion($FechaActualizacion): void {
        $this->FechaActualizacion = $FechaActualizacion;
    }
    
    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email): void {
        $this->Email = $Email;
    }

    public function __toString() {
        return  "<div class='card-info'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>Alumno " . $this->IDAlumno . "-" . $this->APPaterno . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>Nombres: " . $this->Nombres . "</p>" .
                "<p>Apellidos: " . $this->APPaterno . " " . $this->APMaterno . "</p>" .
                "<p>Email: " . $this->Email . "</p>" .
                "<p>Dirección: " . $this->Direccion . "</p>" .
                "<p>Documento: " . $this->DocumentoIdentidad . "</p>" .
                "<p>Telefono: " . $this->Telefono . "</p>" .
                "<p>Sexo: " . $this->Sexo . "</p>" .
                "<p>Ciclo: " . $this->CicloActual . "</p>" .
                "<p>Bloque: " . $this->BloqueActual . "</p>" .
                "<p>Registro: " . $this->FechaRegistro . "</p>" .
                "<p>Actualización: " . $this->FechaActualizacion . "</p>" .
                "</div>" .
                "</div>";
    }
    
}
