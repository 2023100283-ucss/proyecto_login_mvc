<?php
class Conexion {
    private $con;

    public function __construct() {
        $this->con = new mysqli("localhost", "root", "", "proyectomvc", 3306);

        if ($this->con->connect_error) {
            die("Error de conexión: " . $this->con->connect_error);
        }
    }

    public function getConexion() {
        return $this->con;
    }

    public function getUsers() {
        $query = $this->con->query('SELECT * FROM usuarios');
        $retorno = [];
        while ($fila = $query->fetch_assoc()) {
            $retorno[] = $fila;
        }
        return $retorno;
    }
}
?>
