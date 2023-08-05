 <?php
 include "../conexion.php";  
if ($conection->connect_error) {
    die("Error de conexión: " . $conection->connect_error);
}
$correo = $_POST['correo'];


// Verificar si el correo electrónico existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conection->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Generar una nueva contraseña aleatoria
    $newPassword = generateRandomPassword();

    // Actualizar la contraseña en la base de datos
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET clave = ? WHERE correo = ? and clavev =clave";
    $stmt = $conection->prepare($sql);
    $stmt->bind_param("ss", $hashedPassword, $correo);
    $stmt->execute();

    // Enviar la nueva contraseña por correo electrónico (aquí debes implementar el código de envío de correo)

    echo "Tu contraseña ha sido restablecida. Por favor, revisa tu correo electrónico.";
} else {
    echo "No se encontró ninguna cuenta asociada a ese correo electrónico.";
}

// Función para generar una contraseña aleatoria
function generateRandomPassword($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $clave = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $clave .= $characters[$index];
    }

    return $clave;
}



?>