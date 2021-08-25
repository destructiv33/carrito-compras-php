
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="./css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontello.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/pie.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/tarjeta.css">
    <link rel="stylesheet" href="./css/carrito.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/datatables.min.js"></script>
	<script src="./js/dataTables.responsive.min.js"></script>
   
    <title>Home</title>
</head>
<body>

<div class="adm" id="perfil">
    <div class="cerrar">
        <h5><a href="javascript:cerrar()">✖️</a></h5>
    </div>
    <?php 
    
    include './Models/usuariosM.php';
    $admC = new usuarioM ();
    $res=[];
    $res=$admC-> obtenerU($_SESSION['usuario']);
        include './layout/usuario.php';
    ?>
    
        <a href="./Controller/cerrar.php">Cerrar session</a>
       
    
    <div class="enlaces">
        <br>
       <a href="javascript:editarP()">Editar mi info</a>
        
    </div>  
</div>
<div class="admE" id="editarE">
    <div class="cerrarE">
        <h5><a href="javascript:cerrarE()">✖️</a></h5>
    </div>
    <div class="avatar">
        <img src="<?php echo"./".$res['usr_img'];?>">
    </div>
    <form action="./Controller/actualizarU.php" method="POST" enctype="multipart/form-data" autocomplete="off"> 
    <input type="hidden" id="usr" name="usr" value="<?php echo $res['usr'];?>">
    <input type="hidden" id="ruta" name="ruta" value="<?php echo $res['usr_img'];?>">
    <h4>Seleccionar una nueva imagen</h4>
    <input type="file" name="imagen">
    <input type="text" name="nombres" value="<?php echo $res['nombre'];?>">
    <input type="text" name="apellidos" value="<?php echo $res['apellidos'];?>">
    <input type="number" name="telefono" value="<?php echo $res['telefono'];?>">
    <input type="email" name="correo" value="<?php echo $res['correo'];?>">
    <div class="actualizar">
        <input type="submit" value="Actualizar">
    </div>
    
    </form>
</div>



<header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu" class="icon-menu"></label>

        <nav class="menu">
            <ul>
            <li><a href="http://localhost/sistema/">Inicio</a></li>
            <li><a href="http://localhost/sistema/pagar.php">Pagar</a></li>
            <li><a href="./pedidosUSR.php">Mis pedidos</a></li>
            <li class="submenu"><a href="#">Tienda <span class="icon-down-dir"></span></a>
            <ul>
                <li><a href="http://localhost/sistema/abarrotes.php">Abarraotes</a></li>
                <li><a href="http://localhost/sistema/aguas.php">Aguas</a></li>
                <li><a href="http://localhost/sistema/cremeria.php">Creemeria</a></li>
                <li><a href="http://localhost/sistema/dulceria.php">Dulceria</a></li>
                <li><a href="http://localhost/sistema/papel.php">Papel</a></li>
                <li><a href="http://localhost/sistema/quimicos.php">Quimicos</a></li>
                <li><a href="http://localhost/sistema/semillas.php">Semillas</a></li>
                </ul>
            </li> 
                <li><a href="javascript:perfil()">
                    <?php
                        echo $_SESSION['usuario'];
                        
                    ?>
                    <span class="icon-down-dir">
                </a></li>
                <a href="#" class='btn-carrito'>Carrito<span class="icon-basket"></span></a>
            <div id="carrito-container">
                <div id="tabla">
                    
                </div>
            </div>
        </li>
            </ul>
        </nav>
    </header>    
<script>
    function perfil(){
        document.getElementById("perfil").style.display="block";
    }
    function cerrar(){
        document.getElementById("perfil").style.display="none";
    }
</script>
<script>
    function editarP(){
        document.getElementById("editarE").style.display="block";
        document.getElementById("perfil").style.display="none";
    }
    function cerrarE(){
        document.getElementById("editarE").style.display="none";
    }

</script>

    <script src="./js/validarpw.js"></script>                 
  
</body>
</html>