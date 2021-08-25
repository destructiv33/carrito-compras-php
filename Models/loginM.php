<?php
include 'Database.php';

class loginM{
    function obtenerUsr($us,$pw){
        $connection=Database::instance();
        $sql="select * from usuarios where usr='$us' and pw='$pw'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['usr'];
        
        }
    }
    function obtenerID($us,$pw){
        $connection=Database::instance();
        $sql="select * from usuarios where usr='$us' and pw='$pw'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['id_usr'];
        
        }
    }
    function validarUsr($us,$pw){
        $connection=Database::instance();
        $sql="select * from usuarios where usr='$us' and pw='$pw'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
            return  $row['tipo_usr'];
            
        }
    }
    function duplicados($us){
        $connection=Database::instance();
        $sql="select * from usuarios where usr='$us'";;
        $query=$connection->prepare($sql);
        $query->execute();
        $users=$query->fetchAll();
        foreach ($users as $row) {
        return  $row['usr'];
        
        }
    }
}

?>