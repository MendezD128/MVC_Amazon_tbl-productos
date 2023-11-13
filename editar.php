<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_producto'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id_producto = $_GET['id_producto'];

    $sentencia = $bd->prepare("select * from productos where id_producto = ?;");
    $sentencia->execute([$id_producto]);
    $productos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($productos);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $productos->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="txtprecio" autofocus required
                        value="<?php echo $productos->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="txtstock" autofocus required
                        value="<?php echo $productos->stock; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtDesc" autofocus required
                        value="<?php echo $productos->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="number" class="form-control" name="txtCant" autofocus required
                        value="<?php echo $productos->cantidad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria: </label>
                        <input type="text" class="form-control" name="txtCat" autofocus required
                        value="<?php echo $productos->categoria; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Id del proveedor: </label>
                        <input type="number" class="form-control" name="txtProv" autofocus required
                        value="<?php echo $productos->id_proveedor; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_producto" value="<?php echo $productos->id_producto; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>