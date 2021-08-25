<?php
session_start();
include '../Models/usuariosM.php';
$usrC = new usuarioM();

$usr=$_POST['usr'];
$nms=$_POST['nombres'];
$aps=$_POST['apellidos'];
$tel=$_POST['telefono'];
$cro=$_POST	['correo'];

$tipo=$_SESSION['tipo_u'];
if($tipo=="adm"){
    $dire="ADM";
}else if($tipo=="usr"){
    $dire="USR";
}
if ($_FILES["imagen"]["error"]>0) {
    $r_img=$_POST['ruta'];
    if($usrC->actualizar($nms,$aps,$tel,$cro,$r_img,$usr)){
        $error=1;
        header('Location:../index'.$dire.'.php?err='.$error);
    }else{
        $error=5;
        header('Location:../index'.$dire.'.php?err='.$error);
        //header('Location:../Views/indexADM.php?err='.$error);
    }
}else{
    $permitidos=array("image/png","image/jpeg","image/jpg");
    if (in_array($_FILES["imagen"]["type"],$permitidos)) {
        $nom_arch=$_FILES["imagen"]["name"];
        $ruta='../img/usr/';
            $archivo=$ruta.$_FILES["imagen"]["name"];
            $r_img='/img/usr/'.$_FILES["imagen"]["name"];
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
                if($usrC->actualizar($nms,$aps,$tel,$cro,$r_img,$usr)){
                    $error=1;
                    header('Location:../index'.$dire.'.php?err='.$error);
                }else{
                    $error=5;
                    header('Location:../index'.$dire.'.php?err='.$error);
                }
            }else{
                $error=5;
                header('Location:../index'.$dire.'.php?err='.$error);
            }
    }else{
        $error=4;
        header('Location:../index'.$dire.'.php?err='.$error);
    }
}
?>