<?php
session_start();
include_once("controllerAutenticarUsuario.php");
$controller = new ControllerAutenticarUsuario();

if ($controller->validarSolicitud()) {
    if ($controller->validarBoton("btnIngresar")) {
        $response = array();
        $txtUsuario = $_POST['txtUsuario'];
        $txtPassword = $_POST['txtPassword'];
        if ($controller->validarTexto($txtUsuario, $txtPassword)) {
            if ($controller->autenticarUsuario($txtUsuario)) {
                if ($controller->autenticarCredenciales($txtUsuario, $txtPassword)) {
                    $_SESSION['usuario'] = $txtUsuario;
                    $response['flag'] = 1;
                    $response['redirect'] = "../pre_sgvpapeleria/moduloSeguridad/mostrarPanelPrincipal.php";
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    $response['flag'] = 2;
                    $response['message'] = "Contraseña incorrecta";
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit;
                }
            } else {
                $response['flag'] = 2;
                $response['message'] = "Usuario no encontrado";
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }
        } else {
            $response['flag'] = 2;
            $response['message'] = "Los textos están vacíos";
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    } else {
        include_once("../shared/modalMensaje.php");
        $modal = new ModalMensaje();
        $modal->modalMensajeShow("Error", "Se realizó una solicitud POST pero no se presionó el botón");
    }
} else {
    include_once("../shared/modalMensaje.php");
    $modal = new ModalMensaje();
    $modal->modalMensajeShow("Error", "No se ha realizado una solicitud POST");
}
