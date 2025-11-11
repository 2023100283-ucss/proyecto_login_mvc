<?php
require_once 'conexion.php';

class Usuario {
    private $con;

    public function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->getConexion();
    }

    public function login($usuario, $password) {
        $stmt = $this->con->prepare("SELECT * FROM usuarios WHERE usuario = ? AND clave = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc(); 
        } else {
            return false;
        }
    }
}
?>
