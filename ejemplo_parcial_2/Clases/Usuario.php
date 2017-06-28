<?php
require_once './Clases/AccesoDatos.php';
    class Usuario{
        public $mail;
        public $nombre;
        public $clave;
        function __construct($nombre=NULL,$mail=NULL,$clave=NULL){
            if($nombre!=NULL && $mail!=NULL && $clave!=NULL)
            {
                $this->nombre=$nombre;
                $this->clave=$clave;
                $this->mail=$mail;
            }
        }
        function CrearUsuario(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("INSERT INTO `usuarios`(`mail`,`nombre`, `clave`) VALUES (:mail, :nombre, :clave)");
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
            $consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
            $consulta->execute();
        }
        static function VerificarUsuario($nombre,$mail,$clave){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("SELECT mail,nombre FROM usuarios WHERE  clave=:clave AND nombre=:nombre AND mail=:mail");
	        $consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
            $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
            $consulta->bindValue(':clave',$clave, PDO::PARAM_STR);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }



    }

    ?>