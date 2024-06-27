<?php

include_once("../modelo/E_Usuario.php");
include_once("../modelo/E_rol_privilegio.php");
class ControllerAutenticarUsuario
{

    public function validarSolicitud()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            false;
        } else {
            return true;
        }
    }

    public function validarBoton($boton)
    {
        if (isset($boton)) {
            return true;
        } else {
            return false;
        }
    }

    public function validarTexto($usuario, $clave)
    {
        if (empty($usuario) || empty($clave)) {
            return false;
        } else {
            return true;
        }
    }

    public function autenticarUsuario($usuario)
    {
        $objUsuario = new E_Usuario();
        if ($objUsuario->validarUsuario($usuario)) {
            return true;
        } else {
            return false;
        }
    }

    public function autenticarCredenciales($usuario, $clave)
    {
        $objUsuario = new E_Usuario();
        if ($objUsuario->validarCredenciales($usuario, $clave)) {
            return true;
        } else {
            return false;
        }
    }

    public function adquirirPrivilegios($usuario)
    {
        $objRolPrivilegio = new E_rol_privilegio();
        return $objRolPrivilegio->obtenerPrivilegios($usuario);
    }

    public function adquirirRol($usuario)
    {
        $objUsuario = new E_Usuario();
        return $objUsuario->obtenerRol($usuario);
    }
}
