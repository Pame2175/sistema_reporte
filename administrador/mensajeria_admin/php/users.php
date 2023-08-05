<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $usuario_rol= $_SESSION['rol'];
    $sql = "SELECT * FROM usuarios WHERE NOT unique_id = '$outgoing_id' and id_rol = '2' ORDER BY usuario_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>