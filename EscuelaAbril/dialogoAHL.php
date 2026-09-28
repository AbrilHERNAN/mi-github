<?php

$empleados = [
    1 => [
        "nombre" => "Ana López",
        "puesto" => "Administradora"
    ],
    2 => [
        "nombre" => "Carlos Hernández",
        "puesto" => "Programador"
    ],
    3 => [
        "nombre" => "María González",
        "puesto" => "Contadora"
    ],
    4 => [
        "nombre" => "Juan Pérez",
        "puesto" => "Soporte Técnico"
    ]
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eliminar empleados</title>

    <script>

        function confirmarEliminacion(nombre) {

            let respuesta = confirm(
                "¿Está seguro de eliminar este registro?\n\nEmpleado: " + nombre
            );

            if (respuesta) {
                return true;
            } else {
                return false;
            }

        }

    </script>

</head>
<body>

    <h1>Registro de empleados</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Acción</th>
        </tr>

        <?php foreach ($empleados as $id => $empleado): ?>

            <tr>

                <td>
                    <?php echo $id; ?>
                </td>

                <td>
                    <?php echo $empleado["nombre"]; ?>
                </td>

                <td>
                    <?php echo $empleado["puesto"]; ?>
                </td>

                <td>

                    <form 
                        method="POST"
                        onsubmit="return confirmarEliminacion('<?php echo $empleado["nombre"]; ?>');"
                    >

                        <input 
                            type="hidden" 
                            name="id" 
                            value="<?php echo $id; ?>"
                        >

                        <input 
                            type="submit" 
                            name="eliminar" 
                            value="Eliminar"
                        >

                    </form>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

    <?php

    if (isset($_POST["eliminar"])) {

        $id = $_POST["id"];

        echo "<h2>Registro eliminado correctamente.</h2>";
        echo "<p>ID del empleado eliminado: " . $id . "</p>";

    }

    ?>

</body>
</html>