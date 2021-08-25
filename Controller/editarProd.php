<?php
include '../Models/productos.php';
$prod = new prodC();

$nm=$_POST['nm'];
$cat=$_POST['lista'];
$p_u=$_POST['precio_u'];
$p_m=$_POST['precio_m'];
$cant=$_POST['cantidad'];
//$cat=$_POST['lista'];
$id=$_POST['id_prod'];


if ($_FILES["imagen"]["error"]>0) {
    $r_img=$_POST['ruta'];
    if($prod->actualizarProd($nm,$cat,$p_u,$p_m,$cant,$r_img,$id)){
        $error=1;
        header('Location:../Views/indexADM.php?err='.$error);
    }else{
        $error=5;
        header('Location:../Views/indexADM.php?err='.$error);
    }
}else{
    $permitidos=array("image/png","image/jpeg","image/jpg");
    if (in_array($_FILES["imagen"]["type"],$permitidos)) {
        $nom_arch=$_FILES["imagen"]["name"];
        $ruta='../img/'.$cat.'/';
            $archivo=$ruta.$_FILES["imagen"]["name"];
            $r_img='/img/'.$cat.'/'.$_FILES["imagen"]["name"];
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
                if($prod->actualizarProd($nm,$cat,$p_u,$p_m,$cant,$r_img,$id)){
                    $error=1;
                    header('Location:../Views/indexADM.php?err='.$error);
                }else{
                    $error=5;
                    header('Location:../Views/indexADM.php?err='.$error);
                }
            }else{
                $error=5;
                header('Location:../Views/indexADM.php?err='.$error);
            }
    }else{
        $error=4;
        header('Location:../Views/indexADM.php?err='.$error);
    }
}
?>