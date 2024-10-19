<!DOCTYPE html>
<html lang="en">

<head>
    <link rel='stylesheet' type='text/css' href='styles.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de Medicos</title>
</head>

<body>
    <div class="container">
        <h2>Manejo de Medicos</h2>
        <form action="seleccion.php" method="POST">
            <select name="opcion" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="crear">Crear Medico</option>
                <option value="actualizar">Actualizar Medicos</option>
                <option value="buscar">Buscar Medicos</option>
                <option value="eliminar">Eliminar Medico</option>
                <option value="informe">Informe Medico</option>
            </select>
            <button class="btn btn-primary" type="submit">Seleccionar</button>
        </form>
    </div>
</body>

</html>