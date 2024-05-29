<?php
session_start();

// Verifica si se enviaron datos de inicio de sesión o registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí iría tu lógica de verificación de inicio de sesión o registro
    // Esto es solo un ejemplo. Debes reemplazarlo con tu lógica de autenticación.
    if ($action === 'login') {
        // Lógica de inicio de sesión
        // Supongamos que la autenticación es exitosa
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
    } elseif ($action === 'register') {
        // Lógica de registro
        // Supongamos que el registro es exitoso
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
    }

    // Redirige al usuario a la página principal
    header("Location: index.php");
    exit;
}
?>
