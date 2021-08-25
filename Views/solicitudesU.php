<?php session_start();

if(isset($_SESSION['usuario'])){
    if($_SESSION['tipo_u']=='emp'){
        
    }else if($_SESSION['tipo_u']=='adm'){
        header('Location:../Views/indexADM.php'); 
    }elseif($_SESSION['tipo_u']=='usr'){
        header('Location:indexUSR.php');
    }
}else{
    header('Location:../login.php?err=1');
}
?>
<div class="editarr" id="editar">
<?php
    
    include '../Models/usuariosM.php';
    $admC = new usuarioM ();
    $res=[];
    $res=$admC-> obtenerU($_SESSION['usuario']);
?>
<form action="#" method="POST"> 
    <input type="hidden" id="id" value="<?php echo $res['id_usr'];?>">
    <div class="avatar">
        <img src="<?php echo"../".$res['usr_img'];?>" alt="">
    </div>
    <input type="text" name="si" id="si" value="<?php echo $res['nombre'];?>">
    <input type="text" name="si" id="si" value="<?php echo $res['apellidos'];?>">
    <input type="text" name="si" id="si" value="<?php echo $res['telefono'];?>">
    <input type="text" name="si" id="si" value="<?php echo $res['correo'];?>">
    <input type="submit" value="Actualizar">
</form>
    
</div>