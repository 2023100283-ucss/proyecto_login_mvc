<?php
require_once '../Modelo/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $user = new Usuario();
    $datos = $user->login($usuario, $password);

    if ($datos) {
        session_start();
        $_SESSION['usuario'] = $datos['usuario'];
        $_SESSION['rol'] = $datos['rol'];

        switch ($datos['rol']) {
            case 'admin':
                header("Location: ../View/panel_admin.php");
                break;
            case 'profesor':
                header("Location: ../View/panel_profesor.php");
                break;
            case 'alumno':
                header("Location: ../View/panel_alumno.php");
                break;
            default:
                header("Location: ../View/index.html");
                break;
        }
    } else {
        header("Location: ../View/login.php?error=1");
    }
}
?>
