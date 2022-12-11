<?php

require 'conexion.php';

if (isset($_POST['btnIngresar'])){
     if((!isset($_POST['user'])) || (!isset($_POST['pass']))){ //toque aqui la validacion
        $error = "<center><font color='red'>Debe Completar el formulario.</font></center>";
        echo $error;
    }
    $user = htmlentities($_POST['user']);
    $pass = htmlentities($_POST['pass']);
    if (($user == '') || ($pass == '')){
        $error = "<center><font color='red'>Por favor ingrese el usuario y la contraseña.</font></center>";
        echo $error;
    }
}
class DevuelveU extends Conexion{
    public function __construct(){
        parent::__construct();
    }
    
    public function GetUsuarios(){
        /* $user = htmlentities($_POST['user']);
         $pass = htmlentities($_POST['pass']);*/
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $resultado= $this->conexion_db->query("SELECT * FROM usuarios WHERE doc='$user' AND password='$pass' ");
        $usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
        
        return $usuarios;
    }
    
    public function GetFocogestor(){
        /* $user = htmlentities($_POST['user']);
         $pass = htmlentities($_POST['pass']);*/
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $resultado= $this->conexion_db->query("SELECT * FROM usuarios u INNER JOIN asignar_focogestor af ON af.id_focogestor = u.id_usuario WHERE doc='$user' AND password='$pass' ");
        $focogestor=$resultado->fetch_all(MYSQLI_ASSOC);
        
        return $focogestor;
    }

    public function consultar_pilas($sql){
        $busqueda= $this->conexion_db->query($sql);
        
        $resultado=$busqueda->fetch_all(MYSQLI_ASSOC);
        
        return $resultado;  
    }
}
?>