<?php
include_once '../../Models/productos.php';

if(isset($_GET['categoria'])){
    $categoria=$_GET['categoria'];
    if($categoria==''){
        echo json_encode(['statuscode' => 400,'response' => 'No existe esa categoria']);
    }else{
       
        $prod= new prodC();
        $items=$prod->getProductosByCategoriaT($categoria);
        echo json_encode(['statuscode' => 200, 'items' => $items]);
    }
}else if(isset($_GET['get-item'])){
    $id=$_GET['get-item'];
    if ($id=='') {
        echo  json_encode(['statuscode' => 400, 'response' => 'no hay valor para id']);
    }else{
        $prod= new prodC();
        $items =$prod->get($id);
        echo json_encode(['statuscode' => 200, 'items' => $items]);
    }
}else{
    echo json_encode(['statuscode' => 400,'response' => 'No hay accion']);
}

?>