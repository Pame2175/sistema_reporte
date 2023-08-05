function abrirModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "block";

    var usuario_id = document.getElementById("usuario_id").value;

    // Hacer una petición AJAX para obtener los datos del usuario
    $.ajax({
        url: "update_datos_usuario.php",
        method: "POST",
        data: { usuario_id: usuario_id },
        dataType: "json",
        success: function(response) {
            document.getElementById("usuario_cod").value = response.usuario_cod;
            document.getElementById("nombre").value = response.nombre;
            document.getElementById("apellido").value = response.apellido;
            document.getElementById("correo").value = response.correo;
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudieron obtener los datos del usuario"
            });
        }
    });
}

function cerrarModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "none";
}
