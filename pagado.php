<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['tipo_u']=='usr'){
        
    }else{
        header('Location:login.php?err=1');
    }
}else{
    header('Location:login.php?err=1'); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/carrito.css">
    <link rel="stylesheet" href="./css/editarProd.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    <title>Comprar</title>
</head>
<body>
    <header>
        <?php      
            if(isset($_SESSION['usuario'])){
                include './Views/menuUSR.php';  
            }else{
                include './Views/menu.php';
            }  
        ?>
    </header>
    <?php
        unset($_SESSION['carrito']);
    ?>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
            <br>
            <br>
            <br>
            <?php 
            if(isset($_SESSION['id_pdf'])){
                $idp=$_SESSION['id_pdf'];

            }
            ?>
                <h1>Tu pedido esta listo</h1>
                <h2>Para descargar tu linea de pago da click</h2>
                
            <a href="linea.php?id=<?php echo $idp; ?>" class="btn btn-danger">Aqui</a>
            </div>
            
            
            <br>
            
            
        </div>
    </div>

</body>
</html>