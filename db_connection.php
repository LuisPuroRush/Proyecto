<?php
// Configuración de la conexión
$serverName = "DESKTOP-7DHQK1L"; // Cambia esto si tu servidor tiene otro nombre
$database = "Proyecto01"; // Nombre de tu base de datos
$connectionInfo = array("Database" => $database, "UID" => "tu_usuario_sql", "PWD" => "tu_contraseña_sql");

// Conexión a SQL Server
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Verificar si hay error en la conexión
if (!$conn) {
    die("Error en la conexión: " . print_r(sqlsrv_errors(), true));
}
?>
