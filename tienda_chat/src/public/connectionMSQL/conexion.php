<?php 
    class Conexion {
        public function getConexion(){
            $host = "localhost";
            $user = 'root';
            $pass = 'ivandiana17';
            $db='design';

            $db = new PDO("mysql:host=$host;dbname=$db;",$user,$pass);
            
            return $db;
        }
    }
?>