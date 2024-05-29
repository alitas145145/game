<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // El usuario no está autenticado, redirigir al modal de autenticación
    header("Location: index.php#authModal");
    exit;
}
?>
