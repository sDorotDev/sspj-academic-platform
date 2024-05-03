<?php

/**
 * Description of Usuario
 *
 * @author USER
 */

class Usuario {
    
    private $IDUsuario;
    private $IDRol;
    private $Username;
    private $Password;
    private $Correo;
    private $FechaRegistro;
    private $FechaActualizacion;
    
    public function __construct() {      
    }

    public function getIDUsuario() {
        return $this->IDUsuario;
    }

    public function getIDRol() {
        return $this->IDRol;
    }

    public function getUsername() {
        return $this->Username;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getCorreo() {
        return $this->Correo;
    }

    public function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    public function getFechaActualizacion() {
        return $this->FechaActualizacion;
    }

    public function setIDUsuario($IDUsuario): void {
        $this->IDUsuario = $IDUsuario;
    }

    public function setIDRol($IDRol): void {
        $this->IDRol = $IDRol;
    }

    public function setUsername($Username): void {
        $this->Username = $Username;
    }

    public function setPassword($Password): void {
        $this->Password = $Password;
    }

    public function setCorreo($Correo): void {
        $this->Correo = $Correo;
    }

    public function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }

    public function setFechaActualizacion($FechaActualizacion): void {
        $this->FechaActualizacion = $FechaActualizacion;
    }
        
    public function __toString() {
        return  "<div class='card-warning'>" .
                "<div class='card-header'>" .
                "<h3 class='card-title'>USER-" . $this->IDUsuario . "-" . $this->Username . "</h3>" .
                "</div>" .
                "<div class='card-body'>" .
                "<p>Tipo de Perfil: " . $this->IDRol . "</p>" .
                "<p>Correo: " . $this->Correo . "</p>" .
                "<p>Registro: " . $this->FechaRegistro . "</p>" .
                "<p>Actualización: " . $this->FechaActualizacion . "</p>" .
                "</div>" .
                "</div>";
    }
}
