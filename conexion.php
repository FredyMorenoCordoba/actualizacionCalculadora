<?php

require_once('config.php');

class Conexion{
    
    protected $conexion_db;
// Funcion constructor
    public function __construct(){
    
    $this->conexion_db=new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME); 
    
    if($this->conexion_db->connect_errno){
        echo "Conexion Falló";
    }
       
    $this->conexion_db->set_charset('DB_CHARSET');
    }
    
//funcion para limpiar los caracteres y evitar sql injection
  public function sanitize($var){
  $return = mysqli_real_escape_string($this->conexion_db, $var);
  return $return;
}
    //Funcion para poner Null en campos vacios
    public function get_vacio($verificar){
     if(empty($verificar)){
        $null = "NULL";
       
     }else{
         $null = $verificar;
     }
        return $null;  
    }
    
    //Función para verificar si el campo viene con NULL de la BD lo remplaza por vacio uno para mostrar
    public function read_vacio($verificar){
     if($verificar == "NULL"){
        $null = " ";
       
     }else{
         $null = $verificar;
     }
        return $null;  
    }
    

}

?>
