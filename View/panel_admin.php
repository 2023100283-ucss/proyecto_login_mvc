<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../Modelo/conexion.php';

$con = new Conexion();
$usuarios = $con->getUsers();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .logout {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> (Administrador)</h1>
    <div class="logout">
        <a href="../Controlador/logout.php">Cerrar sesión</a>
    </div>

    <div class="container">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $user): ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['nombre']; ?></td>
                            <td><?= $user['apellido_paterno']; ?></td>
                            <td><?= $user['apellido_materno']; ?></td>
                            <td><?= $user['usuario']; ?></td>
                            <td><?= $user['correo']; ?></td>
                            <td><?= $user['rol']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
