<?php
include '../Models/usuariosM.php';
$usrC = new usuarioM();


$usr=$_POST['usuario'];
$pw=$_POST['password'];
$nms=$_POST['nombres'];
$aps=$_POST['apellidos'];
$tel=$_POST['telefono'];
$cro=$_POST	['correo'];
$tipo_u=$_POST['tipo_u'];



if ($_FILES["imagen"]["error"]>0) {
    echo"Error archivo";
    $error=4;
        header('Location:../login.php?err='.$error);
}else{
    $permitidos=array("image/png","image/jpeg","image/jpg");
    if (in_array($_FILES["imagen"]["type"],$permitidos)) {
        $nom_arch=$_FILES["imagen"]["name"];
        $ruta='../img/usr/';
            $archivo=$ruta.$_FILES["imagen"]["name"];
            $r_img='/img/usr/'.$_FILES["imagen"]["name"];
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
                if($usrC->insertar($usr,$pw,$nms,$aps,$tel,$cro,$tipo_u,$r_img)){
                  session_start();
                    $_SESSION['usuario']=$usr;
                    $_SESSION['tipo_u']=$tipo_u;
                    $_SESSION['id_usr']=$usrC->getId();
                    header('Location:../indexUSR.php');
                }else{
                    $error=5;
                    header('Location:../login.php?err='.$error);
                }
            }else{
                $error=5;
                header('Location:../login.php?err='.$error);
            }
    }else{
        $error=4;
        header('Location:../login.php?err='.$error);
    }
}



?>