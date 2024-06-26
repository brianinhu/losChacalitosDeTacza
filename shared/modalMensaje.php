<?php
class ModalMensaje
{
    public function modalMensajeShow($title, $mensaje)
    {
?>
        <div id="modalMensaje">
            <div>
                <h1><?php echo $title; ?></h1>
                <p><?php echo $mensaje; ?></p>
            </div>
            <div>
                <a href="../index.php">Volver</a>
            </div>
        </div>
<?php
    }
}
