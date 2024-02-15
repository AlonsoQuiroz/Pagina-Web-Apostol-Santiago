<?php   
    $id=$_GET['id'];
    include("conexion.php");

    //delete from matricula where id=$id
    $sql="delete from datos_matricula_c where id='".$id."'";
    $resultado=mysqli_query($conexion, $sql);

    if($resultado){
        echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('registroclienteConfirmados.php');
            </script>";
    } else {
        echo "<script language='JavaScript'>
            alert('Los datos no se guardaron');
            location.assign('registrocliente.php');
            </script>";
    }

?>