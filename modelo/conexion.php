<?php
class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "papeleria";

    public function conectar()
    {
        return mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }

    public function desconectar()
    {
        mysqli_close($this->conectar());
    }
}
