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
    <title>Panel del Profesor</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> (Profesor)</h1>
    <p>Este es tu panel de profesor. Aquí podrás gestionar tus cursos y calificaciones.</p>
    <a href="../Controlador/logout.php">Cerrar sesión</a>
</body>
</html>
