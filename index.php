<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAMES</title>
    <link rel="icon" type="image/png" href="image/game.png">
    <link rel="stylesheet" href="style.css">
    <style>
        .modal { 
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }
        .modal-content { 
            background-color: #fefefe; 
            margin: 15% auto; 
            padding: 20px; 
            border: 1px solid #888; 
            width: 80%; 
        }
        .close { 
            color: #aaa; 
            float: right; 
            font-size: 28px; 
            font-weight: bold; 
        }
        .close:hover, .close:focus { 
            color: black; 
            text-decoration: none; 
            cursor: pointer; 
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="buttons">
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                <!-- Si el usuario está autenticado, mostrar un botón de logout -->
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <!-- Si el usuario no está autenticado, mostrar un botón de login -->
                <button onclick="openModal('authModal')">Login / Register</button>
            <?php } ?>
        </div>
    </div>

    <div class="image-container">
        <section>
            <a href="gamecube.html" class="image-link">
                <img src="image/gamecube-alargado.png" alt="gamecube-alargado">
            </a>
            <a href="switch.html" class="image-link">
                <img src="image/alrgado-nintendo.jpg" alt="alrgado-nintendo">
            </a>
            <a href="playstation.html" class="image-link">
                <img src="image/playstation-alargado.jpg" alt="playstation-alargado">
            </a>
            <a href="xbox.html" class="image-link">
                <img src="image/xbox_logo.png" alt="xbox_logo">
            </a>
        </section>
    </div>

    <!-- Modal para el login y registro -->
    <div id="authModal" class="modal" style="<?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) { echo 'display: block;'; } ?>">
        <div class="modal-content">
            <span class="close" onclick="closeModal('authModal')">&times;</span>
            <h2>Login / Register</h2>
            <form method="post" action="auth.php">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit" name="action" value="login">Login</button>
                <button type="submit" name="action" value="register">Register</button>
            </form>
        </div>
    </div>

    <script>
        // Función para abrir el modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        // Función para cerrar el modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Agregar evento de clic a los enlaces de imagen
        var imageLinks = document.querySelectorAll('.image-link');
        imageLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                // Verificar si el usuario está autenticado
                if (!<?php echo isset($_SESSION['logged_in']) ? 'true' : 'false'; ?>) {
                    // El usuario no está autenticado, evitar la navegación y abrir el modal de login
                    event.preventDefault();
                    openModal('authModal');
                }
            });
        });
    </script>

</body>
</html>
