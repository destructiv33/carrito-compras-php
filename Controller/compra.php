
<?php
require '../conexion.php';
include '../Models/venta.php';
$vent= new ventas();
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location:../login.php?err=6');
}


$precio=0;
$total=0;
$itemsId=($_POST['ids']);
$itemsCant=($_POST['cant']);
$itemsNom=($_POST['nombres']);
$hoy=date("j/n/Y");
$id=$_SESSION['id_usr'];

$vent->insertarVenta($hoy,$id);
$idVent=$vent->obtId();
$_SESSION['venta_id']=$idVent;
$cod=$idVent.date('si');
while(true){
    $itemId=current($itemsId);
    $itemCant=current($itemsCant);
    $itemNom=current($itemsNom);
    $ids=(($itemsId !== false) ? $itemId : ", &nbsp");
    $cant=(($itemsCant !== false) ? $itemCant: ", &nbsp");
    $nombres=(($itemsNom !== false) ? $itemNom: ", &nbsp");
    
    $sql="SELECT * FROM `productos` WHERE id_prod = $ids";
    $resultado = $mysqli->query($sql);
    $row=mysqli_fetch_array($resultado);
    $idProd=$row['id_prod'];
    $nm=$row['nombre'];
    if($cant>=3){
        $precio=$row['precio_m'];
    }else{
        $precio=$row['precio_u'];
    }
    $subTot=$precio*$cant;
    $total+=$subTot;
    $vent->insertarDetalle($idProd,$idVent,$nm,$cant,$precio,$subTot);
    $itemId=next($itemsId);
    $itemCant=next($itemsCant);
    $itemNom=next($itemsNom);
    if($itemId==false && $itemCant==false){
        break;
    } 
}

$ok=$vent->total($total,$idVent,$cod);
if($ok){
    header('Location:../comprar.php');
}


?>