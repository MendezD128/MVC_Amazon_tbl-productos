<?php 
    if(!isset($_GET['id_producto'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id_producto = $_GET['id_producto'];

    $sentencia = $bd->prepare("DELETE FROM productos where id_producto = ?;");
    $resultado = $sentencia->execute([$id_producto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>