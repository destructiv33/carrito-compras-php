<?php
session_start();

include '../Models/loginM.php';
//Solicitudes de consultas
$login = new loginM();

$usr=$_POST['usr'];
$pw=$_POST['pw'];

$t_adm="adm";
$t_emp="emp";
$t_usr="usr";
$error=0;
$obtU=$login->obtenerUsr($usr,$pw);

if($usr==$obtU){
    if($login->obtenerUsr($usr,$pw)){
      
        
        
        $tipo=$login->validarUsr($usr,$pw); 

        $_SESSION['tipo_u']=$tipo;
        $_SESSION['usuario']=$obtU;
        $_SESSION['id_usr']=$login->obtenerID($usr,$pw);
        if($tipo==$t_adm){
            header('Location:../Views/indexADM.php');
        }else if($tipo==$t_emp){
            header('Location:../Views/indexEMP.php');
        }elseif ($tipo==$t_usr) {
            header('Location:../indexUSR.php');
        }
    }else{
        $error=2;
        header('Location:../login.php?err='.$error);
    }
}else{
    $error=2;
    header('Location:../login.php?err='.$error);
}

?>