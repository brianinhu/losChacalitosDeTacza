<?php
include_once("conexion.php");

class E_Usuario extends Conexion {
    public function validarUsuario($usuario) {
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
        $resultado = $this->conectar()->query($sql);
        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarCredenciales($usuario, $clave) {
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contraseña = '$clave'";
        $resultado = $this->conectar()->query($sql);
        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}