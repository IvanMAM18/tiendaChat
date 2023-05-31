<?php 
require_once('conexion.php');
require_once('api.php');
require_once('cors.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET"){
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $api = new Api();
        $obj = $api->getUsuarios($id);
        $json = json_encode($obj);
        echo $json;
    }else{
        $vector = array();
        $api = new Api();
        $vector = $api->getUsuarios();
        $json = json_encode($vector);
        echo $json;
    }
}

if($method == "POST"){
    $json = null;
    $data = json_decode(file_get_contents("php://input"),true);
    $nombreUsuario = $data['nombreUsuario'];
    $email = $data['email'];
    $contrasena = $data['contrasena'];
    $api = new Api();
    $json = $api->addUsuarios($nombreUsuario,$email,$contrasena,$api);
    echo $json;
}

if($method == "DELETE"){
    $json = null;
    $id = $_REQUEST['id'];
    $api = new Api();
    $data = json_decode(file_get_contents("php://input"),true);
    $nombreUsuario = $data['nombreUsuario'];
    $email = $data['email'];
    $contrasena = $data['contrasena'];
    $json = $api->addUsuarios($nombreUsuario,$email,$contrasena,$api);
    echo $json;
}
  
?>