<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"])|| empty($_POST["txtprecio"])|| empty($_POST["txtstock"]) 
    || empty($_POST["txtDesc"]) || empty($_POST["txtCant"]) 
    || empty($_POST["txtCat"]) || empty($_POST["txtProv"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $precio = $_POST["txtprecio"];
    $stock = $_POST["txtstock"];
    $descripcion = $_POST['txtDesc'];
    $cantidad = $_POST['txtCant'];
    $categoria = $_POST['txtCat'];
    $id_proveedor = $_POST['txtProv'];
    
    $sentencia = $bd->prepare("INSERT INTO productos(nombre,precio,stock,descripcion, cantidad, categoria, id_proveedor) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$precio,$stock,$descripcion, $cantidad, $categoria, $id_proveedor]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>