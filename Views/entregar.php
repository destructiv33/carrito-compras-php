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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="../css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/editarProd.css">

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
	<title>Entregar</title>
</head>
<body>
	<header>
		<div class="menu">
			<a href="http://localhost/sistema/views/indexEMP.php">Regresar</a>
		</div>
	</header>
	<div class="container">
		<div class="row">
		<div class="panel-hading text-center">
                <h1><img src="../img/logo.png" style="height:70px; width:100px;">Entrega</h1>
            </div>
			<form action="../Controller/caja.php" method="POST">
				<label for="nm">Digite o Escaneé Liena de pago</label>
            	<input type="text" name="cod" required>
				<input type="hidden" name="salida" value="emp">
				<input type="hidden" name="estado" value="entregado">
				<div class="enviar">
					<input type="submit" value="Entregar"required>
				</div>
				
			</form>
			
		</div>
	</div>
</body>
</html>
	