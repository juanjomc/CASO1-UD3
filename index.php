<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Juegos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contenedor">
        <a href="index.php"><h1>Buscar Juegos</h1></a>
        <form action="index.php" method="get">
            <label for="nombre">Nombre del Juego:</label>
            <input type="text" id="nombre" name="nombre" <?php echo isset($_GET['nombre']) ? 'value='.$_GET['nombre'] :''; ?>><br><br>

            <label for="edad">Edad:</label>
            <select id="edad" name="edad">
            <option value="" <?php echo !isset($_GET['edad']) || $_GET['edad'] == '' ? 'selected' : ''; ?>>Cualquiera</option>
                <option value="3" <?php echo isset($_GET['edad']) && $_GET['edad'] == '3' ? 'selected' : ''; ?>>3</option>
                <option value="7" <?php echo isset($_GET['edad']) && $_GET['edad'] == '7' ? 'selected' : ''; ?>>7</option>
                <option value="10" <?php echo isset($_GET['edad']) && $_GET['edad'] == '10' ? 'selected' : ''; ?>>10</option>
                <option value="12" <?php echo isset($_GET['edad']) && $_GET['edad'] == '12' ? 'selected' : ''; ?>>12</option>
                <option value="16" <?php echo isset($_GET['edad']) && $_GET['edad'] == '16' ? 'selected' : ''; ?>>16</option>
                <option value="18" <?php echo isset($_GET['edad']) && $_GET['edad'] == '18' ? 'selected' : ''; ?>>18</option>
            </select><br><br>

            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" step="1" min="0" max="10" <?php echo isset($_GET['nota']) ? ' value='.$_GET['nota']:""; ?>><br><br>

            <label for="tipo_juego">Tipo de Juego:</label>
            <select id="tipo_juego" name="tipo_juego">
                <option value="" <?php echo isset($_GET['tipo_juego']) && $_GET['tipo_juego'] == 'Cualquiera' ? 'selected' : ''; ?>>Cualquiera</option>
                <option value="Online" <?php echo isset($_GET['tipo_juego']) && $_GET['tipo_juego'] == 'Online' ? 'selected' : ''; ?>>Online</option>
                <option value="Local" <?php echo isset($_GET['tipo_juego']) && $_GET['tipo_juego'] == 'Local' ? 'selected' : ''; ?>>Local</option>
            </select><br><br>

            <label for="genero">Género:</label>
            <select id="genero" name="genero">
                <option value="" <?php echo isset($_GET['genero']) && $_GET['genero'] == '' ? 'selected' : ''; ?>>Cualquiera</option>
                <option value="Acción" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Acción' ? 'selected' : ''; ?>>Acción</option>
                <option value="Aventura" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Aventura' ? 'selected' : ''; ?>>Aventura</option>
                <option value="Deportes" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Deportes' ? 'selected' : ''; ?>>Deportes</option>
                <option value="Estrategia" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Estrategia' ? 'selected' : ''; ?>>Estrategia</option>
                <option value="RPG" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'RPG' ? 'selected' : ''; ?>>RPG</option>
                <option value="Simulación" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Simulación' ? 'selected' : ''; ?>>Simulación</option>
                <option value="Puzzle" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Puzzle' ? 'selected' : ''; ?>>Puzzle</option>
                <option value="Carreras" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Carreras' ? 'selected' : ''; ?>>Carreras</option>
                <option value="Terror" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Terror' ? 'selected' : ''; ?>>Terror</option>
                <option value="Plataformas" <?php echo isset($_GET['genero']) && $_GET['genero'] == 'Plataformas' ? 'selected' : ''; ?>>Plataformas</option>
            </select><br><br>

            <input type="submit" value="Buscar">
        </form>

        <h2>Resultados de la Búsqueda</h2>
        <div id="resultados">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $conn = getDBConnection();

                // Construyo la consulta y le pongo el 1=1 para no tener que comprobar si es la primera condicion.
                $sql = "SELECT * FROM juegos WHERE 1=1";
                if (!empty($_GET['nombre'])) {
                    $nombre = $conn->real_escape_string($_GET['nombre']);
                    $sql .= " AND nombre LIKE '%$nombre%'";
                }
                if (!empty($_GET['edad'])) {
                    $edad = $conn->real_escape_string($_GET['edad']);
                    $sql .= " AND edad = '$edad'";
                }
                if (!empty($_GET['nota'])) {
                    $nota = $conn->real_escape_string($_GET['nota']);
                    $sql .= " AND nota >= '$nota'";
                }
                if (!empty($_GET['tipo_juego'])) {
                    $tipo_juego = $conn->real_escape_string($_GET['tipo_juego']);
                    $sql .= " AND tipo_juego = '$tipo_juego'";
                }
                if (!empty($_GET['genero'])) {
                    $genero = $conn->real_escape_string($_GET['genero']);
                    $sql .= " AND genero = '$genero'";
                }

                // Ejecutar la consulta
                $result = $conn->query($sql);
                echo "<p> Se han encontrado ".$result->num_rows." resultados</p>";  // Muestra el número de resultados
                // Verificar y mostrar los resultados, es mayor que 0 si hay resultados
                if ($result->num_rows > 0) {
                    echo "<div class='resultados'>";
                    while ($row = $result->fetch_assoc()) {
                        // Mostramos los resultados con while y fetch_assoc que devuelve un array asociativo con los resultados y con el nombre de las columnas como clave.
                        echo "<div class='ficha'>";
                        if (!empty($row["foto_caratula"])) {
                            echo "<div class='imagen'><img src='" . $row["foto_caratula"] . "' alt='Foto de la Carátula del juego ".$row["nombre"]."'></div>";
                        }
                        echo "<div class='detalles'>";
                        echo "<h3>" . $row["nombre"] . "</h3>";
                        echo "<p><strong>Género:</strong> " . $row["genero"] . "</p>";
                        echo "<p><strong>Edad:</strong> " . $row["edad"] . "</p>";
                        echo "<p><strong>Nota:</strong> " . $row["nota"] . "</p>";
                        echo "<p><strong>Tipo de Juego:</strong> " . $row["tipo_juego"] . "</p>";
                        echo "<p><strong>Precio:</strong> " . $row["precio"] . "€</p>";
                        echo "<p><strong>Fecha de Lanzamiento:</strong> " . $row["fecha_lanzamiento"] . "</p>";
                        echo "<p><strong>Descripción:</strong> " . $row["descripcion"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "No se encontraron resultados.";
                }

                // Cerramos la conexion
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>