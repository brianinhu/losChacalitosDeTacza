<?php
session_start();

// Asegúrate de que el usuario esté autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no está autenticado, redirige al formulario de inicio de sesión
    header('Location: formAutenticarUsuario.php');
    exit();
}

// Incluye el archivo de la clase PanelPrincipal
include_once("panelPrincipal.php");

// Instancia y muestra el panel principal
$panel = new PanelPrincipal();
$panel->panelPrincipalShow();