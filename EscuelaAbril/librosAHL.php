<?php

$libros = [
    [
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "anio" => 1967
    ],
    [
        "titulo" => "El principito",
        "autor" => "Antoine de Saint-Exupéry",
        "anio" => 1943
    ],
    [
        "titulo" => "Don Quijote de la Mancha",
        "autor" => "Miguel de Cervantes",
        "anio" => 1605
    ],
    [
        "titulo" => "Harry Potter y la piedra filosofal",
        "autor" => "J. K. Rowling",
        "anio" => 1997
    ],
    [
        "titulo" => "1984",
        "autor" => "George Orwell",
        "anio" => 1949
    ]
];

$resultados = [];

if (isset($_GET["busqueda"])) {

    $busqueda = strtolower(trim($_GET["busqueda"]));

    foreach ($libros as $libro) {

        if (
            strpos(strtolower($libro["titulo"]), $busqueda) !== false ||
            strpos(strtolower($libro["autor"]), $busqueda) !== false
        ) {
            $resultados[] = $libro;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de libros</title>
</head>
<body>

    <h1>Catálogo de libros - Biblioteca TecNM</h1>

    <form method="GET">

        <label for="busqueda">Buscar libro o autor:</label>

        <input 
            type="text" 
            id="busqueda" 
            name="busqueda"
            placeholder="Escribe una búsqueda"
            required
        >

        <input type="submit" value="Buscar">

    </form>

    <br>

    <?php

    if (isset($_GET["busqueda"])) {

        if (count($resultados) > 0) {

            echo "<h2>Resultados encontrados:</h2>";

            foreach ($resultados as $libro) {

                echo "<p>";
                echo "<strong>Título:</strong> " . $libro["titulo"] . "<br>";
                echo "<strong>Autor:</strong> " . $libro["autor"] . "<br>";
                echo "<strong>Año:</strong> " . $libro["anio"];
                echo "</p>";

                echo "<hr>";
            }

        } else {

            echo "<p>No se encontraron libros.</p>";
        }
    }

    ?>

</body>
</html>