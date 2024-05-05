<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'fisioterapia';

    public function getConnection(){
        $hostDB = "mysql:host=" .$this->host . ";dbname=" . $this->database;

        try{
            $conxion =new PDO($hostDB, $this->user, $this->password);
            $conxion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conxion;

        }catch (PDOException $error){
            die("ERROR DE CONEXION A LA BASE DE DATOS:" .$error->getMessage());
        }
    }
}
?>