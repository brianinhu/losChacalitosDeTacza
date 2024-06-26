<?php
class PanelPrincipal
{
    public function panelPrincipalShow()
    {
?>
        <div>
            <h1>Panel principal</h1>
            <p>Bienvenido al panel principal</p>
            <p>Usuario autenticado: <?php echo $_SESSION['usuario']; ?></p>
            <a href="cerrarSesion.php">Cerrar sesión</a>
        </div>
<?php
    }
}
