<?php
// Conexión a la base de datos
$servername = "DESKTOP-7DHQK1L";
$database = "Proyecto01";
$username = "";  // Ingresa aquí tu usuario de SQL Server, si es necesario
$password = "";  // Si tu usuario tiene contraseña, agrégala aquí

$conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificación de los datos enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    try {
        // Insertar en la base de datos
        $query = "INSERT INTO UsuariosRegistrados (Nombre, Correo, Contraseña) VALUES (:nombre, :correo, :contraseña)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contraseña', $contraseña);
        $stmt->execute();

        echo "success";
    } catch (PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>
