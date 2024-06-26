<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Finalmente, destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión (o a cualquier otra página)
header("Location: ../index.php");
exit;
