<?php
include '../Models/loginM.php';
$login = new loginM();

$usuario=$_POST['texto'];
echo"".$usuario;
$tmp="-";
if($usuario != ""){
    $res=$login->duplicados($usuario);
    if($res != ""){
        $tmp="Este usuario ya existe";
    }else {
        $tmp="Usuario permitido";
    }
}else {
    $tmp="";
}

?>
