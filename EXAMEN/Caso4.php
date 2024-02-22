<?php
session_start();

$usuarios = array(
    "ramses" => "123",
    "erick" => "123456"
);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (array_key_exists($username, $usuarios) && $usuarios[$username] == $password && $password == $confirm_password) {
        $_SESSION['username'] = $username;
        header("Location: caso4sub.php");
        exit();
    } else {
        $mensaje_login = "Error: Usuario, contraseña o confirmación de contraseña incorrectos.";
        echo "<script>alert('$mensaje_login');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Usuario:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Confirmar Contraseña:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <input type="submit" name="login" value="Iniciar Sesión">
    </form>
</body>
</html>
