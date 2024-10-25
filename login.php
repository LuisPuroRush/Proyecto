<?php
// Conexión a la base de datos
$servername = "DESKTOP-7DHQK1L";
$database = "Proyecto01";
$username = "";  // Ingresa aquí tu usuario de SQL Server, si es necesario
$password = "";  // Si tu usuario tiene contraseña, agrégala aquí

$conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificación de los datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    try {
        // Consultar al usuario en la base de datos
        $query = "SELECT * FROM UsuariosRegistrados WHERE Correo = :correo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña, $usuario['Contraseña'])) {
            echo "success";
        } else {
            echo "Correo o contraseña incorrectos";
        }
    } catch (PDOException $e) {
        echo "Error en el inicio de sesión: " . $e->getMessage();
    }
}
?>
