
<div class="articulos">
    <input type="hidden" id="id" value="<?php echo $item['id_prod'];?>">
    <?php $stock=$item['cantidad'];
        if($stock<=0){
            $img="/img/agotado.png";
        }else{
            $img=$item['img'];
        }
    ?>
    <div class="imagen">
        <img src=".<?php echo $img;?>">
    </div>
    
    <div class="nombre">
        <b><?php echo$item['nombre'];?></b>
    </div>
    <div class="precioU">
        $<?php echo$item['precio_u'];?> MXN pza
    </div>

    <div class="precioM">
        $<?php echo$item['precio_m'];?> MXN + de 3 pzas
    </div>

    <div class="botones">
        <button class="btn-add">Agregar al carrito </button>
    </div>
</div>