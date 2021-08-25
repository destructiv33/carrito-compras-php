<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['tipo_u']=='adm'){
        
    }else{
        header('Location:../login.php?err=1');
    }
}else{
    header('Location:../login.php?err=1'); 
}
?>
<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="../css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/editarProd.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
    <title>EditarPoducto</title>
</head>
<body>
    <header>
        <nav class="menu">
            <ul>
                <li>
                    <a href="indexAdm.php">Regresar</a>
                </li>
            </ul>
        </nav>
    </header>
    <?php 
        include '../conexion.php';
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $sql="select * from productos where id_prod=$id";
            $resultado=$mysqli->query($sql);
            foreach ($resultado as $row);
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
                <h1>Editar producto</h1>
                <br>
            </div>
            <form action="../Controller/editarProd.php" method="POST"  enctype="multipart/form-data" autocomplete="off">
            <label for="nm">Nombre del producto</label>
            <input type="text" name="nm" value="<?php echo $row['nombre'];?>">
            <label for="cat">Categoria</label>
            <input type="text" name="cat" value="<?php echo $row['categoria'];?>">
            <div class="precios">
            <label for="precio_u">Precio por unidad</label>
            <input type="number" name="precio_u" id="" value="<?php echo $row['precio_u'];?>">
            <label for="precio_m">Precio por mayoreo</label>
            <input type="number" name="precio_m" id="" value="<?php echo $row['precio_m'];?>">
            </div>
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="" value="<?php echo $row['cantidad'];?>">
            <label for="cantidad">Seleccione la categoria</label>
            <select name="lista" id="" required>
                <option value="" disabled selected >Por favor seleccione una categoria</option>
                <option value="abarrotes">Abarrotes</option>
                <option value="aguas">Aguas</option>
                <option value="cremeria">Cremeria</option>
                <option value="dulceria">Dulceria</option>
                <option value="papel">Papel y desechable</option>
                <option value="quimicos">Qumicos</option>
                <option value="oferta">Oferta</option>
            <option value="semillas">Semillas</option>
        </select>
            
            <div class="imagen">
                <label for="img">Imagen</label>
                <img src="<?php echo "..".$row['img'];?>" alt="">
                <input type="file" name="imagen">
            </div>

            <input type="hidden" name="ruta" value="<?php echo $row['img']?>">
            <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']?>">
            <div class="enviar">
                <input type="submit" value="Actualizar">
            </div>
            
            </form>
            
        </div>
    </div>
</body>
</html>