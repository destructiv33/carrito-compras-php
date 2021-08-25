<?php
include 'Database.php';

class prodC{
    public function get($id){
        $connection=Database::instance();
        $sql="select * from productos where id_prod=$id";;
        $query=$connection->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();
        foreach ($res as $row) {
            $item =[
                'id_prod'       => $row['id_prod'],
                'nombre'        => $row['nombre'],
                'categoria'     => $row['categoria'],
                'precio_u'      =>$row['precio_u'],
                'precio_m'      =>$row['precio_m'],
                'cantidad'      =>$row['cantidad'],
                'img'           =>$row['img'],
            ];
        }
        return $item;
    }
    public function getProductosByCategoria($categoria){
        $connection=Database::instance();
        $sql="select * from productos where categoria='$categoria'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();
        $items=[];
        foreach ($res as $row) {
            $item =[
                'id_prod'       => $row['id_prod'],
                'nombre'        => $row['nombre'],
                'categoria'     => $row['categoria'],
                'precio_u'      =>$row['precio_u'],
                'precio_m'      =>$row['precio_m'],
                'cantidad'      =>$row['cantidad'],
                'img'           =>$row['img'],
            ];
            array_push($items,$item);
        }
        
    
        return $items;
    }    

    public function getProductosByCategoriaT($categoria){
        $connection=Database::instance();
        $sql="select * from productos where categoria='$categoria'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();
        $items=[];
        foreach ($res as $row) {
            $item =[
                'id_prod'  => $row['id_prod'],
                'nombre'   => $row['nombre'],
                'categoria'   => $row['categoria'],
                'precio_u' =>$row['precio_u'],
                'precio_m' =>$row['precio_m'],
                'cantidad' =>$row['cantidad'],
                'img'      =>$row['img'],
            ];
            array_push($items,$item);
        }
        
    
        return $items;
    }    
    public function borrarProd($id){
        try{
            $connection=Database::instance();
            $sql="DELETE FROM productos where id_prod=$id";;
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
            print "Error!:".$e->getMessage();
        }
        return 0;
    }
    function actualizarProd($nm,$cat,$p_u,$p_m,$cant,$r_img,$id){
        try{
            $connection=Database::instance();
            $sql="UPDATE productos SET nombre='$nm', categoria='$cat', precio_u='$p_u', precio_m='$p_m', cantidad='$cant', img='$r_img' where id_prod='$id'";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
            print "Error!:".$e->getMessage();
        }
        return 0;
        
    }
    function nuevoProd($nm,$cat,$p_u,$p_m,$cant,$r_img){
        try{
            $connection=Database::instance();
            $sql="insert into productos values('','$nm','$cat','$p_u','$p_m','$cant','$r_img')";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
                print "Error!:".$e->getMessage();
            }
            return 0;
    }
}

?>