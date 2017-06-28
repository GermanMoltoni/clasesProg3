<?php
require_once './Clases/AccesoDatos.php';
    class Usuario{
        public $mail;
        public $nombre;
        public $clave;
        function __construct($mail=NULL,$clave=NULL,$nombre=NULL){
            if($nombre!=NULL && $mail!=NULL && $clave!=NULL)
            {
                $this->nombre=$nombre;
                $this->clave=$clave;
                $this->mail=$mail;
            }
        }
        function CrearUsuario(){
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("INSERT INTO `usuarios`(`mail`,`clave`, `nombre`) VALUES (:mail, :clave, :nombre)");
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
            $consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);
            $consulta->execute();
        }
        static function VerificarUsuario($mail,$clave){
            
            $objDB = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objDB->RetornarConsulta("SELECT mail,nombre FROM usuarios WHERE  clave=:clave  AND mail=:mail");
            $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
            $consulta->bindValue(':clave',$clave, PDO::PARAM_STR);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }



    }

    ?>