<div class="usuario">
    <input type="hidden" id="id" value="<?php echo $item['id_usr'];?>">
    <div class="avatar">
        <img src="<?php echo"./".$res['usr_img'];?>" alt="">
    </div>
    <div class="usr">
        <?php echo $res['usr'];?> 
    </div>
    <div class="nombre">
        <?php echo $res['nombre'];?>   
        <?php echo $res['apellidos'];?> 
    </div>
    <div class="numero">
        <label for="telefono">Telefono</label>
        <?php echo $res['telefono'];?>
    </div>
    <div class="correo">
        <label for="correo">Correo</label>
        <?php echo $res['correo'];?>    
    </div>
     
</div>