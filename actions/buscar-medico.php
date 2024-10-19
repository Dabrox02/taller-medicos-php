<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    echo "<link rel='stylesheet' type='text/css' href='../styles.css'>";
    $query = "SELECT * FROM medicos WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row['id'] . "<br>";
                echo "Nombre: " . $row['nombre'] . "<br>";
                echo "Especialidad: " . $row['especialidad'] . "<br>";
            }
        } else {
            echo "No se encontró ningún médico con el ID: $id.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID.";
}

echo "<br>";
echo '<a href="../medicos.php" class="btn btn-secondary">Regresar</a>';