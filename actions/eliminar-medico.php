<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    echo "<link rel='stylesheet' type='text/css' href='../styles.css'>";
    $query = "DELETE FROM medicos WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            echo "El médico con ID: $id ha sido eliminado exitosamente.";
        } else {
            echo "Error al eliminar el médico: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID.";
}


echo '<br><br>';
echo '<a href="../medicos.php" class="button">Regresar</a>';