<?php
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre']) && isset($_POST['especialidad'])) {
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];
    echo "<link rel='stylesheet' type='text/css' href='../styles.css'>";
    $query = "INSERT INTO medicos (nombre, especialidad) VALUES(?, ?)";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('ss', $nombre, $especialidad);

        if ($stmt->execute()) {
            header('Location: ../medicos.php');
            exit;
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    mysqli_query($conn, $query);

    header('Location: ../medicos.php');
    exit;
}