<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../View/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Alumno</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> (Alumno)</h1>
    <p>Este es tu panel de alumno. Aquí podrás ver tus cursos, notas y tareas.</p>
    <a href="../Controlador/logout.php">Cerrar sesión</a>
</body>
</html>
