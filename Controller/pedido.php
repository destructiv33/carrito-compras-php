<?php
session_start();
include '../Models/pedido.php';
include '../Apis/barcode.php';
$pedirM = new pedir();

$nm=$_POST['nmYap'];
$tel=$_POST['numero'];
$sc=$_POST['lista'];
$estado=$_POST['estado'];
$noV=$_POST['idV'];
$id=$_SESSION['venta_id'];
$code=$id.date('is');
barcode('../codigos/'.$code.'.png', $code, 20, 'horizontal', 'code25', true);
$pedirM->agregarPed($nm,$tel,$sc,$estado,$noV,$code);
$_SESSION['id_pdf']=$id;
header('Location:../pagado.php');

?>