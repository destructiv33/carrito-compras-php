<?php session_start(); 
    if(isset($_SESSION['usuario'])){
        $btnPanel='display: none;';
        $btnPanelE='display: none;';
        if($_SESSION['tipo_u']=='adm'){
            $btnPanel='display: block;';
        }else if($_SESSION['tipo_u']=='emp'){
            $btnPanelE='display: block;';
        }
    }else{
        $btnPanel='display: none;';
        $btnPanelE='display: none;';
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontello.css">
    
    <link rel="stylesheet" href="./css/pie.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/productos.css">
    <link rel="stylesheet" href="./css/carrito.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    
    <title>Index</title>
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
                <h1><img src="./img/logo.png">Ofertas</h1>
                <div style="<?php echo $btnPanel;?>">
                    <a href="http://localhost/sistema/Views/indexADM.php" class="btn btn-primary">Panel de control</a>
                </div>
                <div style="<?php echo $btnPanelE;?>">
                    <a href="http://localhost/sistema/Views/indexEMP.php" class="btn btn-primary">Panel de control</a>
                </div>
                
                
            </div>

            <div class="panel-hading text-left" >
                <h4 style="color: red; font-size: 9px; text-algin: left;">Los precios ya inculuyen <b>DESCUENTO</b> valido hasta 01/01/20</h4>
            </div>
            <main class="tienda">
                <?php
                    $response=json_decode(file_get_contents('http://localhost/sistema/Apis/Productos/api-productos.php?categoria=oferta'), true);
                    if($response['statuscode']==200){
                        foreach($response['items'] as $item){
                            include './layout/items.php';
                        }
                    }else{
                        //un error
                    }
                ?>
            
        </div>
    </div> 
    <div class="panel-hading text-center">   
      
     </div>
    <footer>
        
              <h4><a href="#">SI</a> &copy; 2020</h4>
            <h5>
            Programacion logica y funcional
        </h5>
           
       
    </footer>
    <script src="./js/main.js"></script>                 
  <script src="./js/menu.js"></script>
    
</body>
</html>