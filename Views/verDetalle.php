<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['tipo_u']=='emp'){
        
    }else{
        header('Location:../login.php?err=1');
    }
}else{
    header('Location:../login.php?err=1'); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="../css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/editarProd.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
    <title>Detalle</title>
</head>
<body>
<header>
        <nav class="menu">
            <ul>
                <li>
                    <a href="indexEMP.php">Regresar</a>
                </li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <div class="row">
        <div class="panel-hading text-center">
            <h1>Pedido</h1>
        </div>

        <div class="table-responsive-sm">        
            <table id="example" class="table">
                <thead>
                    <tr>
                        <th>CodProd</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Sub Total</th>
                        
                        
                        	
                    </tr>
						</thead>
						
						<body>
							<?php		
                                require '../conexion.php';
                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                }
								$where="";
								$sql="select * from ventadetalle where id_venta='$id'";
							$resultado=$mysqli->query($sql);
							while($row=mysqli_fetch_array($resultado))
							{?>
							<tr>
							<td><?php echo $row['id_prod'];?></td>
							<td><?php echo $row['nombre'];?></td>
							<td><?php echo $row['cantidad'];?></td>
							<td><?php echo $row['precio'];?></td>
                            <td><?php echo $row['sub_total'];?></td>
                            
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