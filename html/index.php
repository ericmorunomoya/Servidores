<?php
$host = 'db';
$user = 'user_eric';
$password = 'user_password';
$db = 'mi_web_db';

// Intentar conectar hasta 5 veces si falla
$max_intentos = 5;
$conn = null;

for ($i = 0; $i < $max_intentos; $i++) {
    try {
        $conn = new mysqli($host, $user, $password, $db);
        if (!$conn->connect_error) break;
    } catch (mysqli_sql_exception $e) {
        if ($i == $max_intentos - 1) die("Error final de conexión: " . $e->getMessage());
        sleep(2); // Esperar 2 segundos antes de reintentar
    }
}

$sql = "SELECT nombre, email FROM usuarios";
$result = $conn->query($sql);

echo "<h1>Datos desde la Base de Datos</h1>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<strong>Nombre:</strong> " . $row["nombre"]. " - <strong>Email:</strong> " . $row["email"] . "<br>";
    }
} else {
    echo "Base de datos conectada, pero no hay registros.";
}
$conn->close();
?>