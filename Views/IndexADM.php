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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/login.css">
    <title>🔴Administrador</title>
</head>
<body>

<header>
<div class="menu-adm" style="position: absolute;">
    <?php include 'menuADM.php'?>
</div>
</header>
    <div class="container">
        <div class="row">
            <div class="panel-hading text-center">
                <h1>Bienvenido  <?php echo $_SESSION['usuario'];?></h1>
            </div>
            <div class="nuevo">
                <a href="javascript:registro()" class='btn btn-primary'>Nuevo Empleado</a>
                <a href="javascript:registroA()" class='btn btn-success'>Nuevo Administrador</a>
                <a href="javascript:registroP()" class='btn btn-warning'>Nuevo producto</a>
                
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="">Algo</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
    <div class="row ">
        <div class="table-responsive-sm">        
            <table id="example" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categiria</th>
                        <th>precio_u</th>
                        <th>precio_m</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>	
                    </tr>
						</thead>
						
						<body>
							<?php		
								require '../conexion.php';
								$where="";
								$sql="select * from productos";
							$resultado=$mysqli->query($sql);
							while($row=mysqli_fetch_array($resultado))
							{?>
							<tr>
							<td ><?php echo $row['id_prod'];?></td>
							<td ><?php echo $row['nombre'];?></td>
							<td><?php echo $row['categoria'];?></td>
							<td><?php echo $row['precio_u'];?></td>
							<td><?php echo $row['precio_m'];?></td>
							<td><?php echo $row['cantidad'];?></td>
                            <td><img src="<?php echo "..".$row['img'];?>" style="width: 50px;"></td>
							<td>
							<a href="editarProd.php?id=<?php echo $row['id_prod'] ?>" style="text-decoration: none; color: black;">Editar ✏️</a>
							</td>
                            <td>
							<a href="#" data-href="../Controller/borrarProd.php?id=<?php echo $row['id_prod'] ?>" data-toggle="modal" data-target="#confirm-delete" style="text-decoration: none; color: black;">
							Borrar 🗑️</a>
							</td>
							</tr>
							<input type="hidden" id="id" name="id" value="<?php
							
							?>">
							
							<?php }?>
							
							<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-body">
							¿Desea eliminar este registro?
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<a class="btn btn-danger btn-ok">Borrar</a>
                            </div>
							</div>
							</div>
							</div>
							
							<script>
							$('#confirm-delete').on('show.bs.modal', function(e) {
							$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
							
							$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
							});
							</script>
							
							</body>
							</table>                  
							</div>  
							
							</div>
							
							<script>
							$(document).ready(function() {    
							$('#example').DataTable({
							
							"language": {
							"lengthMenu": "Mostrar _MENU_ registros",
							"zeroRecords": "No se encontraron resultados",
							"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
							"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
							"infoFiltered": "(filtrado de un total de _MAX_ registros)",
							"sSearch": "Buscar:",
							"oPaginate": {
							"sFirst": "Primero",
							"sLast":"Último",
							"sNext":"Siguiente",
							"sPrevious": "Anterior"
							},
							"sProcessing":"Procesando...",
							}
							
							});     
							});
							</script>
							</body>
    </div>
    <div class="formulario" id="formE">
    <form action="../Controller/nuevoUA.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="titulo">
            <h1><img src="../img/logo.png" alt=""> Empleado <a href="javascript:cerrarE()">✖️</a></h1>
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
          <input type="file" name="imagen" id="imagen">  
        </div>
        
        <input type="hidden" name="tipo_u" value="emp">

        <button input type="submit" id="unirme">Unirme</button>
        
        
    </form>
    </div>
    <div class="formulario" id="formA">
    <form action="../Controller/nuevoUA.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="titulo">
            <h1><img src="../img/logo.png" alt=""> Administrador <a href="javascript:cerrarA()">✖️</a></h1>
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
          <input type="file" name="imagen" id="imagen">  
        </div>
        
        <input type="hidden" name="tipo_u" value="adm">

        <button input type="submit" id="unirme">Unirme</button>
        
        
    </form>
    </div>
    <div class="formulario" id="formP">
    <form action="../Controller/nuevoP.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="titulo">
            <h1><img src="../img/logo.png" alt=""> Producto <a href="javascript:cerrarP()">✖️</a></h1>
        </div>
        <input type="text" name="nombre" placeholder="🛍️ Nombre del producto" required>
        <select name="lista" id="" required>
            <option value="" disabled selected >Selecciona una categoria</option>
            <option value="abarrotes">Abarrotes</option>
            <option value="aguas">Aguas</option>
            <option value="cremeria">Cremeria</option>
            <option value="dulceria">Dulceria</option>
            <option value="papel">Papel</option>
            <option value="quimicos">Quimicos</option>
            <option value="oferta">Oferta</option>
 
        </select>
        <input type="number" name="precio_u" step="0.01" placeholder="💰 Precio unidad Ejm.10.00" required>
        <input type="number" name="precio_m" step="0.01" placeholder="💰 Precio mayoreo Ejm.10.00"required>
        <input type="number" name="cantidad" placeholder="📦 Cantidad"required>
        <div class="alert alert-danger" role="alert">
            Imagenes en formato <b>JPG<b>,<b> PNG<b> y <b>JPEG<b>
        </div>
        <input type="file" name="imagen" id="" required>
        <input type="submit" value="Guardar" id="unirme">
        
    </form>
    
    </div>

    <?php 
        
      $error=null;
        if(isset($_GET["err"])){
            $error=$_GET['err'];
            if($error==0){
                echo '<script language="javascript">alert("Registro Exitoso");</script>';
            }else if($error==1){
                echo '<script language="javascript">alert("Peticion exitosa");</script>';
            }else if($error==2){
                echo '<script language="javascript">alert("Elemento borado con exito");</script>';
            }else if($error==4){
                echo '<script language="javascript">alert("Repetir formulario con imagen JPG,JPEG,PNG");</script>';
            }else if($error==5){
                echo '<script language="javascript">alert("Alogo salio mal intentalo mas tarde");</script>';
            }
        }
    ?>
    <input type="hidden" value="<?php echo $error;?>" id="respuetsta">
    <script>
var nav4 = window.Event ? true : false;
function aceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key>= 48 && key <= 57));
}
</script>
<script src="../js/validarpw.js">
<script src="../js/validaru.js">
</script>
<script>
    function registro(){
        document.getElementById("formE").style.display="block";
    }
    function cerrarE(){
        document.getElementById("formE").style.display="none";
    }
</script>
<script>
    function registroA(){
        document.getElementById("formA").style.display="block";
    }
    function cerrarA(){
        document.getElementById("formA").style.display="none";
    }
</script>

<script>
    function registroP(){
        document.getElementById("formP").style.display="block";
    }
    function cerrarP(){
        document.getElementById("formP").style.display="none";
    }
</script>


</body>
</html>