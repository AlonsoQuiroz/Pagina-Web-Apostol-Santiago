<?php
require_once 'conexion.php'; // Asegúrate de que la ruta sea correcta si el archivo está en un directorio diferente

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['copiar'])) {
    $id = $_POST['id'];

    // Realizar la copia del registro a otra tabla (código que tienes para copiar)

    // Luego, eliminar el registro de la tabla original
    $sql_insert = "INSERT INTO datos_matricula_c (id, nombres, apellidopaterno, apellidomaterno, dni, correoapoderado, telefonoapoderado, gradointeres, seccion) SELECT id, nombres, apellidopaterno, apellidomaterno, dni, correoapoderado, telefonoapoderado, gradointeres, seccion FROM datos_matricula WHERE id = $id";

    if ($conexion->query($sql_insert) === TRUE) {
        $sql_delete = "DELETE FROM datos_matricula WHERE id = $id";

        if ($conexion->query($sql_delete) === TRUE) {
            // Redireccionar a registrocliente.php
            header("Location: registrocliente.php");
            exit(); // Asegurarse de detener la ejecución del script después de la redirección
        } else {
            echo "Error al eliminar el registro: " . $conexion->error;
        }
    } else {
        echo "Error al copiar el registro: " . $conexion->error;
    }
}
?>