<?php
/*
    class Conectar{
        public static function conexion(){
            $conexion = new mysqli("localhost","root","Darkmaster2","mvc");
            $conexion->query("SET NAMES 'uft8'");
            return $conexion;
        }
    }*/

    class Conectar {
        private $host = 'localhost';
        private $db_nombre = 'Prueba';
        private $usuario = 'root';
        private $contrasena = 'Darkmaster2';
        private $charset = 'utf8';
        private $conexion;
    
        public function __construct() {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db_nombre};charset={$this->charset}";
                $opciones = array(
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                );
    
                $this->conexion = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
            } catch (PDOException $e) {
                echo 'Error de conexión: ' . $e->getMessage();
                exit();
            }
        }
    
        public function obtenerConexion() {
            return $this->conexion;
        }
    
        public function cerrarConexion() {
            $this->conexion = null;
        }
    }
    

?>