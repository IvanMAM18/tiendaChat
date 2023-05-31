<?php 
    class Api{
        public function getUsuarios(){

            $vector = array();
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $sql = "SELECT * FROM usuarios";
            $consulta = $db->prepare($sql);
            $consulta->execute();
            while($fila = $consulta->fetch()){
                $vector[] = array(
                    "id" => $fila['id'],
                    "nombreUsuario" => $fila['nombreUsuario'],
                    "email" => $fila['email'],
                    "contrasena" => $fila['contrasena']
                );
            }
            return $vector;
        }
        public function getUsuarios($id){

            $vector = array();
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $sql = "SELECT * FROM usuarios WHERE id=:id";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            while($fila = $consulta->fetch()){
                $vector[] = array(
                    "id" => $fila['id'],
                    "nombreUsuario" => $fila['nombreUsuario'],
                    "email" => $fila['email'],
                    "contrasena" => $fila['contrasena']
                );
            }
            return $vector[0];
        }
        public function addUsuarios($nombreUsuario,$email,$contrasena){

            $vector = array();
            $conexion = new Conexion();
            $db = $conexion->getConexion();
            $sql = "INSERT INTO usuarios (nombreUsuario, email, contrasena) VALUES (:nombreUsuario, :email, :contrasena)";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':nombreUsuario',$nombreUsuario);
            $consulta->bindParam(':email',$email);
            $consulta->bindParam(':contrasena',$contrasena);
            $consulta->execute();
            return '{"msg":"usuario agregado"}';
        }
    }

?>