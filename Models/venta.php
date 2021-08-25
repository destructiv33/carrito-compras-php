<?php

include 'Database.php';

class ventas{
    function getNoVenta($code){
        $connection=Database::instance();
        $sql="SELECT no_venta FROM pedido WHERE codigo='$code'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['no_venta'];
        
        }
    }
    function actualizarStock($cant,$id){
        try{
            $connection=Database::instance();
            $sql="UPDATE productos SET cantidad='$cant' where id_prod='$id'";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
            print "Error!:".$e->getMessage();
        }
        return true;
    
    }
    function existeCod($cod){
        $connection=Database::instance();
        $sql="select * from pedido where codigo='$cod'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['codigo'];
        
        }
    }
    function pagarM($cod,$est){
            try{
                $connection=Database::instance();
                $sql="UPDATE pedido SET estado='$est' where codigo='$cod'";
                $query=$connection->prepare($sql);
                $query->execute();
                return 1;
                }catch(\PDDException $e){
                print "Error!:".$e->getMessage();
            }
            return 0;
        }        
    function insertarVenta($fecha,$id){
        try{
            $connection=Database::instance();
            $sql="insert into venta values('','$fecha','$id','','')";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
                print "Error!:".$e->getMessage();
            }
            return 0;
    }
    function insertarDetalle($id_prod,$id_v,$nm,$cant,$pre,$sub){
        try{
            $connection=Database::instance();
            $sql="insert into ventadetalle values('','$id_prod','$id_v','$nm','$cant','$pre','$sub')";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
                print "Error!:".$e->getMessage();
            }
            return 0;
    }
    
    function obtId(){
        $connection=Database::instance();
        $sql="SELECT * FROM venta ORDER by no_venta DESC LIMIT 1";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['no_venta'];
        
        }
    }
    
    function total($tot,$id_v,$cod){
        try{
            $connection=Database::instance();
            $sql="UPDATE venta SET total='$tot', codigo='$cod' where no_venta='$id_v'";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
            print "Error!:".$e->getMessage();
        }
        return true;
    }
}

?>