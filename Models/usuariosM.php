<?php
include 'Database.php';

class usuarioM{
    function getId(){
        $connection=Database::instance();
        $sql="SELECT * FROM usuarios ORDER by id_usr DESC LIMIT 1";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['id_usr'];
        
        }
    }
    function insertar($us,$pw,$nms,$aps,$tel,$cro,$tp,$img){
        try{
            $connection=Database::instance();
            $sql="insert into usuarios values('','$us','$pw','$nms','$aps','$tel','$cro','$tp','$img')";
            $query=$connection->prepare($sql);
            $query->execute();
            return 1;
            }catch(\PDDException $e){
                print "Error!:".$e->getMessage();
            }
            return 0;
    }
    function obtenerU($usr){
        $connection=Database::instance();
        $sql="select * from usuarios where usr='$usr'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $res=$query->fetchAll();
        foreach ($res as $row) {
            $item =[
                'id_usr'    => $row['id_usr'],
                'usr'       => $row['usr'],
                'pw'        => $row['pw'],
                'nombre'    => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'telefono'  => $row['telefono'],
                'correo'    => $row['correo'],
                'tipo_usr'  => $row['tipo_usr'],
                'usr_img'  => $row['usr_img'],
            ];
        }
        return $item;
    }
    function actualizar($nms,$aps,$tel,$cro,$r_img,$usr){
        try{
            $connection=Database::instance();
            $sql="UPDATE usuarios SET nombre='$nms', apellidos='$aps', telefono='$tel', correo='$cro', usr_img='$r_img' where usr='$usr'";
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