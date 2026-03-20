<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validar que el email sea válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Correo electrónico inválido.");
    }

    // Validar que las contraseñas coincidan
    if ($_POST['password'] !== $_POST['confirmar_password']) {
        die("Las contraseñas no coinciden.");
    }

    // Guardar los datos en un archivo de texto (solo para prueba)
    $registro = "Nombre: $nombre | Email: $email | Fecha: " . date('Y-m-d H:i:s') . "\n";
    file_put_contents('usuarios.txt', $registro, FILE_APPEND);

    // ✅ Redirigir a otra página después del registro
    header("Location: D://Posicionamiento y optimizacion web/Pagina web final/index.html");
    exit(); // Es importante usar exit() después de header()
}
?>