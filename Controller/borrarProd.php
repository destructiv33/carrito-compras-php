<?php
include '../Models/productos.php';
$prod = new prodC ();

if (isset($_GET)) {

    $id=$_GET['id'];
    if($prod->borrarProd($id)){
        $error=0;
        header('Location:../Views/indexADM.php?err='.$error);
    }else {
        $error=5;
        header('Location:../Views/indexADM.php?err='.$error);
    }

}else{
    $error=5;
    header('Location:../Views/indexADM.php?err='.$error);
}
?>