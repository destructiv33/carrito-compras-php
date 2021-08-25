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
    require 'conexion.php';
    if(isset($_SESSION['id_usr'])){
        $id=$_SESSION['id_usr'];
        $sql="select * from usuarios where id_usr=$id";
        $resultado=$mysqli->query($sql);
        foreach ($resultado as $row);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
                <h1>Estas a un paso de completar tu pedido</h1>
            </div>
            <br>
            <form action="./Controller/pedido.php" method="POST">
                <input type="hidden" name="idV" value="<?php echo $_SESSION['venta_id'];?>">
                <input type="hidden" name="estado" value="<?php echo "pendiente";?>">

                <label for="nmYap">Nombre y apellido</label>
                <input type="text" name="nmYap" id="" value="<?php echo $row['nombre']." ".$row['apellidos'];?>" required>
                <label for="numero">Numero</label>
                <input type="text"  name="numero" value="<?php echo $row['telefono']?>" size="10" maxlength="10" onkeypress="return aceptNum(event)" onpaste="return false;" required>
                
                <label for="lista">Selecciona una sucursal</label>
                <select name="lista" id="lista" required>
                    <option value="" disabled selected >Donde quieres recoger tu pedido</option>
                    <option value="norte">Zorrito Norte</option>
                    <option value="sur">Zorrito Sur</option>
                    <option value="este">Zorrito Este</option>
                    <option value="oeste">Zorrito Oeste</option>
                    <option value="centro">Zorrito Centro</option>
                </select>
                <div class="enviar">
                    <input type="submit" value="Pedir">
                </div>
                
            </form>
            
        </div>
    </div>
    <script>
var nav4 = window.Event ? true : false;
function aceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key>= 48 && key <= 57));
}
</script>
</body>
</html>