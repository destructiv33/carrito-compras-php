<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['tipo_u']=='emp'){
        header('Location:./Views/indexEMP.php');
    }else if($_SESSION['tipo_u']=='adm'){
        header('Location:./Views/indexADM.php'); 
    }elseif($_SESSION['tipo_u']=='usr'){
        header('Location:indexUSR.php');
    }
}else{
    
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
    <link rel="stylesheet" href="./css/login.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    <title>Login</title>
</head>
<body>
    <footer>
        <?php include './Views/menu.php';?>
    </footer>

    <div class="formulario" id="form">
    <form action="./Controller/nuevoU.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="titulo">
            <h1><img src="./img/logo.png">Registro <a href="javascript:cerrar()">✖️</a></h1>
        </div>
        
        
        <label for="usu"></label>
        <input type="text" id="usu" placeholder="👤 Usuario" name="usuario" required>
        <div id="error"></div>
        <label for="pass1">Contraseña:</label>
			<input type="password" id="pass1" placeholder="🔑 Escribe una contraseña" name="password" required>
			<div id="error1"></div>
		<label for="pass2">Repetir contraseña:</label>
            <input type="password" id="pass2" placeholder="🔑 Confirmar contraseña" required>
            <div id="error2"></div>
        <input type="text" placeholder="👤 Nombre o Nombres" name="nombres" required>
        <input type="text" placeholder="👤 Apellidos" name="apellidos" required>
        
        <input type="text" placeholder="☎️ Numero" name="telefono" size="10" maxlength="10" onkeypress="return aceptNum(event)" onpaste="return false;" required>
        <input type="email" placeholder="📧 Correo electronico" name="correo" required>
        <h4>Selecciona una imagen para tu perfil</h4>
        <div class="img">
            <label for="imagen"></label>
          <input type="file" name="imagen" id="imagen" required>  
        </div>
        
        <input type="hidden" name="tipo_u" value="usr" >

        <button input type="submit" id="unirme">Unirme</button>
        
        
    </form>
</div>

<div class="login">
    <div class="container">
        <div class="row">
        <br>
        <br>
        
            <div class="panel-hading text-center">
                <img src="./img/logo.png">Socios
            </div>
            <div class="panel-hading text-center">
                <form action="./Controller/loginC.php" method="POST">
                    <br>
                    <input type="text" name="usr" id="usuarios" placeholder="&#128272; Usuario" required>
                    <br>
                    <br>
                    <input type="password" name="pw" id="password" placeholder="&#128272; Contraseña" required> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success" id="boton">Ingresar</button>
                    <a href="javascript:registro()" class="btn btn-danger">Registrarme</a>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="panel-hading text-center">
            <div class="error">
            <?php 
                $error=null;
                if(isset($_GET["err"])){
                    $error=$_GET["err"];
                    if($error==0){	
                        echo"Error! al iniciar sesion";
                        }else if($error==1){
                        echo"Por favor inicie sesion";
                        }else if($error==2){
                        echo"Usuario o contraseñas incorrectos";
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
        </div>
    </div>
</div>
</div>
<script src="./js/validarpw.js"></script>
<script>
var nav4 = window.Event ? true : false;
function aceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key>= 48 && key <= 57));
}
</script>
<script>
    function registro(){
        document.getElementById("form").style.display="block";
    }
    function cerrar(){
        document.getElementById("form").style.display="none";
    }
</script>

    
    
    <script src="./js/menu.js"></script>                
    <script src="./js/main.js"></script>
</body>
</html>