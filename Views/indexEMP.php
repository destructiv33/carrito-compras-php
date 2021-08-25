<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['tipo_u']=='emp'){
        
    }else if($_SESSION['tipo_u']=='adm'){
        header('Location:./Views/indexADM.php'); 
    }elseif($_SESSION['tipo_u']=='usr'){
        header('Location:indexUSR.php');
    }
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/JsBarcode.all.min.js"></script>
    <title> Empleaado</title>
</head>
<?php $arrayCodigos=array();?>
<body>
    <header>
        <?php include 'menuEMP.php'; ?>
    </header>
    <div class="container">
        <div class="row">

        <div class="panel-hading text-center">
                <h1>Bienvenido <?php echo $_SESSION['usuario'];?> estos son pedidos <b>pendientes</b></h1>
            </div>
        <br>
        <div class="table-responsive-sm">        
            <table id="example" class="table">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Cliente</th>
                        <th>No Telefono</th>
                        <th>Sucursal</th>
                        <th>Estado</th>
                        <th>Identificador Venta</th>
						<th>BarCode</th>
                        <th></th>
                        
                        	
                    </tr>
						</thead>
						
						<body>
							<?php		
								require '../conexion.php';
								$where="";
								$sql="SELECT * FROM pedido INNER JOIN venta ON venta.no_venta=pedido.no_venta AND pedido.estado='pagado'";
							$resultado=$mysqli->query($sql);
							while($row=mysqli_fetch_array($resultado))
							
							{?>
							<tr>
							<td><?php echo $row['id_pedido'];?></td>
							<td><?php echo $row['nombre'];?></td>
							<td><?php echo $row['telefono'];?></td>
							<td><?php echo $row['sucursal'];?></td>
                            <td><?php echo $row['estado'];?></td>
                            <td><?php echo $row['no_venta'];?></td>
							<td>
							<a href="../linea.php?id=<?php echo $row['no_venta'] ?>" style="text-decoration: none; color: black;">Ver Detalle ✏️</a>
							</td>
                            
							</tr>
							<input type="hidden" id="id" name="id" value="">
							
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
        
        </div>
    </div>

	<?php 
        
      $error=null;
        if(isset($_GET["err"])){
            $error=$_GET['err'];
            if($error==0){
                echo '<script language="javascript">alert("Se actualizo el estado correctamente");</script>';
            }else if($error==1){
                echo '<script language="javascript">alert("Se actualizo el estado correctamente");</script>';
            }else if($error==2){
                echo '<script language="javascript">alert("Elemento borado con exito");</script>';
            }else if($error==4){
                echo '<script language="javascript">alert("Repetir formulario con imagen JPG,JPEG,PNG");</script>';
            }else if($error==5){
                echo '<script language="javascript">alert("Alogo salio mal intentalo mas tarde");</script>';
            }
        }
    ?>
	
</body>
</html>

