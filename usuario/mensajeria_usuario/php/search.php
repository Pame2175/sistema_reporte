<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM usuarios WHERE NOT unique_id = '$outgoing_id'and id_rol = '1'  AND (nombre_usu LIKE '%$searchTerm%' OR apellido LIKE '%$searchTerm%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No existe usuario';
    }
    echo $output;
?>