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
    <title>Ventas</title>
</head>
<body>
    <header>
    <div class="menu-adm" style="position: absolute;">
        <?php include 'menuADM.php'?>
    </div>
    </header>
    <br>
    <div class="container">
        <div class="row">
        <div class="panel-hading text-center">
                <h1>Estas son todas las ventas</h1>
            </div>
        <div class="table-responsive-sm">        
            <table id="example" class="table">
                <thead>
                    <tr>
						<th>NoVenta</th>
                        <th>NoPedido</th>
                        <th>Responsable</th>
                        <th>Numero</th>
                        <th>Sucursal</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
						<th></th>
                        
                        
                        	
                    </tr>
						</thead>
						
						<body>
							<?php		
                                require '../conexion.php';
                                if(isset($_SESSION['id_usr'])){
									$id=$_SESSION['id_usr'];
									echo $id;
									$sql="SELECT * FROM pedido INNER JOIN venta ON venta.no_venta=pedido.no_venta";
								}else{
									
								}
								$where="";
								
							$resultado=$mysqli->query($sql);
							while($row=mysqli_fetch_array($resultado))
							{?>
							<tr>
							<td><?php echo $row['no_venta'];?></td>
                            <td><?php echo $row['id_pedido'];?></td>
							<td><?php echo $row['nombre'];?></td>
							<td><?php echo $row['telefono'];?></td>
							<td><?php echo $row['sucursal'];?></td>
                            <td><?php echo $row['fecha'];?></td>
                            <td><?php echo $row['total'];?></td>
							
							<td style=" color:<?php 
							
							if($row['estado']==='pendiente'){
								$color='pading:auto; background: rgb(255, 0, 0); color:white;';
							}else if($row['estado']=='pagado'){
								$color='pading:auto; background: rgb(246, 209, 0); color:white;';
							}else if($row['estado']=='listo'){
								$color='pading:auto;  background: rgb(0, 170, 28); color:white;';
							}else if($row['estado']=='entregado'){
								$color='btn btn-primary';
							}
							echo $color;?>">
								<?php echo $row['estado'];?>
							</td>
                            
                            <td><a href="http://localhost/sistema/linea.php?id=<?php echo $row['no_venta'];?>" style="text-decoration: none; color:black;">📝 Linea</a></td>
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
    </div>
</body>
</html>