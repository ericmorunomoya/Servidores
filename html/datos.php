<?php
$host = 'db';
$user = 'user_eric';
$password = 'user_password';
$db = 'mi_web_db';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión");
}

$sql = "SELECT nombre, email FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Nombre:</strong> " . $row["nombre"]. " | <strong>Email:</strong> " . $row["email"] . "</p>";
    }
} else {
    echo "No hay datos.";
}
$conn->close();
?>