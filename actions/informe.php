<?php
include 'conexion.php';

$query = "SELECT * FROM medicos";
$result = $conn->query($query);
?>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Especialidad</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row["id"]; ?></td>
        <td><?= $row["nombre"]; ?></td>
        <td><?= $row["especialidad"]; ?></td>
    </tr>
    <?php endwhile; ?>
    <?php else: ?>
    <tr>
        <td colspan="3">No se encontraron médicos.</td>
    </tr>
    <?php endif; ?>
</table>


<?php $conn->close(); ?>