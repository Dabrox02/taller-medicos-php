<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];

?>

<head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion Medicos</title>
</head>
<div class="container">

    <?php
        switch ($opcion) {
            case 'crear':
        ?>
    <h3>Crear Médico</h3>
    <form action="actions/crear-medico.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="especialidad" placeholder="Especialidad" required><br>
        <button type="submit" class="btn btn-primary">Crear Médico</button>
    </form>
    <?php
                break;

            case 'actualizar':
            ?>
    <h3>Actualizar Médico</h3>
    <form action="actions/actualizar-medico.php" method="post">
        <input type="text" name="id" placeholder="ID del médico a actualizar" required><br>
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="especialidad" placeholder="Especialidad" required><br>
        <button type="submit" class="btn btn-primary">Actualizar Médico</button>
    </form>
    <?php
                break;

            case 'buscar':
            ?>
    <h3>Buscar Médico</h3>
    <form action="actions/buscar-medico.php" method="post">
        <input type="text" name="id" placeholder="ID del médico a buscar" required><br>
        <button type="submit" class="btn btn-primary">Buscar Médico</button>
    </form>
    <?php
                break;

            case 'eliminar':
            ?>
    <h3>Eliminar Médico</h3>
    <form action="actions/eliminar-medico.php" method="post">
        <input type="text" name="id" placeholder="ID del médico a eliminar" required><br>
        <button type="submit" class="btn btn-primary">Eliminar Médico</button>
    </form>
    <?php
                break;

            case 'informe':
                include 'actions/informe.php';
                break;

            default:
            ?>
    <h3>Opción no válida</h3>
    <?php
                break;
        }
    }
    ?>
    <a href="medicos.php" class="btn btn-secondary">Regresar</a>
</div>