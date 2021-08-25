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

    <script src="./js/jquery-3.4.1.min.js"></script>
    <title>🔴 Usuario</title>
</head>
<body>
    <header>
        <?php include './Views/menuUSR.php'; ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
            <h2>Bienvenido <?php echo $_SESSION['usuario'];?> estas son algunas ofertas</h2>
     
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
            </main>
        </div>
    </div>
    <?php 
                $error=null;
                if(isset($_GET["err"])){
                    $error=$_GET["err"];
                    if($error==0){	
                        echo"Error! al iniciar sesion";
                        }else if($error==1){
                            echo '<script language="javascript">alert("Transaccion con exito");</script>';
                        }else if($error==2){
                            echo '<script language="javascript">alert("Algo salio mal itentalo mas tarde");</script>';
                        }else if($error==3){
                        echo"usted no esta autorizado para esatar a qui";
                        }else if($error==4){
                        echo "Repetir formulario con imagen JPG,JPEG,PNG";
                        }else if($error==5){
                        echo "Algo salio mal por favor intentelo mas tarde";
                        }else if($error==6){
                        echo "Por favor inicia sesion o registrate para completar compra";
                        }
                }
            ?>

    <script src="./js/main.js"></script>
    <script src="./js/validarpw.js"></script>
    <script src="./js/menu.js"></script>
                     
    <script src="./js/menu.js"></script>
</body>
</html>