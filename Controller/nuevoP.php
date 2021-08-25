<?php
include '../Models/productos.php';
$objP = new prodC();

$nm=$_POST['nombre'];
$cat=$_POST['lista'];
$p_u=$_POST['precio_u'];
$p_m=$_POST['precio_m'];
$cant=$_POST['cantidad'];
if ($_FILES["imagen"]["error"]>0) {
    echo"Error archivo";
}else{
    $permitidos=array("image/png","image/jpeg","image/jpg");
    if (in_array($_FILES["imagen"]["type"],$permitidos)) {
        $nom_arch=$_FILES["imagen"]["name"];
        $ruta='../img/'.$cat.'/';
            $archivo=$ruta.$_FILES["imagen"]["name"];
            $r_img='/img/'.$cat.'/'.$_FILES["imagen"]["name"];
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
                if($objP->nuevoProd($nm,$cat,$p_u,$p_m,$cant,$r_img)){
                  
                    $error=0;
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