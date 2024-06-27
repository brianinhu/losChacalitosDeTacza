<?php

include_once("conexion.php");

class E_rol_privilegio extends Conexion
{
    // Obtener los privilegios según el usuario
    public function obtenerPrivilegios($usuario) {
        $sql = "SELECT p.label, p.ruta, p.icono, p.name 
        FROM usuario u 
        JOIN rol r ON u.idrol = r.idrol
        JOIN rol_privilegio rp ON r.idrol = rp.idrol
        JOIN privilegio p ON rp.idprivilegio = p.idprivilegio
        WHERE u.usuario = '$usuario'";
        $resultado = $this->conectar()->query($sql);
        $privilegios = array();
        while ($fila = $resultado->fetch_assoc()) {
            $privilegios[] = $fila;
        }
        return $privilegios;
    }
}