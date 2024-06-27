<?php
include_once("conexion.php");

class E_Usuario extends Conexion
{
    public function validarUsuario($usuario)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
        $resultado = $this->conectar()->query($sql);
        $this->desconectar();
        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarCredenciales($usuario, $clave)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contraseña = '$clave'";
        $resultado = $this->conectar()->query($sql);
        $this->desconectar();
        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerRol($usuario)
    {
        $sql = "SELECT r.rol FROM usuario u
                JOIN rol r ON u.idrol = r.idrol 
                WHERE u.usuario = '$usuario'";
        $resultado = $this->conectar()->query($sql);
        $this->desconectar();
        $fila = $resultado->fetch_assoc();
        return $fila['rol'];
    }
}
