<?php
session_start();
if (isset($_SESSION['denunciante'])) {

    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    echo $incoming_id ;
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN usuarios ON usuarios.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id')
                OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id') ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $hora=date("H:i", strtotime($row["hora"]));
                $output .= '<div class="chat outgoing">
                      <div class="details">
                                   
                                    <p style="color:black; background: transparent; float: right;">' . $hora . '</p> <p>' . $row['msg'] . '</p>
                    
                                </div>
                                </div>';  
            } else {
               $hora=date("H:i", strtotime($row["hora"]));  
                $output .= '<div class="chat incoming">
                          <div class="details">
                                   
                                    <p style="color:black; background: transparent; float: right;">' . $hora . '</p> <p>' . $row['msg'] . '</p>
                    
                                </div>
                                </div>';  
            }
        }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
