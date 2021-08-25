
<?php
include '../Models/venta.php';
require '../conexion.php';
$pagar= new ventas();

$cod=$_POST['cod'];
$est=$_POST['estado'];
$loc=$_POST['salida'];
$existe=$pagar->existeCod($cod);
echo $loc;
echo $cod;
$id="";
if($cod==$existe){
    if($est=='pagado'){
        echo "entra al if de pagado";
        $id=$pagar->getNoVenta($cod);
        echo $id;
        $sql="SELECT * FROM ventadetalle INNER JOIN productos ON ventadetalle.id_prod = productos.id_prod AND ventadetalle.id_venta=$id";
        $resultado=$mysqli->query($sql);
        echo"<br>";
        while($row=mysqli_fetch_array($resultado)){
            $idp=$row['id_prod'];
            $stock=$row['cantidad'];
            $cantProd=$row['cantidad_prod'];
            $setStock=$stock-$cantProd;
            $pagar->actualizarStock($setStock,$idp);
        }
    }
    $pagar->pagarM($cod,$est);
        if($loc=="usr"){
  
            header('Location:../indexUSR.php?err=1');
        }else if($loc=="emp"){
            
            header('Location:../Views/indexEMP.php?err=1');
        }
        
    
}else{
    header('Location:../indexUSR.php?err=2');
}


?>