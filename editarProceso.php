<?php
    print_r($_POST);
    if(!isset($_POST['id_producto'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['txtNombre'];
    $precio = $_POST['txtprecio'];
    $stock = $_POST['txtstock'];
    $descripcion = $_POST['txtDesc'];
    $cantidad = $_POST['txtCant'];
    $categoria = $_POST['txtCat'];
    $id_proveedor = $_POST['txtProv'];

    $sentencia = $bd->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ?, descripcion = ?, cantidad = ?, categoria = ?, id_proveedor  = ?  where id_producto = ?;");
    $resultado = $sentencia->execute([$nombre, $precio, $stock, $descripcion, $cantidad, $categoria, $id_proveedor, $id_producto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>