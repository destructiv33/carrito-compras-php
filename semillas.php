<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/carrito.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    <title>Semillas</title>
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


    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
                <h1><img src="./img/logo.png" style="width: 90px; height: 50px;">Semillas</h1>
            </div>

            <main class="tienda">
                <?php
                    $response=json_decode(file_get_contents('http://localhost/sistema/Apis/Productos/api-productos.php?categoria=semillas'), true);
                    if($response['statuscode']==200){
                        foreach($response['items'] as $item){
                            include './layout/items.php';
                    }
                    }else{
                        //un error
                    }
                ?>
            </main>
        </div>
    </div>
    
    <script src="./js/menu.js"></script>                
    <script src="./js/main.js"></script>
</body>
</html>