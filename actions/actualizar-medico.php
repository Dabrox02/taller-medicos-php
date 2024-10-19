<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;

    echo "<link rel='stylesheet' type='text/css' href='../styles.css'>";

    if ($nombre || $especialidad) {
        $fields = [];
        $params = [];
        $types = '';

        if ($nombre) {
            $fields[] = "nombre = ?";
            $params[] = $nombre;
            $types .= 's';
        }

        if ($especialidad) {
            $fields[] = 'especialidad = ?';
            $params[] = $especialidad;
            $types .= 's';
        }

        if (count($fields) > 0) {


            $updateQuery = "UPDATE medicos SET " . implode(", ", $fields) . " WHERE id = ?";
            $params[] = $id;
            $types .= 'i';

            if ($stmt = $conn->prepare($updateQuery)) {
                $stmt->bind_param($types, ...$params);

                if ($stmt->execute()) {
                    if ($stmt->affected_rows > 0) {
                        echo "Actualizado Exitosamente <br>";
                        echo "ID: $id<br>";
                        echo "Nombre: $nombre<br>";
                        echo "Especialidad: $especialidad<br>";
                    } else {
                        echo "No se encontró ningún médico con el ID: $id.";
                    }
                } else {
                    echo "Error al actualizar el registro: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error al preparar la consulta: " . $conn->error;
            }
        } else {
            echo "No hay campos para actualizar.";
        }
    }
}

echo "<br>";
echo '<a href="../medicos.php" class="btn btn-secondary">Regresar</a>';